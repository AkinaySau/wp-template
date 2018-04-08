<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 25.09.2017
 * Time: 13:28
 */

namespace Sau\WP\Theme\Extension\Twig;


use Exception;
use Sau\WP\Theme\Exceptions\TemplateException;
use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\Extension\Twig\Events\BindVarsEvent;
use Sau\WP\Theme\Extension\Twig\Events\FiltersEvent;
use Sau\WP\Theme\Extension\Twig\Events\LoaderPassEvent;
use Sau\WP\Theme\Extension\Whoops\Whoops;
use Sau\WP\Theme\STheme;
use stdClass;
use Twig_Environment;
use Twig_Error_Loader;
use Twig_Extension;
use Twig_ExtensionInterface;
use Twig_Loader_Filesystem;
use Whoops\Run;

/**
 * Class SauTwig
 *
 * @package Sau\WP\Theme
 *
 * @version 2.0
 */
final class SauTwig extends ExtendTemplate {
	/**
	 * @var Twig_Environment
	 */
	private static $twig;
	/**
	 * Filters
	 *
	 * @var array
	 */
	private $filters;
	/**
	 * @var Twig_Loader_Filesystem
	 */
	private $loader;
	/**
	 * Path to cache
	 *
	 * @var string
	 */
	private $cache;
	/**
	 * @var array
	 * @since 2.0
	 */
	protected static $extension = [];

	/**
	 * Init for use Twig
	 *
	 */
	public function __construct() {
		try {
			$this->loader = new Twig_Loader_Filesystem();
			$options      = [];

			SauTwigPath::_path( 'template', get_stylesheet_directory() . DIRECTORY_SEPARATOR . STheme::getConfigs( 'views' ) );
			$paths = SauTwigPath::getPaths();

			foreach ( $paths as $namespace => $path ) {
				$this->loader->addPath( $path, $namespace );
			}

			$twig = new Twig_Environment( $this->loader, $options );

			$twig->addExtension( $ext = new SauTwigExtension() );
			if ( count( $ext->getOther() ) ) {
				foreach ( $ext->getOther() as $item ) {
					if ( $item instanceof Twig_ExtensionInterface && ! $twig->hasExtension( get_class( $item ) ) ) {
						$twig->addExtension( $item );
					}
				}
			}

			self::$twig = $twig;
		} catch ( Exception $exception ) {
			TemplateException::render( $exception );
		}
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
		try {
			$var      = apply_filters( 'twig_template_vars', $var );
			$template = self::$twig->load( $template );

			return $template->render( $var );
		} catch ( Exception $exception ) {
			TemplateException::render( $exception );
		}
	}

	/**
	 * Display twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 * @param array                 $var      Vars for template
	 *
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public static function display( $template, $var = [] ) {
		echo self::render( $template, $var );
	}
}