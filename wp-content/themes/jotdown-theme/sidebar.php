<aside id="secondary" class="widget-area">
  <?php if (is_active_sidebar('main-sidebar')):?>
    <?php get_search_form(); ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
    
  <?php else : ?>
    <p>Add widgets in the admin dashboard</p>
  <?php endif; ?>
</aside>