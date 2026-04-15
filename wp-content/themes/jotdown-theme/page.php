<?php get_header(); ?>

<main class="main-content main-content--page">
  <h1 class="page-heading">Page</h1>
  <?php if (have_posts()): while (have_posts()): the_post(); ?>

  <article class="content-card content-card--page">
    <h2 class="content-card-title"><a class="content-card-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="content-card-body"><?php the_content(); ?></div>
  </article>

  <?php endwhile; else : ?>
    <p class="empty-state-message">No page available.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>