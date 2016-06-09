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
add_action( 'genesis_before_footer', 'bfg_before_footer' );

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
  <?php
  if( have_rows('hero') ) :
    while( have_rows('hero') ) : the_row();
      // var
      $heroHeading = get_sub_field('hero_heading');
      $heroMessage = get_sub_field('hero_message');
  ?>

    <section class="home__hero">
      <div class="wrap">
        <?php if( $heroHeading ) : ?>
          <h4 class="hero--heading"><?php echo $heroHeading; ?></h4>
        <?php endif; ?>
        <?php if( $heroMessage ) : ?>
          <div class="hero--message"><?php echo $heroMessage; ?></div>
        <?php endif; ?>
      </div>
    </section>

  <?php
      wp_reset_postdata();
    endwhile;
  endif;
  ?>
  <?php
}

function bfg_home_featured() {

  echo '<section class="home__featured">';

  genesis_widget_area( 'home-featured-1', array(
    'before' => '<div class="home__featured--left widget-area one-third first">',
    'after' => '</div>'
  ));

  genesis_widget_area( 'home-featured-2', array(
    'before' => '<div class="home__featured--center widget-area one-third">',
    'after' => '</div>'
  ));

  genesis_widget_area( 'home-featured-3', array(
    'before' => '<div class="home__featured--right widget-area one-third">',
    'after' => '</div>'
  ));

  echo '</section>';
}

function bfg_before_footer() {
  ?>
  <section class="home__callToAction">
    <div class="wrap">
      <?php
        genesis_widget_area( 'call-to-action', array(
          'before' => '<div class="call-to-action widget-area">',
          'after' => '</div>'
        ));
      ?>
    </div>
  </section>

  <section class="home__blog">
    <div class="wrap">
      <?php
        genesis_widget_area( 'home-blog', array(
          'before' => '<div class="home__blog--items widget-area">',
          'after' => '</div>'
        ));
      ?>
    </div>
  </section>
  <?php
}

genesis();
