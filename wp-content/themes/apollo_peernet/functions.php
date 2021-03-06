<?php


add_action( 'after_setup_theme', 'attpeer_theme_setup', 99 );
add_action( 'widgets_init', 'attpeer_widgets_init' );

function attpeer_theme_setup() {
	// Localization support
	load_child_theme_textdomain( 'att', get_stylesheet_directory() . '/lang' );
	
	// disable custom bg due to memory limitation (the thumbnail generation of big images causes a crash which fails the upload ... damn you provider!)
	remove_theme_support('custom-background');
}


function attpeer_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Header','att'),
		'id' => 'header-sidebar',
		'description' => __( 'Widgets in this area are shown at the top of the page.','att' ),
		'before_widget' => '<div class="header-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
}


?>