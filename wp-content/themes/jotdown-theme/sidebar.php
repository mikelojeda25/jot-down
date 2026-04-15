<aside id="secondary" class="widget-area site-sidebar">
  <?php if (is_active_sidebar('main-sidebar')):?>
    <?php get_search_form(); ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
    
  <?php else : ?>
    <p class="sidebar-empty-message">Add widgets in the admin dashboard</p>
  <?php endif; ?>
</aside>