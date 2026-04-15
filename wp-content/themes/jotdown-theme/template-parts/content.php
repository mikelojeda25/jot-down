<article class="content-card content-card--post">
      <h2 class="content-card-title"><a class="content-card-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="content-card-excerpt"> <?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
    </article>