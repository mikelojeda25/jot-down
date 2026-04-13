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