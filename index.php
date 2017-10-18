<?php /**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:30
 */

use Sau\WP\Theme\SauTwig;

$data = [];

SauTwig::display( 'index.html.twig', $data );