<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 05.03.18
 * Time: 10:48
 */

namespace Sau\WP\Theme\Extension\Carbon;


use Carbon_Fields\Carbon_Fields;
use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\Extension\Carbon\Listener\ExtensionListener;
use Sau\WP\Theme\Extension\Carbon\TwigExtension\SauTwigCrbExtension;
use Sau\WP\Theme\Extension\Twig\SauTwigExtension;
use Sau\WP\Theme\Extension\Twig\TwigEvents;
use Sau\WP\Theme\STheme;

class Carbon extends ExtendTemplate {
	public function __construct() {
		#init carbon
		Carbon_Fields::boot();

		SauTwigExtension::_e( new SauTwigCrbExtension() );
	}
}