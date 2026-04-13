<?php
function jotdown_files(){
  wp_enqueue_style('jotdown_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'jotdown_files');

function jotdown_features(){
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
}

add_action('after_setup_theme','jotdown_features');

function jotdown_widgets() {
    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    
}
add_action('widgets_init', 'jotdown_widgets');


function jotdown_search_filter($query) {
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        
        // Specific Filter only for NOTES page
        $query->set('post_type', 'post');

        // 2. Sorting Logic 
        if ( isset($_GET['sort_logic']) && !empty($_GET['sort_logic']) ) {
            $parts = explode('-', $_GET['sort_logic']);
            $query->set('orderby', $parts[0]);
            $query->set('order', $parts[1]);
        } else {
            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
}
add_action('pre_get_posts', 'jotdown_search_filter');

// REGISTRATION / SIGNUP
add_action('init', 'profile_registration');

function profile_registration() {
    if ( isset($_POST['action']) && $_POST['action'] === 'jotdown_register' ) {
        
        if ( !isset($_POST['jotdown_register_nonce']) || !wp_verify_nonce($_POST['jotdown_register_nonce'], 'jotdown_register_action') ) {
            wp_die('Security check failed.');
        }

        $userdata = array(
            'user_login' => sanitize_user($_POST['username']),
            'user_email' => sanitize_email($_POST['email']),
            'user_pass'  => $_POST['password'], // WP will hash this automatically
            'first_name' => sanitize_text_field($_POST['first_name']),
            'last_name'  => sanitize_text_field($_POST['last_name']),
            'role'       => 'subscriber' // Default role
        );

        $user_id = wp_insert_user( $userdata );

        if ( is_wp_error($user_id) ) {
            wp_redirect( home_url('/register?error=' . $user_id->get_error_code()) );
            exit;
        } else {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect( home_url('/create-note') );
            exit;
        }
    }
}
// Para sa mga HINDI pa logged in (Guests)
add_action('admin_post_nopriv_jotdown_register', 'jotdown_handle_registration');

// Para sa mga logged in na (Technically optional for register, but good to have)
add_action('admin_post_jotdown_register', 'jotdown_handle_registration');

// LOGIN
// 1. Redirect sa Homepage kapag nag-logout
add_action('wp_logout', 'jotdown_redirect_after_logout');
function jotdown_redirect_after_logout() {
    wp_safe_redirect( home_url() );
    exit;
}

// 2. I-hide ang Admin Bar para sa mga hindi Admin
add_action('after_setup_theme', 'jotdown_hide_admin_bar');
function jotdown_hide_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// 3. I-block ang access sa /wp-admin para sa mga hindi Admin
add_action('admin_init', 'jotdown_restrict_admin_access');
function jotdown_restrict_admin_access() {
    if (defined('DOING_AJAX') && DOING_AJAX) return;
    if (!current_user_can('administrator')) {
        wp_safe_redirect( home_url() );
        exit;
    }
}