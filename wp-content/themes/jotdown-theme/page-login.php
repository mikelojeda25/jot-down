<?php
/* Template Name: JotDown Login Page */
get_header(); 
?>

<div class="container dark-industrial-theme auth-page auth-page--login">
    <h1 class="auth-page-title">Enter the Void</h1>
    
    <?php 
    // 1. Handle Display of Errors
    if ( isset($_GET['login']) ) {
        $error_msg = '';
        
        if ( $_GET['login'] == 'failed' ) {
            $error_msg = 'Access Denied: Invalid username or password.';
        } elseif ( $_GET['login'] == 'blank' ) {
            $error_msg = 'Shadow Error: Please fill in both fields.';
        }

        if ( $error_msg ) {
            echo '<p class="status-message status-message--error" style="color: #ff4d4d; background: rgba(255,0,0,0.1); padding: 10px; border-radius: 5px; border-left: 5px solid #ff4d4d;">' . $error_msg . '</p>';
        }
    }

    // 2. Display Form or Welcome Message
    if ( !is_user_logged_in() ) {
        $args = array(
            'redirect'       => home_url('/create-note'), 
            'form_id'        => 'custom-login-form',
            'label_username' => __( 'Username or Email' ),
            'label_password' => __( 'Password' ),
            'label_log_in'   => __( 'Log In' ),
            'remember'       => true
        );
        wp_login_form( $args ); 
    } else {
        echo '<p class="status-message status-message--success">You are already logged in.</p>';
        echo '<a class="inline-action-link" href="' . home_url('/create-note') . '">Go to Notes</a>';
    }
    ?>
</div>

<?php 
get_footer();