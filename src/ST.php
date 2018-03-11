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
use Sau\WP\Theme\Source\Carbon\FirstWidget;
use Sau\WP\Theme\Source\Sidebar\SimpleSidebar;

class ST extends InitTemplateClass {
	protected $sidebars;

	protected function customCode() {
		Theme::addSupportTitleTag();
		Theme::loadThemeTextdomain( THEME_LANG, get_stylesheet_directory() . DS . 'l10n' );

		HF::addStyle( 'sau-style', get_stylesheet_directory_uri() . '/css/style.css' );
		HF::addScript( 'sau-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true );
		$this->carbon();

		$this->sidebars[ SimpleSidebar::getId() ] = SimpleSidebar::init();
	}


	protected function carbon() {
		FirstWidget::init();
	}

}