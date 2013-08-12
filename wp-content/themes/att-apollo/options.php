<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_att_themes';
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'att'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();
	
	//GENERAL	
	$options[] = array(
		'name'	=> __('General', 'att'),
		'type'	=> 'heading');
		
	$options[] = array(
		'name'	=> __('Custom Logo', 'att'),
		'desc'	=> __('Upload your custom logo.', 'att'),
		'std'	=> '',
		'id'	=> 'custom_logo',
		'type'	=> 'upload');
		
	$options[] = array(
		"name"	=> __('Toggle: Site Description', 'att'),
		"desc"	=> __('Check this box to show the site description under the logo area.', 'att'),
		"id"	=> "site_description",
		"std"	=> "1",
		"type"	=> "checkbox");
	
	$options[] = array(
		"name"	=> __('Header Ad', 'att'),
		"desc"	=> __('Use this field to add a banner to your header.', 'att'),
		"id"	=> "header_ad",
		"std"	=> '<a href="http://www.authenticthemes.com"><img src="http://authenticthemes.s3.amazonaws.com/ads/set3/468x80.png" alt="Gain Access to all of the Authentic Themes WordPress Themes for only $40" title="Gain Access to all of the Authentic Themes WordPress Themes for only $40" /></a>',
		"type"	=> "textarea");
						
	$options[] = array(
		"name"	=> __('Toggle: Featured Images on Single Blog Posts', 'att'),
		"desc"	=> __('Check this box to enable featured images on single blog posts.', 'att'),
		"id"	=> "blog_single_thumbnail",
		"std"	=> "1",
		"type"	=> "checkbox");
		
	$options[] = array(
		"name"	=> __('Custom Copyright', 'att'),
		"desc"	=> __('Enter your custom copyright info here', 'att'),
		"id"	=> "custom_copyright",
		"std"	=> "",
		"type"	=> "textarea");
		
	//SOCIAL	
	$options[] = array(
		'name'	=> __('Social', 'att'),
		'type'	=> 'heading');
			
	$options['social'] = array(
		'name'	=> __('Social?', 'att'),
		'desc'	=> __('Check box to enable the social in the theme header.', 'att'),
		'id'	=> 'social',
		'std'	=> '1',
		'type'	=> 'checkbox');

		$social_links = att_social_links(); // Get social links array
		
		// Loop through each social option and create a theme option
		foreach($social_links as $social_link) {
		$options[] = array( "name"	=> ucfirst($social_link),
							'desc'	=> ' '. __('Enter your ','att') . $social_link . __(' url','att') .' <br />'. __('Include http:// at the front of the url.', 'att'),
							'id'	=> $social_link,
							'std'	=> '',
							'type'	=> 'text');
		}
		
			
	return $options;
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php } ?>