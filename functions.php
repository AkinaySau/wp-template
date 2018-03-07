<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */

use Sau\Lib\Base\BaseAction;
use Sau\Lib\HF;
use Sau\Lib\Theme;
use Sau\WP\Theme\Carbon;
use Sau\WP\Theme\Carbon\CarbonExtendTemplate;
use Sau\WP\Theme\Ru\RuExtendTemplate;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\SauTwig;
use Sau\WP\Theme\Whoops\SauWhoops;
use Sau\WP\Theme\WP\WP;

include 'vendor/autoload.php';
include( ABSPATH . 'wp-admin/includes/plugin.php' ); //для использования некоторых специфических функций типа is_plugin_active()
// Initial theme
BaseAction::action('after_setup_theme', function () {
	( new STheme() )->requirements([
		new SauWhoops(),
		new WP(),
		new CarbonExtendTemplate(),
		new RuExtendTemplate(),
		new SauTwig(),
	]);
}, 1);

//require plugins
TGM::init();


//Theme::addFavicon( get_stylesheet_directory_uri() . '/favicon.ico' );
Theme::addSupportTitleTag();
Theme::loadThemeTextdomain(THEME_LANG, get_stylesheet_directory() . DS . 'l10n');
Theme::addLib([
	'lib/extend_function.php',
]);


//Поддержка плагина CarbonFields 2.*
/*********Carbon*********/
Carbon::init();
//для добавления файла с полями
//Carbon::registerFields();
/************************/

HF::addStyle('sau-style', get_stylesheet_directory_uri() . '/css/style.css');
HF::addScript('sau-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true);