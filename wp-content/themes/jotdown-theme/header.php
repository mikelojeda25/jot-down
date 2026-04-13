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

            <ul class="auth-nav">
            <?php if ( is_user_logged_in() ) : ?>
                <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
            <?php else : ?>
                <li><a href="<?php echo site_url('/login'); ?>">Login</a></li>
                <li><a href="<?php echo site_url('/register'); ?>">Sign Up</a></li>
            <?php endif; ?>
        </ul>
        </nav>
    </header>