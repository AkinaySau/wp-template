<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 10:30
 */

namespace Sau\WP\Theme;

use Exception;
use Sau\WP\Theme\Exceptions\TemplateException;
use Sau\WP\Theme\Extension\Carbon\Carbon;
use Sau\WP\Theme\Extension\Twig\SauTwig;
use Sau\WP\Theme\Extension\Whoops\Whoops;
use Sau\WP\Theme\Extension\WP\WP;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Class STheme
 * @package Sau\WP\Theme
 */
final class STheme {

	protected static $dispatcher;
	protected static $configs;
	private static   $whoops;
	protected        $extends;

	/**
	 * TemplateContainer constructor.
	 */
	public function __construct() {
		if ( STheme::getConfigs( 'debug' ) ) {
			self::$whoops = new Run;
			self::$whoops->pushHandler( new PrettyPageHandler );
			self::$whoops->register();
		}
		$this->getDispatcher();
		$this->defines();
		$this->coreExtension();

		return $this;
	}

	/**
	 * Bind and return EventDispatcher
	 * @return EventDispatcher
	 */
	public static function getDispatcher(): EventDispatcher {
		if ( ! self::$dispatcher instanceof EventDispatcher ) {
			self::$dispatcher = new EventDispatcher();
		}

		return self::$dispatcher;

	}

	/**
	 * Return config params
	 *
	 * @param mixed $name Name config
	 *
	 * @return mixed|Exceptions\ConfigException
	 */
	public static function getConfigs( $name = null ) {
		if ( ! self::$configs ) {
			self::$configs = Config::get();
		}
		if ( $name ) {
			return self::$configs[ $name ];
		} else {
			return self::$configs;
		}
	}

	/**
	 * @return Run
	 */
	public static function getWhoops(): Run {
		return self::$whoops;
	}

	/**
	 * @return mixed
	 */
	public function getExtends() {
		return $this->extends;
	}

	protected function defines() {
		if ( ! defined( 'DS' ) ) {
			define( 'DS', DIRECTORY_SEPARATOR );
		}
		define( 'THEME_LANG', 'sau_theme' );
	}

	protected function coreExtension() {
		try {
			$this->registerExtension( [
				new WP(),
				new Carbon(),
				new SauTwig(),
			] );
		} catch ( Exception $exception ) {
			TemplateException::render( $exception );
		}

	}

	/**
	 * Register extension item-array must be ExtendTemplate
	 *
	 * @param array $require
	 */
	protected function registerExtension( array $require ) {
		foreach ( $require as $item ) {
			if ( $item instanceof ExtendTemplate ) {
				$name_extend                   = get_class( $item );
				$this->extends[ $name_extend ] = $item;
			} else {
				unset( $item );
			}
		}
	}

	/**
	 * @param array $require
	 */
	public function requirements( $require = [] ) {
		$this->registerExtension( $require );
	}

}