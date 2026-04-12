<?php get_header(); ?>

<div class="content-area error-404-container">
    <main class="error-404-content">
        <h1 class="error-title">404</h1>
        <h2 class="error-subtitle">The page you are looking for could not be found.</h2>
        
        <p class="error-text">
            The link may be broken, or the page may have been removed. 
            Please try searching for the content or return to the homepage.
        </p>
        
        <div class="search-form-wrapper">
            <?php get_search_form(); ?>
        </div>

        <a href="<?php echo home_url(); ?>" class="btn-back-home">
            Return to Homepage
        </a>
    </main>
</div>

<?php get_footer(); ?>