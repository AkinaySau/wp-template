<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 20:39
 */

namespace Sau\WP\Theme\Extension\Twig;


use Sau\WP\Theme\Extension\Twig\Exceptions\TwigBaseException;
use Sau\WP\Theme\STheme;

final class SauTwigPath {
	/**
	 * @var array
	 */
	protected static $paths = [];

	/**
	 * SauTwigPath constructor.
	 *
	 * NOT FOR USES (system construct)
	 *
	 * @param string  $namespace
	 * @param string  $path
	 * @param boolean $replace
	 *
	 * @throws TwigBaseException
	 */
	public function __construct( string $namespace, string $path, bool $replace ) {
		$isset = ( in_array( $path, static::$paths ) || array_key_exists( $namespace, static::$paths ) );

		if ( empty( trim( $namespace ) ) ) {
			throw new TwigBaseException( '"Namespace" is empty' );
		}
		if ( empty( trim( $path ) ) ) {
			throw new TwigBaseException( '"Path" is empty' );
		}
		if ( ! $isset || ( $isset && $replace ) ) {
			static::$paths[ $namespace ] = $path;
		} else {
			throw new TwigBaseException( sprintf( 'Sorry path "%s::%s" is isset', $namespace, $path ) );
		}
	}

	/**
	 * @return array
	 */
	public static function getPaths(): array {
		do_action( 'twig_loader_path' );

		return static::$paths;
	}

	/**
	 * Add extension class
	 *
	 */
	public static function _path( $namespace, $path, $replace = false ) {
		TwigActions::twigLoaderPath( function () use ( $namespace, $path, $replace ) {
			new SauTwigPath( $namespace, $path, $replace );
		} );
	}
}