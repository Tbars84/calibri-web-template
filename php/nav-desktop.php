<?php 

wp_nav_menu(
	array(
		'theme_location' => 'header-nav',
		'container_class' => '',
		'container_id' => '',
		'link_class'   => 'nav-link',
		'container' => false,
		'before' => '<div class="menu-snippet"><img src="'. get_template_directory_uri().'/img/menu-snippet.svg" alt=""></div>',
		'items_wrap' => '<ul class="menu">%3$s</ul>',
		'after' => ''
	)
);

?>