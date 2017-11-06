<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 25.09.2017
 * Time: 13:28
 */

namespace Sau\WP\Theme;


use Sau\WP\Theme\TwigExtension\SauTwigCrbExtension;
use Sau\WP\Theme\TwigExtension\SauTwigTemplateExtension;
use Sau\WP\Theme\TwigExtension\SauTwigWpExtension;
use stdClass;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class SauTwig
 *
 * @package Sau\WP\Theme
 *
 * TODO: add json template;
 */
class SauTwig {
	/**
	 * Filters
	 *
	 * @var array
	 */
	private static $filters;
	/**
	 * @var Twig_Environment
	 */
	private static $twig;
	/**
	 * @var Twig_Loader_Filesystem
	 */
	private static $loader;
	/**
	 * Path to cache
	 *
	 * @var string
	 */
	private static $cache;
	/**
	 * Path for twig templates
	 *
	 * @var string
	 */
	private static $filesystem;

	/**
	 * Init for use Twig
	 *
	 * @param string $filesystem Path for twig templates
	 * @param string $cache      Path to cache
	 *
	 * TODO: add setting for cache;
	 */
	public static function init( $filesystem = 'views', $cache = 'cache/twig' ) {
		self::$filesystem = $filesystem;
		self::$cache      = $cache;
		self::$loader     = new Twig_Loader_Filesystem( get_stylesheet_directory() . DS . $filesystem );
		self::$twig       = new Twig_Environment( self::$loader, [//			'cache'         => get_stylesheet_directory() . DS . $cache,
		] );
		self::$twig->addExtension( new SauTwigWpExtension() );
		self::$twig->addExtension( new SauTwigTemplateExtension() );
		self::$twig->addExtension( new SauTwigCrbExtension() );
	}

	/**
	 * Render twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 * @param array                 $var      Vars for template
	 *
	 * @return string
	 */
	public static function render( $template, $var = [] ) {
		self::applyVarFilter( $var );
		if ( $template = self::getTemplate( $template ) ) {
			$template = self::$twig->load( $template );

			return $template->render( $var );
		}

		return '';
	}

	/**
	 * Apply filters for $var
	 *
	 * @param $var
	 *
	 */
	private static function applyVarFilter( &$var ) {
		if ( self::$filters ) {
			sort( self::$filters );
			foreach ( self::$filters as $priority ) {
				foreach ( $priority as $callable ) {
					$callable( $var );
				}
			}
		}
	}


	/**
	 * @param string|array|stdClass $template Name twig-template or array names
	 *
	 * @return string|false
	 */
	private static function getTemplate( $template ) {
		$dir      = scandir( get_stylesheet_directory() . DS . self::$filesystem );
		$template = (array) $template;

		foreach ( $template as $item ) {
			if ( array_search( $item, $dir ) && substr( $item, - 4 ) == 'twig' ) {
				return $item;
			}
		}

		return false;
	}

	/**
	 * Display twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 * @param array                 $var      Vars for template
	 */
	public static function display( $template, $var = [] ) {
		self::applyVarFilter( $var );
		if ( $template = self::getTemplate( $template ) ) {
			$template = self::$twig->load( $template );
			$template->display( $var );
		}
	}

	/**
	 * Load twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 *
	 * @return \Twig_TemplateWrapper
	 */
	public static function load( $template ) {
		if ( $template = self::getTemplate( $template ) ) {
			return $template = self::$twig->load( $template );
		}

		return null;
	}

	public static function addVarFilter( callable $callback, $priority = 0 ) {
		self::$filters[ $priority ][] = $callback;
	}
}