<?php
	get_header();
	$layout = new SyrcuitThemeLayout;
	echo $layout->build_page( '', true );
	get_footer();
