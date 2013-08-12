<?php

/**
 * Testimonials
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * title:
 * order: RAND, ASC, DESC
 */
function tfuse_testimonials($atts, $content = null) {
    global $testimonials_uniq;
    extract(shortcode_atts(array( 'order ' => 'RAND'), $atts));
    
    $slide = $nav = $single = '';
	$title = '';
    $testimonials_uniq = rand(1, 300);

    if (!empty($order) && ($order == 'ASC' || $order == 'DESC'))
        $order = '&order=' . $order;
    else
        $order = '&orderby=rand';

    query_posts('post_type=testimonials&posts_per_page=-1' . $order);
    $k = 0;
    
    if (have_posts()) {
        while (have_posts()) {
           
            $k++;
            the_post();
             $id = get_the_ID();
             $img = tfuse_page_options('img');
            $positions = '';
            $terms = get_the_terms(get_the_ID(), 'testimonials');
                
            if (!is_wp_error($terms) && !empty($terms))
                foreach ($terms as $term)
                    $positions .= ', ' . $term->name;
            if(!empty($img)) $img = '<img src="'.$img .'" width="58" height="58" alt="" class="alignleft">';
            $slide .= '
                <div class="slide">
                    <div class="quote-text">
                    ' . $img .get_the_excerpt() . '
                    </div><!--/ .quote-text -->
                    <div class="quote-author">
                        <span>' . get_the_title() . '</span>
                        ' . $positions . '
                    </div><!--/ .quote-author -->
                </div><!--/ .slide -->
        ';
        } // End WHILE Loop
    } // End IF Statement
    wp_reset_query();

    if ($k > 1) {
        $nav = '<a href="#" class="prev" >' . __('Prev', 'tfuse') . '</a>
        <a href="#" class="next"  >' . __('Next', 'tfuse') . '</a>';
    }
    else
        $single = ' style="display: block"';

    $output = '
    <div id="testimonials'.$testimonials_uniq.'" class="slideshow slideQuotes">
        ' . $title . '
        <div class="slides_container"' . $single . '>
        ' . $slide . '
        </div><!--/ .slides_container -->
        ' . $nav . '
		 <div class="clear"></div>
    </div><!--/ .slideshow slideQuotes -->
    <script>
            jQuery(document).ready(function($) {
                    $("#testimonials'.$testimonials_uniq.'").slides({
                            hoverPause: true,
                            autoHeight: true,
                            pagination: true,
                            generatePagination: true,
                            effect: "fade",
                            fadeSpeed: 150});
            });		
    </script>  ';

    return $output;
}

$atts = array(
    'name' => 'Testimonials',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 11,
    'options' => array(
        array(
            'name' => 'Order',
            'desc' => 'Select display order',
            'id' => 'tf_shc_testimonials_order',
            'value' => 'DESC',
            'options' => array(
                'RAND' => 'Random',
                'ASC' => 'Ascending',
                'DESC' => 'Descending'
            ),
            'type' => 'select'
        )
    )
);

tf_add_shortcode('testimonials', 'tfuse_testimonials', $atts);
