<?php
/* Template Name: JotDown Register Page */

// Redirect kung logged in na
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/create-note') );
    exit;
}

get_header(); ?>

<div class="container register-container">
    <h1>Create Your Identity</h1>
    
    <?php if ( isset($_GET['error']) ) : ?>
        <p class="error-msg" style="color: red;">
            <?php 
                if ($_GET['error'] == 'existing_user_login') echo "Username already taken.";
                elseif ($_GET['error'] == 'existing_user_email') echo "Email already registered.";
                else echo "Something went wrong. Try again.";
            ?>
        </p>
    <?php endif; ?>

    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
        <input type="hidden" name="action" value="jotdown_register">
        
        <?php wp_nonce_field( 'jotdown_register_action', 'jotdown_register_nonce' ); ?>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Sign Up</button>
    </form>
    
    <p>Already have an account? <a href="<?php echo site_url('/login'); ?>">Login here</a></p>
</div>

<?php get_footer(); ?>