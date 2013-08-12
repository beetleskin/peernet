<?php

/**
 * Twitter
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * items: 5
 * username:
 * title:
 * post_date:
 */

function tfuse_twitter($atts, $content = null)
{
    extract(shortcode_atts(array(
            'items' => 5,
            'username' => '',
            'title' => '',
            'post_date' => '',
    ), $atts));
    
    $return_html = ''; $count = 0;

   if ( !empty($username) )
    {
        require_once ( TFUSE . '/helpers/TWITTER.php' );

        $obj_twitter = new Twitter($username);
        $tweets = $obj_twitter->getJSON($items);
        
        $return_html .= '<div class="widget-container widget_twitter">';

        if (!empty($title))
            $return_html .= '<h3 class="widget-title">' . $title . '</h3><div class="tweet_list"> ';
    
        foreach ( $tweets as $tweet )
        {
            if($count == $items) break;
            $count++;
            $return_html .= '<div class="tweet_item">';
            $return_html .= '<div class="tweet_image"><img src="'.$tweet->user->profile_image_url.'" width="58" height="58" alt="" /></div>';
            if( isset($tweet->text) )
            {
                $return_html .= '<div class="tweet_text">
		                    	<div class="inner">'.$tweet->text.
                                '</div></div>' ;
            }
            if ( !empty($tweet->created_at) )
                $return_html .= '<span class="tweet_time">'.$tweet->created_at.'</span>';

            $return_html .= '<div class="clear"></div></div>';
        }

        $return_html .= '</div></div>';
    }

    return $return_html;
}

$atts = array(
    'name' => 'Twitter',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 11,
    'options' => array(
        array(
            'name' => 'Items',
            'desc' => 'Enter the number of tweets',
            'id' => 'tf_shc_twitter_items',
            'value' => '5',
            'type' => 'text'
        ),
        array(
            'name' => 'Title',
            'desc' => 'Specifies the title of an shortcode',
            'id' => 'tf_shc_twitter_title',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => 'Username',
            'desc' => 'Twitter username',
            'id' => 'tf_shc_twitter_username',
            'value' => '',
            'type' => 'text'
        )
    )
);

tf_add_shortcode('twitter', 'tfuse_twitter', $atts);
