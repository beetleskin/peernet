<?php
/**
 * Play slider's configurations
 *
 * @since  Gadgetry 1.0
 */

$options = array(
    'tabs' => array(
        array(
            'name' => 'Slider Settings',
            'id' => 'slider_settings', #do no t change this ID
            'headings' => array(
                array(
                    'name' => 'Slider Settings',
                    'options' => array(
                        array('name' => 'Slider Title',
                            'desc' => 'Change the title of your slider. Only for internal use (Ex: Homepage)',
                            'id' => 'slider_title',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true),
                        array('name' => 'Resize images?',
                            'desc' => 'Want to let our script to resize the images for you? Or do you want to have total control and upload images with the exact slider image size?',
                            'id' => 'slider_image_resize',
                            'value' => 'false',
                            'type' => 'checkbox')
                    )
                )
            )
        ),
        array(
            'name' => 'Add/Edit Slides',
            'id' => 'slider_setup', #do not change ID
            'headings' => array(
                array(
                    'name' => 'Add New Slide', #do not change
                    'options' => array(
                        array('name' => 'Title',
                            'desc' => ' The Title is displayed on the image and will be visible by the users',
                            'id' => 'slide_title',
                            'value' => '',
                            'type' => 'text',
                            'required' => TRUE,
                            'divider' => true),
                        array('name' => 'URL',
                            'desc' => 'When a user will click the image, the browser will load this URL.',
                            'id' => 'slide_url',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true),
                        array('name' => 'Title position',
                            'desc' => 'Choose your preferred title position.',
                            'id' => 'slide_position',
                            'value' => 'left-mid',
                            'options' => array('left-mid' => 'Left-Middle', 'left-top' => 'Left-Top','left-bot' => 'Left-Bottom','center-mid' => 'Center-Middle','center-top' => 'Center-Top'
                                                ,'center-bot' => 'Center-Bottom','right-mid' => 'Right-Middle','right-top' => 'Right-Top','right-bot' => 'Right-Bottom'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => 'Title color',
                            'desc' => 'Choose your preferred title color.',
                            'id' => 'slide_title_color',
                            'value' => '',
                            'type' => 'colorpicker',
                            'divider' => true
                        ),
                        // Custom Favicon Option
                        array('name' => 'Image <br />(948px × 372px)',
                            'desc' => 'You can upload an image from your hard drive or use one that was already uploaded by pressing  "Insert into Post" button from the image uploader plugin.',
                            'id' => 'slide_src',
                            'value' => '',
                            'type' => 'upload',
                            'media' => 'image',
                            'required' => TRUE)
                    )
                )
            )
        ),
        array(
            'name' => 'Category Setup',
            'id' => 'slider_type_categories',
            'headings' => array(
                array(
                    'name' => 'Category options',
                    'options' => array(
                        array(
                            'name' => 'Select specific categories',
                            'desc' => 'Pick one or more 
categories by starting to type the category name. If you leave blank the slider will fetch images 
from all <a target="_new" href="' . get_admin_url() . 'edit-tags.php?taxonomy=category">Categories</a>.',
                            'id' => 'categories_select',
                            'type' => 'multi',
                            'subtype' => 'category'
                        ),
                         array('name' => 'Title position',
                            'desc' => 'Choose your preferred title position.',
                            'id' => 'sliders_position',
                            'value' => 'left-mid',
                            'options' => array('random' => 'Random','left-mid' => 'Left-Middle', 'left-top' => 'Left-Top','left-bot' => 'Left-Bottom','center-mid' => 'Center-Middle','center-top' => 'Center-Top'
                                                ,'center-bot' => 'Center-Bottom','right-mid' => 'Right-Middle','right-top' => 'Right-Top','right-bot' => 'Right-Bottom'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => 'Title color',
                            'desc' => 'Choose your preferred title color.',
                            'id' => 'sliders_title_color',
                            'value' => 'post_yellow',
                            'options' => array('random' => 'Random','post_yellow' => 'Yellow', 'post_green' => 'Green','post_purple' => 'Purple','post_red' => 'Red','post_blue' => 'Blue'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array(
                            'name' => 'Number of images in the slider',
                            'desc' => 'How many images do you want in the slider?',
                            'id' => 'sliders_posts_number',
                            'value' => 6,
                            'type' => 'text'
                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Posts Setup',
            'id' => 'slider_type_posts',
            'headings' => array(
                array(
                    'name' => 'Posts options',
                    'options' => array(
                        array(
                            'name' => 'Select specific Posts',
                            'desc' => 'Pick one or more <a target="_new" href="' . get_admin_url() . 'edit.php">posts</a> by starting to type the Post name. The slider will be populated with images from the posts 
                                        you selected.',
                            'id' => 'posts_select',
                            'type' => 'multi',
                            'subtype' => 'post'
                        ),
                         array('name' => 'Title position',
                            'desc' => 'Choose your preferred title position.',
                            'id' => 'sliders_position',
                            'value' => 'left-mid',
                            'options' => array('random' => 'Random','left-mid' => 'Left-Middle', 'left-top' => 'Left-Top','left-bot' => 'Left-Bottom','center-mid' => 'Center-Middle','center-top' => 'Center-Top'
                                                ,'center-bot' => 'Center-Bottom','right-mid' => 'Right-Middle','right-top' => 'Right-Top','right-bot' => 'Right-Bottom'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => 'Title color',
                            'desc' => 'Choose your preferred title color.',
                            'id' => 'sliders_title_color',
                            'value' => 'post_yellow',
                            'options' => array('random' => 'Random','post_yellow' => 'Yellow', 'post_green' => 'Green','post_purple' => 'Purple','post_red' => 'Red','post_blue' => 'Blue'),
                            'type' => 'select'
                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Tags Setup',
            'id' => 'slider_type_tags',
            'headings' => array(
                array(
                    'name' => 'Tags options',
                    'options' => array(
                        array(
                            'name' => 'Select specific tags',
                            'desc' => 'Pick one or more <a target="_new" href="' . get_admin_url() . 'edit-tags.php?taxonomy=post_tag">tags</a> by starting to type the tag name. The slider will be populated with images from posts 
that have the selected tags.',
                            'id' => 'tags_select',
                            'type' => 'multi',
                            'subtype' => 'post_tag'
                        ),
                        array('name' => 'Title position',
                            'desc' => 'Choose your preferred title position.',
                            'id' => 'sliders_position',
                            'value' => 'left-mid',
                            'options' => array('random' => 'Random','left-mid' => 'Left-Middle', 'left-top' => 'Left-Top','left-bot' => 'Left-Bottom','center-mid' => 'Center-Middle','center-top' => 'Center-Top'
                                                ,'center-bot' => 'Center-Bottom','right-mid' => 'Right-Middle','right-top' => 'Right-Top','right-bot' => 'Right-Bottom'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => 'Title color',
                            'desc' => 'Choose your preferred title color.',
                            'id' => 'sliders_title_color',
                            'value' => 'post_yellow',
                            'options' => array('random' => 'Random','post_yellow' => 'Yellow', 'post_green' => 'Green','post_purple' => 'Purple','post_red' => 'Red','post_blue' => 'Blue'),
                            'type' => 'select',
                            'divider' => true
                        )
                    )
                )
            )
        )
    )
);

$options['extra_options'] = array();
?>