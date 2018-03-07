<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:16
 */

namespace Sau\WP\Theme\Source;


use Sau\Lib\Theme;
use Sau\WP\Theme\InitTemplateClass;

abstract class ST extends InitTemplateClass {
	/**
	 * For your code
	 */
	public static function initial () {
		Theme::addSupportTitleTag();
		Theme::loadThemeTextdomain(THEME_LANG, get_stylesheet_directory() . DS . 'l10n');

		HF::addStyle('sau-style', get_stylesheet_directory_uri() . '/css/style.css');
		HF::addScript('sau-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true);
	}
}