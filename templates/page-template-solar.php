<?php
/*
Template Name: Solar
*/

get_header();
$layout = new SyrcuitThemeLayout;
echo $layout->build_page( $post->ID );
get_footer();
