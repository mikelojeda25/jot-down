<form role="search" method="get" class="search-form site-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="search-field-wrap">
        <span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" 
               placeholder="Search notes..." 
               value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="dashicons dashicons-search"></span> Search
    </button>

    <?php $sort_logic = $_GET['sort_logic'] ?? ''; ?>

    <select class="search-sort-select" name="sort_logic" onchange="this.form.submit()">
        <option value="date-DESC" <?php selected($sort_logic, 'date-DESC'); ?>>Newest First</option>
        <option value="date-ASC" <?php selected($sort_logic, 'date-ASC'); ?>>Oldest First</option>
        <option value="title-ASC" <?php selected($sort_logic, 'title-ASC'); ?>>Title (A-Z)</option>
        <option value="title-DESC" <?php selected($sort_logic, 'title-DESC'); ?>>Title (Z-A)</option>
    </select>
</form>