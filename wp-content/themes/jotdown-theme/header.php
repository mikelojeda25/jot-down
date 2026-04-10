<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jot down</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class()?>>
    <header>
        <h1>Jot down</h1>
        <nav>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation'
                ));
            ?>
        </nav>
    </header>