<?php get_header(); ?>

<h1>Single</h1>
<main>
  <?php if (have_posts()): while (have_posts()): the_post(); ?>

  <article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="meta">
      Posted on <?php the_time('F j, Y'); ?>
      by <?php the_author(); ?>
    </p>
    <div><?php the_content(); ?></div>
  </article>

  <?php endwhile; else : ?>
    <p>No content available.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>