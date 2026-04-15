<?php
/* Template Name: JotDown Register Page */

// Redirect kung logged in na
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/create-note') );
    exit;
}

get_header(); 



if ( isset($_GET['error']) ) {
    echo '<div class="status-message status-message--error" style="color:red; background:#000; padding:10px;">Error Code: ' . esc_html($_GET['error']) . '</div>';
}
?>



<div class="container register-container auth-page auth-page--register">
    <h1 class="auth-page-title">Create Your Identity</h1>
    
    <?php if ( isset($_GET['error']) ) : ?>
        <p class="error-msg status-message status-message--error" style="color: red;">
            <?php 
                if ($_GET['error'] == 'existing_user_login') echo "Username already taken.";
                elseif ($_GET['error'] == 'existing_user_email') echo "Email already registered.";
                else echo "Something went wrong. Try again.";
            ?>
        </p>
    <?php endif; ?>

   <form action="" method="POST" class="auth-form register-form">
    <input type="hidden" name="action" value="jotdown_register">
    <?php wp_nonce_field( 'jotdown_register_action', 'jotdown_register_nonce' ); ?>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
    </div>

    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name">
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name">
    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>

    <button class="btn-primary" type="submit">Sign Up</button>
  </form>
    
    <p class="auth-switch-text">Already have an account? <a class="inline-action-link" href="<?php echo site_url('/login'); ?>">Login here</a></p>
</div>

<?php get_footer(); ?>