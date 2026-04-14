<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jot down</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class()?>>
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