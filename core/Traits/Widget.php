<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 08.04.18
 * Time: 13:52
 */

namespace Sau\WP\Theme\Traits;


class Widget {
	/**
	 * @param string $name
	 * @param string $id
	 * @param string $description
	 * @param string $class
	 * @param string $before_widget
	 * @param string $after_widget
	 * @param string $before_title
	 * @param string $after_title
	 */
	public static function registerSidebar( $name, $id, $description = '', $class = '', $before_widget = '<li id="%1$s" class="widget %2$s">', $after_widget = "</li>\n", $before_title = '<h2 class="widgettitle">', $after_title = "</h2>\n" ) {

	}
}