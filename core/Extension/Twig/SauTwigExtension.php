<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 16:54
 */

namespace Sau\WP\Theme\Extension\Twig;

use Sau\WP\Theme\STheme;
use Twig_Extension;
use Twig_Filter;
use Twig_SimpleFunction;

final class SauTwigExtension extends Twig_Extension {
	/**
	 * Storage for Twig_Extension
	 * @var array
	 */
	protected static $other = [];
	/**
	 * Storage for Twig_Filter
	 * @var array
	 */
	protected static $filters = [];
	/**
	 * Storage for Twig_SimpleFunction
	 * @var array
	 */
	protected static $simple_function = [];

	/**
	 * SauTwigExtension constructor.
	 *
	 * NOT FOR USES (system construct)
	 *
	 * @param Twig_Filter|Twig_SimpleFunction|Twig_Extension|null $ext
	 */
	public function __construct( $ext = null ) {
		if ( $ext instanceof Twig_Filter ) {
			static::$filters[] = $ext;
		} elseif ( $ext instanceof Twig_SimpleFunction ) {
			static::$simple_function[] = $ext;
		} elseif ( $ext instanceof Twig_Extension ) {
			static::$other[] = $ext;
		}
	}

	/**
	 * Return  extension list
	 *
	 * @return array
	 */
	public function getOther(): array {
		do_action( 'twig_extension' );

		return self::$other;
	}


	public function getFunctions() {
		do_action( 'twig_simple_function' );

		return self::$simple_function;
	}

	/**
	 * @return mixed
	 */
	public function getFilters() {
		do_action( 'twig_filters' );

		return self::$filters;
	}

	/**
	 * Register filter
	 *
	 * @param       $name
	 * @param       $callback
	 * @param array $options
	 */
	public static function _f( $name, $callback, $options = [] ) {
		TwigActions::twigFilters( function () use ( $name, $callback, $options ) {
			$ext = new Twig_Filter( $name, $callback, $options );
			new SauTwigExtension( $ext );
		} );
	}

	/**
	 * Register simple function
	 *
	 * @param       $name
	 * @param       $callback
	 * @param array $options
	 */
	public static function _s( $name, $callback, $options = [] ) {
		TwigActions::twigSimpleFunction( function () use ( $name, $callback, $options ) {
			$ext = new Twig_SimpleFunction( $name, $callback, $options );
			new SauTwigExtension( $ext );
		} );
	}

	/**
	 * Add extension class
	 *
	 * @param Twig_Extension $twig_extension
	 */
	public static function _e( Twig_Extension $twig_extension ) {
		TwigActions::twigExtension( function () use ( $twig_extension ) {
			new SauTwigExtension( $twig_extension );
		} );
	}
}