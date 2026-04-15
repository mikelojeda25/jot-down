<article id="post-<?php the_ID(); ?>" <?php post_class('single-entry-card'); ?>>
  <header class="entry-header single-entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    
    <div class="entry-meta single-entry-meta">
      <span class="posted-on single-meta-item">Posted on <?php echo get_the_date(); ?></span>
      <span class="cat-links single-meta-item">In <?php the_category( ', ' ); ?></span>
    </div>
  </header>

  <div class="entry-content single-entry-content">
    <?php the_content(); ?>
  </div>

  <footer class="entry-footer single-entry-footer">
    <?php the_tags( '<span class="tags-links">Tags: ', ', ', '</span>' ); ?>
  </footer>
</article>