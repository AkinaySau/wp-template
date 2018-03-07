<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 10:56
 */

namespace Sau\WP\Theme;


use Sau\WP\Theme\Exceptions\ConfigException;
use Symfony\Component\Yaml\Yaml;

/**
 * For get configs
 * @package Sau\WP\Theme
 * @since   2.0
 */
class Config {
	/**
	 * get
	 * @param string $file
	 * @return mixed|ConfigException
	 */
	public static function get ( $file = 'config.yaml' ) {
		$path = TEMPLATEPATH . DIRECTORY_SEPARATOR . $file;
		if ( $content = file_get_contents($path) ) {
			return Yaml::parse($content);
		} else {
			return new ConfigException();
		}
	}
}