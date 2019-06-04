<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */

use Sau\Lib\Base\BaseAction;
use Sau\WP\Theme\Source\Extension\Ru\Ru;
use Sau\WP\Theme\Source\ST;
use Sau\WP\Theme\STheme;

#==define====================#
if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}
if ( ! defined( 'THEME_LANG' ) ) {
    define( 'THEME_LANG', 'sau_theme' );
}


#==composer====================#
include 'vendor/autoload.php';
include( ABSPATH . 'wp-admin/includes/plugin.php' ); //для использования некоторых специфических функций типа is_plugin_active()


//require plugins
global $st;
$st = new ST();
