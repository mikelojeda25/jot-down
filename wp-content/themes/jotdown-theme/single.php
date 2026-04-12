<?php get_header(); ?>

<main>
  <?php if (have_posts()): while (have_posts()): the_post(); 
    get_template_part( 'template-parts/content', 'single' );
  ?>


  <?php endwhile; else : ?>
    <p>No content available.</p>
  <?php endif; ?>

  <?php the_post_navigation( array(
      'prev_text' => '&larr; %title',
      'next_text' => '%title &rarr;',
  ) );
  ?>
</main>

<?php get_footer(); ?>