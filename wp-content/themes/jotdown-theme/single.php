<?php get_header(); ?>

<div class="content-area">
    <main class="site-main">
        <?php if (have_posts()): while (have_posts()): the_post(); 
            get_template_part( 'template-parts/content', 'single' );
        ?>
        <?php if ( get_current_user_id() == $post->post_author ) : ?>
            <a href="<?php echo home_url('/edit-note?id=' . get_the_ID()); ?>" class="edit-btn">Edit Note</a>

           <?php 
            $delete_url = add_query_arg([
                'action'  => 'delete',
                'note_id' => get_the_ID(),
            ], home_url('/notes/'));

            // Dito natin idadagdag ang nonce sa URL
            $secure_delete_url = wp_nonce_url($delete_url, 'delete_note_' . get_the_ID());
            ?>

            <a href="<?php echo esc_url($secure_delete_url); ?>" onclick="return confirm('Are you sure?')">Delete</a>
        <?php endif; ?>

        <?php endwhile; else : ?>
            <p>No content available.</p>
        <?php endif; ?>

        <div class="post-navigation-wrapper">
            <?php the_post_navigation( array(
                'prev_text' => '&larr; %title',
                'next_text' => '%title &rarr;',
            ) );
            ?>
        </div>
    </main>

    <aside class="sidebar-area">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>