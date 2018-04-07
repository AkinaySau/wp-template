<?php
/**
 * Created for wp_template.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 05.09.2017
 * Time: 14:17
 */

namespace Sau\WP\Theme\Carbon;

use Sau\Lib\Base\BaseAction;


/**
 * Extend hooks htmlburger/carbon-fields
 *
 * @package Sau\WP\Theme
 */
class CarbonActions extends BaseAction {

	/**
	 * Hook carbon_fields_register_fields
	 *
	 * @param callable $callback      callback function
	 */
	public static function carbonFieldsRegisterFields( $callback ) {
		self::action( 'carbon_fields_register_fields', $callback );
	}

}