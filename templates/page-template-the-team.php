<?php
/*
Template Name: The Team
*/

get_header();
$layout = new SyrcuitThemeLayout;
echo $layout->build_page( $post->ID );
get_footer();
