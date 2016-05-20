<?php

if( !defined('ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Display the contact details of the author
 *
 * @since 2.0.18
 */

add_filter( 'get_the_author_genesis_author_box_single', 'bfg_author_box' );
function bfg_author_box() {

    $firstname = get_the_author_meta('firstname');
    $lastname = get_the_author_meta('lastname');
    $displayname = get_the_author_meta('display_name');
    $description = get_the_author_meta('description');
    $email = get_the_author_meta('user_email');

    //  Contact details
    $facebook = get_the_author_meta('facebook');
    $twitter = get_the_author_meta('twitter');
    $linkedin = get_the_author_meta('linkedin');

    echo '<section class="author-box" itemprop="author" itemscope itemtype="http://schema.org/Person">';

      echo get_avatar( $email, 100);

      if( $firstname && $lastname ) {
        printf('<h4 class="author-box-title">About %s %s</h4>', $firstname, $lastname);
      }
      else {
        printf('<h4 class="author-box-title"> About %s</h4>', $displayname);
      }

      printf('<div class="author-box-content">%s</div>', $description);

      echo '<div class="author__contact"><span>Follow me:</span> <ul class="contact--details">';
        if( $facebook ) {
          printf('<li class="social facebook"><a href="%s"><span class="fa fa-facebook-square"></span> Facebook</a></li>', $facebook );
        }
        if( $twitter ) {
          printf('<li class="social twitter"><a href="%s"><span class="fa fa-twitter-square"></span> Twitter</a></li>', $twitter );
        }
        if( $linkedin ) {
          printf('<li class="social linkedin"><a href="%s"><span class="fa fa-linkedin-square"></span> Linkedin</a></li>', $linkedin );
        }
      echo '</ul></div>';

    echo '</section>'; // end of .author-box

 }
