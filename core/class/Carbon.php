<?php
/**
 * Created for wp_template.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 05.09.2017
 * Time: 15:22
 */

namespace Sau\WP\Theme;


use function is_array;
use function is_null;
use function is_string;
use Sau\Lib\Action;
use Sau\Lib\Notice;
use Sau\Lib\Theme;
use stdClass;

/**
 * Управление полями Carbon
 *
 * @package Sau\WP\Theme
 */
class Carbon {
	/**
	 * Массив файлов с описанными полями
	 * Путь к файла указывать относительно дирректории темы
	 *
	 * @param array $lib
	 */
	static function init( $lib = null ) {
		//подключение возможностей Carbon
		Action::afterSetupTheme( function () {
			\Carbon_Fields\Carbon_Fields::boot();
		} );
		//Подключение файлов с описание полей
		if ( is_array( $lib ) || $lib instanceof stdClass ) {
			CarbonActions::carbonFieldsRegisterFields( function () use ( $lib ) {
				Theme::addLib( $lib );
			} );
		} elseif ( is_string( $lib ) ) {
			self::registerFields( $lib );
		} elseif ( ! is_null( $lib ) ) {
			Notice::warning( '<p>При инициализации Carbon получены не верные параметры</p>' );
		}

	}

	/**
	 * Подключение одного поля
	 *
	 * @param string $path
	 */
	static function registerFields( string $path ) {
		CarbonActions::carbonFieldsRegisterFields( function () use ( $path ) {
			Theme::addLib( [ $path ] );
		} );
	}
}