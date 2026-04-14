<?php
/* Template Name: JotDown Edit Note */
if ( !is_user_logged_in() ) { wp_redirect(home_url('/login')); exit; }

$note_id = $_GET['id'] ?? '';
$note = get_post($note_id);

// SECURITY: Author can edit 
if ( !$note || $note->post_author != get_current_user_id() ) {
    wp_die('Unauthorized: This is not your note to edit.');
}

get_header(); 

global $jotdown_error; // TAWAGIN ANG GLOBAL VARIABLE DITO

if ( isset($jotdown_error) ) {
    echo '<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">';
    if ($jotdown_error == 'too_long') echo 'Too many words! Limit is 10 for testing.';
    if ($jotdown_error == 'empty') echo 'Fill in the blanks.';
    echo '</div>';
}
?>

<div class="container">
    <h2>Edit Your Thought</h2>
    <form action="<?php echo esc_url(add_query_arg('id', $note->ID)); ?>" method="POST">
        <input type="hidden" name="action" value="jotdown_update_note">
        <input type="hidden" name="note_id" value="<?php echo $note->ID; ?>">
        <?php wp_nonce_field( 'jotdown_edit_nonce', 'jotdown_edit_nonce_field' ); ?>

        <input type="text" name="note_title" value="<?php echo isset($_POST['note_title']) ? esc_attr($_POST['note_title']) : esc_attr($note->post_title); ?>" required>
        <textarea name="note_content" required><?php echo isset($_POST['note_content']) ? esc_textarea($_POST['note_content']) : esc_textarea($note->post_content); ?></textarea>

        <button type="submit">Update Note</button>
    </form>
</div>

<?php get_footer(); ?>