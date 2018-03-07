<?php /**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:30
 */


use Sau\WP\Theme\Twig\SauTwig;

$data = [];

SauTwig::display('@template/index.twig', $data);