<?php
/* Template Name: JotDown Create Note */

// Security Check: I-kick out ang hindi logged in
if ( !is_user_logged_in() ) {
    wp_safe_redirect( site_url('/login') );
    exit;
}

get_header(); ?>

<div class="container create-note-container">
    <h1>Write to the Void</h1>

    <form id="new-note-form" method="POST">
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Give it a name..." required>
        </div>

        <div class="form-group">
            <label for="content">The Note</label>
            <textarea name="content" id="content" rows="10" placeholder="Type your thoughts..." required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <?php wp_dropdown_categories( array( 'hide_empty' => 0, 'name' => 'category', 'orderby' => 'name', 'selected' => 1 ) ); ?>
        </div>

        <button type="submit" name="submit_note">Save Note</button>
    </form>
</div>

<?php get_footer(); ?>