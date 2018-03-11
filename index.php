<?php /**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:30
 */


use Sau\WP\Theme\Twig\SauTwig;

$data = [];

try {
	SauTwig::display( '@template/index.twig', $data );
} catch ( Twig_Error $e ) {
	echo $e->getMessage(), PHP_EOL;
	echo '<pre>';
	print_r( $e->getTrace() );
	echo '</pre>';
	wp_die();
}