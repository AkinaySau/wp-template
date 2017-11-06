<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */

use Sau\Lib\HF;
use Sau\Lib\Theme;
use Sau\WP\Theme\Carbon;
use Sau\WP\Theme\SauTwig;

include 'vendor/autoload.php';
include( ABSPATH . 'wp-admin/includes/plugin.php' ); //для использования некоторых специфических функций типа is_plugin_active()


//Theme::addFavicon( get_stylesheet_directory_uri() . '/favicon.ico' );
Theme::addSupportTitleTag();
Theme::loadThemeTextdomain( THEME_LANG, get_stylesheet_directory() . DS . 'l10n' );
Theme::addLib( [
	'lib/tgm.php',
	'lib/extend_function.php',
	'lib/defines.php',
	'lib/filters.php',
] );


//Поддержка плагина CarbonFields 2.*
/*********Carbon*********/
Carbon::init();
//для добавления файла с полями
//Carbon::registerFields();
/************************/
SauTwig::init();


HF::addStyle( 'sau-style', get_stylesheet_directory_uri() . '/css/style.css' );
HF::addScript( 'sau-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true );