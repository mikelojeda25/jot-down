<?php get_header(); ?>

<div class="content-area">
    <main class="site-main">
        <?php if (have_posts()): while (have_posts()): the_post(); 
            get_template_part( 'template-parts/content', 'single' );
        ?>

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