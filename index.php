<?php /**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:30
 */


use Sau\WP\Theme\Extension\Twig\SauTwig;

$data = [];

while (have_posts()):the_post();
    $data[ 'post' ] = get_post();
endwhile;


SauTwig::display('@template/index.twig', $data);
