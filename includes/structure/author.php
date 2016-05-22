<?php

if( !defined('ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Display the contact details of the author
 *
 * @since 2.0.18
 */

add_action( 'genesis_before_comments', 'bfg_author_box' );
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
    $google = get_the_author_meta('google');
    $youtube = get_the_author_meta('youtube');
    $rss = get_the_author_meta('rss');
    $instagram = get_the_author_meta('instagram');

    echo '<section class="author-box" itemprop="author" itemscope itemtype="http://schema.org/Person">';

      echo get_avatar( $email, 100);

      if( $firstname && $lastname ) {
        printf('<h4 class="author-box-title">About %s %s</h4>', $firstname, $lastname);
      }
      else {
        printf('<h4 class="author-box-title">About %s</h4>', $displayname);
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
        if( $google ) {
          printf('<li class="social google"><a href="%s"><span class="fa fa-google-plus-square"></span> Google+</a></li>', $google );
        }
        if( $youtube ) {
          printf('<li class="social youtube"><a href="%s"><span class="fa fa-youtube-square"></span> Youtube</a></li>', $youtube );
        }
        if( $rss ) {
          printf('<li class="social rss"><a href="%s"><span class="fa fa-rss-square"></span> RSS</a></li>', $rss );
        }
        if( $instagram ) {
          printf('<li class="social instagram"><a href="%s"><span class="fa fa-instagram"></span> Linkedin</a></li>', $instagram );
        }
      echo '</ul></div>';

    echo '</section>'; // end of .author-box

 }
