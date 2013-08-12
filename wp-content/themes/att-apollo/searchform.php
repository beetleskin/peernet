<?php
/**
 * This file is used for displaying search forms
 *
 * Learn more here: http://codex.wordpress.org/Function_Reference/get_search_form
 *
 * @package WordPress Theme
 * @since 1.0
 */
?>

<form method="get" id="searchform" class="searchform att-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'att' ); ?>" />
	<button type="submit" class="submit" id="searchsubmit"><i class="icon-search"></i></button>
</form>