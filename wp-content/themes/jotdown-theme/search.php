<?php get_header(); ?>

<div class="content-area">
  <main>
    <header class="search-header">
      <h1 class="search-header">
        Search Result for: <?php echo get_search_query(); ?>
      </h1>
    </header>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_template_part('template-parts/content'); ?>
    <?php endwhile; else : ?>
      <p>No post available.</p>
    <?php endif; ?>

    <div class="pagination">
        <?php 
            echo paginate_links(array(
                'prev_text' => '&laquo; Prev',
                'next_text' => 'Next &raquo;',
            ));
        ?>
    </div>
  </main>

  <aside style="flex: 1;">
    <?php get_sidebar(); ?>
  </aside>
  </div>

<?php get_footer(); ?>