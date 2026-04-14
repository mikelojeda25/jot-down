<?php
/* Template Name: JotDown Create Note */
if ( !is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}
get_header(); 

global $jotdown_save_error; // SALUHIN ANG GLOBAL VARIABLE
?>

<div class="container create-note-container">
    
    <?php if ( isset($jotdown_save_error) ) : ?>
        <div class="error-toast" style="background: #ff4d4d; color: white; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <?php 
                if ($jotdown_save_error == 'too_long') echo 'Error: Too many words. Keep it sharp! (Max 10 chars for test)';
                if ($jotdown_save_error == 'empty') echo 'Error: The void refuses empty thoughts.';
            ?>
        </div>
    <?php endif; ?>

    <h2>Jot Down a New Thought</h2>

    <form action="" method="POST">
        <input type="hidden" name="action" value="jotdown_save_note">
        <?php wp_nonce_field( 'jotdown_note_nonce', 'jotdown_note_nonce_field' ); ?>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="note_title" placeholder="Enter note title..." 
                   value="<?php echo isset($_POST['note_title']) ? esc_attr($_POST['note_title']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="note_content" rows="5" placeholder="Write your thoughts..." required><?php echo isset($_POST['note_content']) ? esc_textarea($_POST['note_content']) : ''; ?></textarea>
        </div>

        <button type="submit">Save Note</button>
    </form>
</div>

<?php get_footer(); ?>