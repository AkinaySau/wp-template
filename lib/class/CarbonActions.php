<?php
/**
 * Created for wp_template.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 05.09.2017
 * Time: 14:17
 */

namespace Sau\WP\Theme;

use Sau\Lib\Base\BaseAction;


/**
 * Расширение хуков для пакета htmlburger/carbon-fields
 *
 * @package Sau\WP\Theme
 * todo: сделать отдельный пакет
 */
class CarbonActions extends BaseAction {

	/**
	 * Для хука carbon_fields_register_fields
	 *
	 * @param callable $callback      Функция срабатывающая в момент события
	 */
	public static function carbonFieldsRegisterFields( $callback ) {
		self::action( 'carbon_fields_register_fields', $callback );
	}

}