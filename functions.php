<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */

use Sau\Lib\Base\BaseAction;
use Sau\WP\Theme\Carbon\CarbonExtendTemplate;
use Sau\WP\Theme\Ru\RuExtendTemplate;
use Sau\WP\Theme\Source\ST;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\SauTwig;
use Sau\WP\Theme\Whoops\WhoopsExtendTemplate;
use Sau\WP\Theme\WP\WP;

include 'vendor/autoload.php';
include( ABSPATH . 'wp-admin/includes/plugin.php' ); //для использования некоторых специфических функций типа is_plugin_active()

// Initial theme
BaseAction::action('after_setup_theme', function () {
	( new STheme() )->requirements([
		new WhoopsExtendTemplate(),
		new WP(),
		new CarbonExtendTemplate(),
		new RuExtendTemplate(),
		new SauTwig(),
	]);
}, 1);

//require plugins
global $st;
$st = new ST();
