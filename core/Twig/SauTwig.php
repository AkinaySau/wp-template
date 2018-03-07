<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 25.09.2017
 * Time: 13:28
 */

namespace Sau\WP\Theme\Twig;


use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\Events\BindVarsEvent;
use Sau\WP\Theme\Twig\Events\ExtensionEvent;
use Sau\WP\Theme\Twig\Events\FiltersEvent;
use Sau\WP\Theme\Twig\Events\LoaderPassEvent;
use stdClass;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class SauTwig
 *
 * @package Sau\WP\Theme
 *
 * @version 2.0
 */
class SauTwig extends ExtendTemplate {
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
	 * @throws \Twig_Error_Loader
	 */
	public function __construct() {
		$this->loader = new Twig_Loader_Filesystem();
		$options = [];
		$dispatcher = STheme::getDispatcher();
		$eventPass = new LoaderPassEvent();
		$paths = $dispatcher->dispatch(TwigEvents::TWIG_LOADER_PATH, $eventPass)
			->getPath();

		foreach ($paths as $namespace => $path) {
			$this->loader->addPath($path, $namespace);
		}
		$twig = new Twig_Environment($this->loader, $options);

		$eventExtension = new ExtensionEvent();
		$extension = $dispatcher->dispatch(TwigEvents::TWIG_EXTENSION_ADD, $eventExtension)
			->getExtension();
		foreach ($extension as $ext) {
			$twig->addExtension($ext);
		}

		$eventFilters = new FiltersEvent();
		$filters = $dispatcher->dispatch(TwigEvents::TWIG_FILTER_ADD, $eventFilters)->getFilters();
		foreach ($filters as $filter) {
			$twig->addFilter($filter);
		}
		self::$twig = $twig;
	}

	/**
	 * Render twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 * @param array                 $var      Vars for template
	 *
	 * @return string
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public static function render($template, $var = []) {
		$eventAddVars = new BindVarsEvent();
		$dispatcher = STheme::getDispatcher();
		$vars = $dispatcher->dispatch(TwigEvents::TWIG_TEMPLATE_VARS, $eventAddVars)
			->getVars();

		$vars = array_merge($vars, $var);
		$template = self::$twig->load($template);
		return $template->render($vars);
	}

	/**
	 * Display twig template
	 *
	 * @param string|array|stdClass $template Name twig-template or array names
	 * @param array                 $var      Vars for template
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public static function display($template, $var = []) {
		echo self::render($template, $var);
	}
}