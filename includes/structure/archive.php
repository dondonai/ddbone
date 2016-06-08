<?php

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

add_action( 'genesis_entry_header', 'bfg_archive_post_featured_image' );

add_action( 'genesis_after_header', 'bfg_archive_featured_image_header' );
function bfg_archive_featured_image_header() {
  if( is_archive() ) {
    if( has_post_thumbnail() ) {
      ?>
      <div class="post__header" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
        <h1 class="category--title" itemprop="headline"><?php single_cat_title(); ?></h1>
        <?php genesis_do_taxonomy_title_description(); ?>
        <div class="overlay"></div>
      </div>

    <?php } else { ?>

      <div class="post__header" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/build/images/goer-02.jpg)"><?php genesis_do_breadcrumbs(); ?>
        <h1 class="category--title" itemprop="headline"><?php single_cat_title(); ?></h1>
        <div class="overlay"></div>
      </div>

    <?php }
  }
}

function bfg_archive_post_featured_image() {
  // if( is_archive() ) {
  //   if( has_post_thumbnail() ) {
  //     the_post_thumbnail( $post_id, 'full' );
  //   }
  // }

  if( is_archive() ) :
    if( has_post_thumbnail() ) :
      ?>
      <a href="<?php the_permalink(); ?> "><?php the_post_thumbnail( $post_id, 'full' ); ?></a>
      <?php
    endif;
  endif;
}
