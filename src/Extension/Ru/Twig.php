<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 17:49
 */

namespace Sau\WP\Theme\Source\Extension\Ru;


use Sau\WP\Theme\Extension\Twig\SauTwigExtension;

class Twig {
	public function __construct() {
		SauTwigExtension::_s( 'ru_test', function ( $i ) {
			return $i;
		} );
		SauTwigExtension::_f( 'ru_phone', function ( $var ) {
			$var = preg_replace( '/[^0-9]/', '', $var );
			if ( strlen( $var ) == 11 ) {
				$var = '7' . substr( $var, 1 );
			}
			$var = '+' . $var;

			return $var;
		} );
	}
}
