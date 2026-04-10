<?php get_header(); ?>

<div class="content-area">
  <main>
    <header class="archive-header">
    <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
    ?>
    </header>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div> <?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
    </article>
    <?php endwhile; else : ?>
      <p>No post available.</p>
    <?php endif; ?>

    <div class="pagination">
        <?php 
            echo paginate_links(array(
                'prev_text' => '&laquo; Prev',
                'next_text' => 'Next &raquo;', // Dagdagan mo ng semicolon dito sa dulo ng raquo
            ));
        ?>
    </div>
  </main>

  <aside style="flex: 1;">
    <?php get_sidebar(); ?>
  </aside>
  </div>

<?php get_footer(); ?>