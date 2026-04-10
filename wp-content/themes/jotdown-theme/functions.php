<?php
function jotdown_files(){
  wp_enqueue_style('jotdown_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'jotdown_files');

function jotdown_features(){
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
}

add_action('after_setup_theme','jotdown_features');