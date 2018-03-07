<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:17
 */

namespace Sau\WP\Theme;


abstract class InitTemplateClass {
	final protected function __construct () {
	}

	abstract public static function initial();
}