<?php

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
	Template Name: HomePage Slider(Fluid)
*/

/*
 * Force a layout setting for the page
 *
 * See: http://www.briangardner.com/code/force-layout-setting/
 *
 * @since 2.0.0
 */

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
// remove_action( 'genesis_after_header', 'bfg_page_featured_image_header' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_after_header', 'bfg_home_slider' );
add_action( 'genesis_loop', 'bfg_home_featured' );

function bfg_home_slider() {
  ?>
  <!-- Slider -->
  <section class="home-slider">
    <div class="slider">
      <?php if( have_rows('slider_item') ) : ?>
        <?php while( have_rows('slider_item') ) : the_row(); ?>
          <?php
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $link = get_sub_field('url');
// echo '<pre>';
// print_r( get_sub_field('url')  );
// echo '</pre>';
// die;
          ?>
          <div class="slider__item">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              <div class="item--content">
                <h4 class="slider--title"><?php echo $title; ?></h4>
                <div class="slider--description"><?php echo $description; ?></div>
                <?php

                if( $link ) :
                	// override $post
                	$post = $link;
                	setup_postdata( $post );

                	?>
                  <a class="btn more--details" href="<?php the_permalink($post->ID); ?>">More details <span class="fa fa-chevron-right"></span></a>
                  <?php wp_reset_postdata(); // reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>

              </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
  <!-- Slider end -->

  <section class="home__welcome">
    <h4 class="welcome--header"></h4>
    <div class="welcome--content"></div>
  </section>
  <?php
}

function bfg_home_featured() {
  echo 'Hey';
}

genesis();
