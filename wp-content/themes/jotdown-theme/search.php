<?php get_header(); ?>

<div class="content-area page-layout">
  <main class="main-content main-content--search">
    <header class="search-header page-section-header">
      <h1 class="search-title">
        Search Result for: <?php echo get_search_query(); ?>
      </h1>
    </header>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_template_part('template-parts/content'); ?>
    <?php endwhile; else : ?>
      <p class="empty-state-message">No post available.</p>
    <?php endif; ?>

    <div class="pagination content-pagination">
        <?php 
            echo paginate_links(array(
                'prev_text' => '&laquo; Prev',
                'next_text' => 'Next &raquo;',
            ));
        ?>
    </div>
  </main>

  <aside class="sidebar-shell" style="flex: 1;">
    <?php get_sidebar(); ?>
  </aside>
  </div>

<?php get_footer(); ?>