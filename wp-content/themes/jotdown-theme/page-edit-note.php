<?php
/* Template Name: JotDown Edit Note */
if ( !is_user_logged_in() ) { wp_redirect(home_url('/login')); exit; }

$note_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$note = get_post($note_id);

// SECURITY: Author can edit 
if ( !$note || $note->post_author != get_current_user_id() ) {
    wp_die('Unauthorized: This is not your note to edit.');
}

get_header(); 

global $jotdown_error; // TAWAGIN ANG GLOBAL VARIABLE DITO

if ( isset($jotdown_error) ) {
    echo '<div class="status-message status-message--error" style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">';
    if ($jotdown_error == 'too_long') echo esc_html__('Too many words! Limit is 10 for testing.', 'jotdown');
    if ($jotdown_error == 'empty') echo esc_html__('Fill in the blanks.', 'jotdown');
    echo '</div>';
}
?>

<div class="container note-form-page note-form-page--edit">
    <h2 class="note-form-title">Edit Your Thought</h2>
    <form class="note-form note-form--edit" action="<?php echo esc_url(add_query_arg('id', $note->ID)); ?>" method="POST">
        <input type="hidden" name="action" value="jotdown_update_note">
        <input type="hidden" name="note_id" value="<?php echo $note->ID; ?>">
        <?php wp_nonce_field( 'jotdown_edit_nonce', 'jotdown_edit_nonce_field' ); ?>

        <input type="text" name="note_title" value="<?php echo isset($_POST['note_title']) ? esc_attr($_POST['note_title']) : esc_attr($note->post_title); ?>" required>
        <textarea name="note_content" required><?php echo isset($_POST['note_content']) ? esc_textarea($_POST['note_content']) : esc_textarea($note->post_content); ?></textarea>

        <button class="btn-primary" type="submit">Update Note</button>
    </form>
</div>

<?php get_footer(); ?>