<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 02.03.2018
 * Time: 15:59
 */

namespace Sau\WP\Theme;


class Logs {
	public static function console ( $var ) {
		$type = gettype($var);
		switch ( $type ):
			case 'object':
			case 'array':
				$var = json_encode($var);
				break;
			case 'boolean':
				$var = 'boolean: ' . (int) $var;
				break;
		endswitch;
		echo "<script>console.log('{$var}')</script>";
	}
}