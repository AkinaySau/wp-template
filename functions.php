<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */
use Sau\Lib\Custom;
use Sau\Lib\HF;
use Sau\Lib\Theme;

include 'vendor/autoload.php';
include( ABSPATH . 'wp-admin/includes/plugin.php' ); //для использования некоторых специфических функций типа is_plugin_active()
include( 'tgm/tgm.php' );

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}
define( 'THEME_LANG', 'tutmee_theme' );

//Подключение стилей
HF::addStyle( 'tutmee-style', get_stylesheet_directory_uri() . '/css/style.css' );

//Подключение скриптов
HF::addScript( 'tutmee-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true );

//Подключение языковых файлов
Theme::loadThemeTextdomain( THEME_LANG, get_stylesheet_directory() . DS . 'l10n' );

//Включение поддержки заголовков
Theme::addSupportTitleTag();

Theme::addFavicon( get_stylesheet_directory_uri() . '/favicon.ico' );

//Подключение библиотек
Theme::addLib(
	[
		'lib/filters.php'
	]
);

//Поддержка плагина CarbonFields
/*********Carbon*********/
if ( ! is_plugin_active( 'carbon-fields/carbon-fields-plugin.php' ) ) {
	Theme::addLib(
		[
			'lib/carbon/no_carbon.php'      //заглушка если плагина нет. Сайт не развалится но не будет функционала
		]
	);
}

add_action(
	'carbon_register_fields', function () {
	//Подключение полей
	Theme::addLib(
		[

		]
	);
}
);
/************************/

//Плюшки
Custom::loginLogo(
	get_stylesheet_directory_uri() . '/images/tutmee/logo.png',
	187,
	70,
	'http://tutmee.ru',
	'Tutumee Agency'
);

