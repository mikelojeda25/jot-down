<?php
/* Template Name: JotDown Login Page */

get_header(); // 
?>

<div class="container dark-industrial-theme">
    <h1>Enter the Void</h1>
    
    <?php 
    if ( !is_user_logged_in() ) {
        $args = array(
            'redirect' => home_url(), 
            'form_id'  => 'custom-login-form',
        );
        wp_login_form( $args ); 
    } else {
        echo '<p>You are already logged in.</p>';
        echo '<a href="' . home_url() . '">Go back home</a>';
    }
    ?>
</div>

<?php 
get_footer();