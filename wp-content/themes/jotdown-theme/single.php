<?php get_header(); ?>

<div class="content-area">
    <main class="site-main">
        <?php if (have_posts()): while (have_posts()): the_post(); 
            get_template_part( 'template-parts/content', 'single' );
        ?>
        <?php if ( get_current_user_id() == $post->post_author ) : ?>
            <a href="<?php echo home_url('/edit-note?id=' . get_the_ID()); ?>" class="edit-btn">Edit Note</a>

            <a href="<?php echo esc_url(add_query_arg(array('action' => 'delete', 'note_id' => get_the_ID()), home_url())); ?>" 
            class="delete-btn" 
            onclick="return confirm('WARNING! Deleting this means you won\'t get this note again')">
            Delete
    </a>
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