<?php

add_action( 'wp_print_styles', 'tfuse_add_css' );
add_action( 'wp_print_scripts', 'tfuse_add_js' );

if ( ! function_exists( 'tfuse_add_css' ) ) :
/**
 * This function include files of css.
 */
    function tfuse_add_css()
    {
        $template_directory = get_template_directory_uri();
        
        wp_register_style( 'screen_css', $template_directory.'/screen.css');
        wp_enqueue_style( 'screen_css' );

        wp_register_style( 'cusel', $template_directory.'/css/cusel.css', false, '' );
        wp_enqueue_style( 'cusel' );

        wp_register_style( 'custom_admin', $template_directory.'/css/custom_admin.css', false, '' );
        wp_enqueue_style( 'custom_admin`' );
        
        wp_register_style( 'prettyPhoto', TFUSE_ADMIN_CSS . '/prettyPhoto.css', false, '' );
        wp_enqueue_style( 'prettyPhoto' );
        
        wp_register_style( 'shCore', $template_directory . '/css/shCore.css', true, '' );
        wp_enqueue_style( 'shCore' );
        
        wp_register_style( 'shThemeDefault', $template_directory . '/css/shThemeDefault.css', true, '' );
        wp_enqueue_style( 'shThemeDefault' );

    }
endif;


if ( ! function_exists( 'tfuse_add_js' ) ) :
/**
 * This function include files of javascript.
 */
    function tfuse_add_js()
    {
        $template_directory = get_template_directory_uri();

        wp_enqueue_script( 'jquery' );
        
        wp_register_script( 'modernizr', tfuse_get_file_uri('/js/libs/modernizr.min.js'), array('jquery'), '', false );
        wp_enqueue_script( 'modernizr' );	
		
        wp_register_script( 'respond', tfuse_get_file_uri('/js/libs/respond.min.js'), array('jquery'), '', false );
        wp_enqueue_script( 'respond' );	
        
        wp_register_script( 'jquery.min', tfuse_get_file_uri('/js/libs/jquery.min.js'), array('jquery'), '', false );
        wp_enqueue_script( 'jquery.min' );

		wp_register_script( 'jquery.easing', $template_directory.'/js/jquery.easing.1.3.min.js', array('jquery'), '', false );
        wp_enqueue_script( 'jquery.easing' );
		
		wp_register_script( 'hoverIntent', $template_directory.'/js/hoverIntent.js', array('jquery'), '', false );
        wp_enqueue_script( 'hoverIntent' );

        wp_register_script( 'general', tfuse_get_file_uri('/js/general.js'), array('jquery'), '', false );
        wp_enqueue_script( 'general' );
		
		 wp_register_script( 'carouFredSel', $template_directory.'/js/jquery.carouFredSel.packed.js', array('jquery'), '', false );
        wp_enqueue_script( 'carouFredSel' );
		
		 wp_register_script( 'touchSwipe', $template_directory.'/js/jquery.touchSwipe.min.js', array('jquery'), '', false );
        wp_enqueue_script( 'touchSwipe' );
        
        wp_register_script( 'cusel-min', $template_directory.'/js/cusel-min.js', array('jquery'), '', false );
        wp_enqueue_script( 'cusel-min' );
        
        wp_register_script( 'jquery.tools', $template_directory.'/js/jquery.tools.min.js', array('jquery'), '', false );
        wp_enqueue_script( 'jquery.tools' );
        
        wp_register_script( 'slides.min.jquery', $template_directory.'/js/slides.min.jquery.js', array('jquery'), '', false );
        wp_enqueue_script( 'slides.min.jquery' );
        
        wp_register_script( 'infieldlabel', $template_directory.'/js/jquery.infieldlabel.min.js', array('jquery'), '', false );
        wp_enqueue_script( 'infieldlabel' );
        
        wp_register_script( 'mousewheel', $template_directory.'/js/jquery.mousewheel.min.js', array('jquery'), '', false );
        wp_enqueue_script( 'mousewheel' );
        
        wp_register_script( 'customInput', $template_directory.'/js/jquery.customInput.js', array('jquery'), '', false );
        wp_enqueue_script( 'customInput' );
        
        wp_register_script( 'prettyPhoto', TFUSE_ADMIN_JS . '/jquery.prettyPhoto.js', array('jquery'), '3.1.4', false );
        wp_enqueue_script( 'prettyPhoto' );
        
        wp_register_script( 'jquery.gmap', $template_directory.'/js/jquery.gmap.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery.gmap' );
        
        // JS is include on the footer
        wp_register_script( 'shCore', $template_directory.'/js/shCore.js', array('jquery'), '', true );
        wp_enqueue_script( 'shCore' );
        
        wp_register_script( 'shBrushPlain', $template_directory.'/js/shBrushPlain.js', array('jquery'), '', true );
        wp_enqueue_script( 'shBrushPlain' );      
        
        wp_register_script( 'SyntaxHighlighter', $template_directory.'/js/SyntaxHighlighter.js', array('jquery'), '', true );
        wp_enqueue_script( 'SyntaxHighlighter' );

    }
endif;
