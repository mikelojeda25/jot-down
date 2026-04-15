<!DOCTYPE html>
<html class="jd-html">
<head>
    <meta charset="UTF-8">
    <title>Jot down</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('jd-body'); ?>>
    <?php if ( isset($_GET['notif']) ) : ?>
    <div id="jotdown-toast" class="toast-notification">
        <?php 
            if ($_GET['notif'] == 'saved') echo '✨ Thought preserved successfully.';
            if ($_GET['notif'] == 'deleted') echo '🗑️ Thought erased from the void.';
        ?>
    </div>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toast = document.getElementById('jotdown-toast');
    if (toast) {
        // Maghihintay ng 3 seconds bago mag-fade out
        setTimeout(() => {
            toast.classList.add('toast-fade-out');
            // Burahin sa DOM pagkatapos ng transition
            setTimeout(() => { toast.remove(); }, 1000);
            
            // OPTIONAL: Linisin ang URL (tanggalin ang ?notif=saved) nang hindi nag-re-refresh
            const url = new URL(window.location);
            url.searchParams.delete('notif');
            window.history.replaceState({}, '', url);
        }, 3000);
    }
});
</script>
    <header class="site-header">
        <h1 class="site-branding-title">Jot down</h1>
        <nav class="site-navigation">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation'
                ));
            ?>

            <ul class="auth-nav user-auth-nav">
            <?php if ( is_user_logged_in() ) : ?>
                <li class="user-auth-item"><a class="user-auth-link" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
            <?php else : ?>
                <li class="user-auth-item"><a class="user-auth-link" href="<?php echo site_url('/login'); ?>">Login</a></li>
                <li class="user-auth-item"><a class="user-auth-link" href="<?php echo site_url('/register'); ?>">Sign Up</a></li>
            <?php endif; ?>
        </ul>
        </nav>
    </header>