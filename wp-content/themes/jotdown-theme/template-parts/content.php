<article>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div> <?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
    </article>