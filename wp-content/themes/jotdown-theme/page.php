<?php get_header(); ?>

<h1>Page</h1>
<main>
  <?php if (have_posts()): while (have_posts()): the_post(); ?>

  <article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div><?php the_content(); ?></div>
  </article>

  <?php endwhile; else : ?>
    <p>No page available.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>