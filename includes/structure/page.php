<?php

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_after_header', 'bfg_page_featured_image_header' );
add_action( 'genesis_entry_header', 'bfg_no_page_title' );

// Remove default title on pages only
function bfg_no_page_title() {
  if( !is_page() ) {
    genesis_do_post_title();
  }
}

// Add a post header from featured image
function bfg_page_featured_image_header() {
	if( is_page() ) {
		if( has_post_thumbnail() ) {
			?>
			<div class="post__header" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
        <?php genesis_do_post_title(); ?>
				<div class="overlay"></div>
			</div>

		<?php } else { ?>

			<div class="post__header" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/build/images/goer-02.jpg)">
				<?php genesis_do_post_title(); ?>
				<div class="overlay"></div>
			</div>

		<?php }
	}

}
