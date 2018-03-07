<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 12:24
 */

namespace Sau\WP\Theme\Traits;

trait Menu {

	/**
	 * Register Menu
	 * @param $location
	 * @param $description
	 */
	final protected function addMenu ( $location, $description ) {
		register_nav_menu($location, $description);
	}
}