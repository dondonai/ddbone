<?php

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Remove comments frontend. Useful if replacing WP commenting with Disqus.
 *
 * @since 2.0.10
 */
// remove_action( 'genesis_comments', 'genesis_do_comments' );
// remove_action( 'genesis_comment_form', 'genesis_do_comment_form' );

/*
 * Remove pings frontend.
 *
 * @since 2.0.16
 */
// remove_action( 'genesis_pings', 'genesis_do_pings' );

/*
 * Remove the entire comments area frontend, including comments, reply form, and pings.
 *
 * @since 2.0.16
 */
// remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

//* Modify the speak your mind title in comments
add_filter( 'comment_form_defaults', 'sp_comment_form_defaults' );
function sp_comment_form_defaults( $defaults ) {

	$defaults['title_reply'] = __( 'Leave a Comment' );
	return $defaults;

}

//* Modify comments title text in comments
add_filter( 'genesis_title_comments', 'sp_genesis_title_comments' );
function sp_genesis_title_comments() {
	$title = '<h3>Discussion</h3>';
	return $title;
}
