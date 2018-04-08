<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 11:05
 */

namespace Sau\WP\Theme\Exceptions;

use Exception;
use Sau\WP\Theme\Extension\Whoops\Whoops;
use Whoops\Run;

/**
 * Simple Extension
 * @package Sau\WP\Theme\Exceptions
 */
class TemplateException extends Exception {

	public static function render( Exception $e ) {
		echo "<strong>Message:</strong> ", $e->getMessage(), "<br>";
		echo "<strong>Code:</strong> ", $e->getCode(), "<br>";
		echo "<strong>Line:</strong> ", $e->getLine(), "<br>";
		echo "<strong>File:</strong> ", $e->getFile(), "<br>";
		echo "<strong>Trace:</strong> ", "<br>";
		echo '<pre>';
		print_r( $e->getTrace() );
		echo '</pre>';
		wp_die();
	}
}