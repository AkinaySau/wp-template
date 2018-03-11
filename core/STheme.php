<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 10:30
 */

namespace Sau\WP\Theme;

use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class STheme
 * @package Sau\WP\Theme
 */
class STheme {

	protected static $dispatcher;
	protected static $configs;
	protected        $extends;

	/**
	 * TemplateContainer constructor.
	 */
	public function __construct () {
		$this->getDispatcher();
		$this->defines();
		$this->coreExtension();
		return $this;
	}

	/**
	 * Bind and return EventDispatcher
	 * @return EventDispatcher
	 */
	public static function getDispatcher (): EventDispatcher {
		if ( !self::$dispatcher instanceof EventDispatcher ) {
			self::$dispatcher = new EventDispatcher();
		}
		return self::$dispatcher;

	}

	/**
	 * Return config params
	 * @param mixed $name Name config
	 * @return mixed|Exceptions\ConfigException
	 */
	public static function getConfigs ( $name = null ) {
		if ( !self::$configs ) {
			self::$configs = Config::get();
		}
		if ( $name ) {
			return self::$configs[ $name ];
		} else {
			return self::$configs;
		}
	}

	/**
	 * @return mixed
	 */
	public function getExtends () {
		return $this->extends;
	}

	protected function defines () {
		if ( !defined('DS') ) {
			define('DS', DIRECTORY_SEPARATOR);
		}
		define('THEME_LANG', 'sau_theme');
	}

	protected function coreExtension () {
		$this->registerExtension([

		]);

	}

	/**
	 * Register extension item-array must be ExtendTemplate
	 * @param array $require
	 */
	protected function registerExtension ( array $require ) {
		foreach ( $require as $item ) {
			if ( $item instanceof ExtendTemplate ) {
				$name_extend                   = get_class($item);
				$this->extends[ $name_extend ] = $item;
			} else {
				unset($item);
			}
		}
	}

	/**
	 * @param array $require
	 */
	public function requirements ( $require = [] ) {
		$this->registerExtension($require);
	}

}