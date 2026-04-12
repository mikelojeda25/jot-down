<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    
    <div class="entry-meta">
      <span class="posted-on">Posted on <?php echo get_the_date(); ?></span>
      <span class="cat-links">In <?php the_category( ', ' ); ?></span>
    </div>
  </header>

  <div class="entry-content">
    <?php the_content(); ?>
  </div>

  <footer class="entry-footer">
    <?php the_tags( '<span class="tags-links">Tags: ', ', ', '</span>' ); ?>
  </footer>
</article>