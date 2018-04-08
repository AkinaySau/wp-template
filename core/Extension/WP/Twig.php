<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 26.09.2017
 * Time: 13:45
 */

namespace Sau\WP\Theme\Extension\WP;


use Twig_Extension;
use Twig_SimpleFunction;

class Twig extends Twig_Extension {

	public function getName() {
		return 'SauTwigWpExtension';
	}

	public function getFunctions() {
		return [
			/**
			 * wp_
			 */
			new Twig_SimpleFunction( 'wp_get_post_tags', 'wp_get_post_tags' ),

			/**
			 * Posts
			 */
			new Twig_SimpleFunction( 'have_posts', 'have_posts' ),
			new Twig_SimpleFunction( 'the_post', 'the_post' ),
			new Twig_SimpleFunction( 'get_posts', 'get_posts' ),
			new Twig_SimpleFunction( 'the_excerpt', 'the_excerpt' ),
			new Twig_SimpleFunction( 'the_introtext', 'the_excerpt' ),
			new Twig_SimpleFunction( 'the_content', 'the_content' ),
			new Twig_SimpleFunction( 'get_post_thumbnail_url', 'get_the_post_thumbnail_url' ),
			new Twig_SimpleFunction( 'get_post_permalink', 'get_post_permalink' ),

			/**
			 * Theme
			 */
			new Twig_SimpleFunction( 'theme_uri', 'get_stylesheet_directory_uri' ),
			new Twig_SimpleFunction( 'do_shortcode', 'do_shortcode' ),

			/**
			 * Users
			 */
			new Twig_SimpleFunction( 'is_user_logged_in', 'is_user_logged_in' ),

			/**
			 * Footer
			 */
			new Twig_SimpleFunction( 'wp_footer', 'wp_footer' ),
			new Twig_SimpleFunction( 'get_footer', 'get_footer' ),

			/**
			 * Header
			 */
			new Twig_SimpleFunction( 'wp_head', 'wp_head' ),
			new Twig_SimpleFunction( 'get_header', 'get_header' ),

			/**
			 * Attachment
			 */
			new Twig_SimpleFunction( 'wp_attach_img_src', 'wp_get_attachment_image_url' ),

			/**
			 * Trash
			 */

			new Twig_SimpleFunction( 'ln_attributes', 'language_attributes' ),

			/**
			 * Nonce
			 */
			new Twig_SimpleFunction( 'wp_nonce_field', 'wp_nonce_field' ),

			new Twig_SimpleFunction( 'wp_test', function ( $i ) {
				echo (string) $i;
			} ),
		];
	}
}