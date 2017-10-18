<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 26.09.2017
 * Time: 13:45
 */

namespace Sau\WP\Theme\TwigExtension;


use function implode;
use Sau\WP\Theme\HeaderWalker;
use Twig_Extension;
use Twig_SimpleFunction;
use function var_dump;
use function wp_get_post_tags;

class SauTwigTemplateExtension extends Twig_Extension {

	public function getName() {
		return 'SauTwigTemplateExtension';
	}

	public function getFunctions() {
		return [
			new Twig_SimpleFunction( 'post_tags', [ $this, 'post_tags',] ),
			new Twig_SimpleFunction( 'pre', [ $this, 'pre',] ),
			new Twig_SimpleFunction( 'dump', [ $this, 'dump',] ),
		];
	}

	function post_tags( $id, $glue = ' | ' ) {
		$tags = wp_get_post_tags( $id );
		foreach ( $tags as &$tag )
		{
			$tag = $tag->name;
		}

		return implode( $glue, $tags );
	}

	function pre( $var ) {
		echo '<pre>';
		print_r( $var );
		echo '</pre>';
	}

	function dump( $var ) {
		echo '<pre>';
		var_dump( $var );
		echo '</pre>';
	}
}
