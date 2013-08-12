<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for pages area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    /* ----------------------------------------------------------------------------------- */
    /* Sidebar */
    /* ----------------------------------------------------------------------------------- */

    /* Single Page */
    array('name' => 'Single Page',
        'id' => TF_THEME_PREFIX . '_side_media',
        'type' => 'metabox',
        'context' => 'side',
        'priority' => 'low' /* high/low */
    ),
    // Disable Page Comments
    array('name' => 'Disable Comments',
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_disable_comments',
        'value' => tfuse_options('disable_page_comments','true'),
        'type' => 'checkbox',
        'divider' => true
    ),
    // Page Title
    array('name' => 'Page Title',
        'desc' => 'Select your preferred Page Title.',
        'id' => TF_THEME_PREFIX . '_page_title',
        'value' => 'default_title',
        'options' => array('hide_title' => 'Hide Page Title', 'default_title' => 'Default Title', 'custom_title' => 'Custom Title'),
        'type' => 'select'
    ),
    // Custom Title
    array('name' => 'Custom Title',
        'desc' => 'Enter your custom title for this page.',
        'id' => TF_THEME_PREFIX . '_custom_title',
        'value' => '',
        'type' => 'text'
    ),
    
    /* ----------------------------------------------------------------------------------- */
    /* After Textarea */
    /* ----------------------------------------------------------------------------------- */

    /* Header Options */
    array('name' => 'Header',
        'id' => TF_THEME_PREFIX . '_header_option',
        'type' => 'metabox',
        'context' => 'normal'
    ),
    // Element of Hedear
    array('name' => 'Element of Hedear',
        'desc' => 'Select type of element on the header.',
        'id' => TF_THEME_PREFIX . '_header_element',
        'value' => 'without',
        'options' => array('without' => 'Without Header Element','map' => 'Map on Header','slider' => 'Slider on Header'),
        'type' => 'select',
    ),
    // Select Slider
    $this->ext->slider->model->has_sliders() ?
            array(
        'name' => 'Slider',
        'desc' => 'Select a slider for your post. The sliders are created on the <a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">Sliders page</a>.',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
        'type' => 'select'
            ) :
            array(
        'name' => 'Slider',
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'html' => 'No sliders created yet. You can start creating one <a href="' . admin_url('admin.php?page=tf_slider_list') . '">here</a>.',
        'type' => 'raw'
            )
    ,
    array(
        'name' => 'Map position',
        'id' => TF_THEME_PREFIX . '_page_map',
        'value' => '',
        'type' => 'maps'
    ),
    
    //Ads
    array('name' => 'Ads',
        'id' => TF_THEME_PREFIX . '_post_ads',
        'type' => 'metabox',
        'context' => 'normal'
    ),
    //top ad
    array('name' => 'Enable 728x90 banner ',
            'desc' => 'Enable the top banner space. Note: you can set specific banner for all pages in the <a href="' . admin_url('admin.php?page=themefuse') . '">theme framowork options</a>',
            'id' => TF_THEME_PREFIX . '_top_ad_space',
            'value' => 'false',
            'options' => array('false' => 'No', 'true' => 'Yes'),
            'type' => 'select',
    ),
    array(
            'name'=>'Ad image(728px x 90px)',
            'desc'=>'Enter the URL to the ad image 728x90 location',
            'id'=> TF_THEME_PREFIX . '_top_ad_image',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_top_ad_url',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_top_ad_adsense',
            'value' => '',
            'type' =>'textarea',
            'divider' => true
    ),

    //125x125 ad
    array('name' => 'Enable 125x125 banners',
            'desc' => 'Enable before content banner space. Note: you can set specific banners for all pages in the <a href="' . admin_url('admin.php?page=themefuse') . '">theme framowork options</a>',
            'id' => TF_THEME_PREFIX . '_bfcontent_ads_space',
            'value' => 'false',
            'options' => array('false' => 'No', 'true' => 'Yes'),
            'type' => 'select'
    ),
    array('name' => 'Type of ads',
            'desc' => 'Choose the type of your adds.',
            'id' => TF_THEME_PREFIX . '_bfcontent_type',
            'value' => 'image',
            'options' => array('image' => 'Image Type', 'adsense' => 'Adsense Type'),
            'type' => 'select'
    ),
    array('name' => 'No of 125x125 ads',
            'desc' => 'Choose the numbers of ads to display before content.',
            'id' => TF_THEME_PREFIX . '_bfcontent_number',
            'value' => '7',
            'options' => array('one' => '1', 'two' => '2' , 'three' => '3', 'four' => '4', 'five' => '5', 'six' => '6', 'seven' => '7'),
            'type' => 'select'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image1',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url1',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense1',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image2',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url2',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense2',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image3',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url3',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense3',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image4',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url4',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense4',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image5',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url5',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense5',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image6',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url6',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense6',
            'value' => '',
            'type' =>'textarea'
    ),
    array(
            'name'=>'Ad image (125px x 125px)',
            'desc'=>'Enter the URL to the ad image 125x125 location',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_image7',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_url7',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code for before content ads',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_bfcontent_ads_adsense7',
            'value' => '',
            'type' =>'textarea',
            'divider' => true
    ),
    //468x60
    array('name' => 'Enable 468x60 banner ',
            'desc' => 'Enable after content banner space. Note: you can set specific banner for all pages in the <a href="' . admin_url('admin.php?page=themefuse') . '">theme framowork options</a>',
            'id' => TF_THEME_PREFIX . '_hook_space',
            'value' => 'false',
            'options' => array('false' => 'No', 'true' => 'Yes'),
            'type' => 'select',
    ),
    array(
            'name'=>'Ad image(468px x 60px)',
            'desc'=>'Enter the URL to the ad image 468x60 location',
            'id'=> TF_THEME_PREFIX . '_hook_image',
            'value' => '',
            'type' =>'upload'
    ),
    array(
            'name'=>'Ad URL',
            'desc'=>'Enter the URL where this ad points to.',
            'id'=> TF_THEME_PREFIX . '_hook_url',
            'value' => '',
            'type' =>'text'
    ),
    array(
            'name'=>'Adsense code',
            'desc'=>'Enter your adsense code (or other ad network code) here.',
            'id'=> TF_THEME_PREFIX . '_hook_adsense',
            'value' => '',
            'type' =>'textarea',
    ),
    /* Content Options */
    array('name' => 'Content Options',
        'id' => TF_THEME_PREFIX . '_content_option',
        'type' => 'metabox',
        'context' => 'normal'
    ),
    // Top Shortcodes
    array('name' => 'Shortcodes before Content',
        'desc' => 'In this textarea you can input your prefered custom shotcodes.',
        'id' => TF_THEME_PREFIX . '_content_top',
        'value' => '',
        'type' => 'textarea'
    ),
    // Bottom Shortcodes
    array('name' => 'Shortcodes after Content',
        'desc' => 'In this textarea you can input your prefered custom shotcodes.',
        'id' => TF_THEME_PREFIX . '_content_bottom',
        'value' => '',
        'type' => 'textarea'
    )
);

/* * *********************************************************
  Advanced
 * ********************************************************** */
?>