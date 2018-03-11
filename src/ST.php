<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:16
 */

namespace Sau\WP\Theme\Source;


use Sau\Lib\HF;
use Sau\Lib\Theme;
use Sau\WP\Theme\InitTemplateClass;

class ST extends InitTemplateClass {
	public function customCode() {
		Theme::addSupportTitleTag();
		Theme::loadThemeTextdomain( THEME_LANG, get_stylesheet_directory() . DS . 'l10n' );

		HF::addStyle( 'sau-style', get_stylesheet_directory_uri() . '/css/style.css' );
		HF::addScript( 'sau-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true );
	}

	public function define() {
		if ( ! defined( 'DS' ) ) {
			define( 'DS', DIRECTORY_SEPARATOR );
		}
		if ( ! defined( 'THEME_LANG' ) ) {
			define( 'THEME_LANG', 'sau_theme' );
		}
		parent::define();
	}


}