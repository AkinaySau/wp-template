<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 16:54
 */

namespace Sau\WP\Theme\Extension\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

final class SauTwigExtension extends AbstractExtension {
	/**
	 * Storage for AbstractExtension
	 * @var array
	 */
	protected static $other = [];
	/**
	 * Storage for TwigFilter
	 * @var array
	 */
	protected static $filters = [];
	/**
	 * Storage for TwigFunction
	 * @var array
	 */
	protected static $simple_function = [];

	/**
	 * SauTwigExtension constructor.
	 *
	 * NOT FOR USES (system construct)
	 *
	 * @param TwigFilter|TwigFunction|AbstractExtension|null $ext
	 */
	public function __construct( $ext = null ) {
		if ( $ext instanceof TwigFilter ) {
			static::$filters[] = $ext;
		} elseif ( $ext instanceof TwigFunction ) {
			static::$simple_function[] = $ext;
		} elseif ( $ext instanceof AbstractExtension ) {
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
			$ext = new TwigFilter( $name, $callback, $options );
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
			$ext = new TwigFunction( $name, $callback, $options );
			new SauTwigExtension( $ext );
		} );
	}

	/**
	 * Add extension class
	 *
	 * @param AbstractExtension $twig_extension
	 */
	public static function _e( AbstractExtension $twig_extension ) {
		TwigActions::twigExtension( function () use ( $twig_extension ) {
			new SauTwigExtension( $twig_extension );
		} );
	}
}
