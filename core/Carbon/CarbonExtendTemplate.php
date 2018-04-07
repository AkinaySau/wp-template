<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 05.03.18
 * Time: 10:48
 */

namespace Sau\WP\Theme\Carbon;


use Carbon_Fields\Carbon_Fields;
use Sau\WP\Theme\Carbon\Listener\ExtensionListener;
use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\TwigEvents;

class CarbonExtendTemplate extends ExtendTemplate {
	public function __construct() {
		#init carbon
		Carbon_Fields::boot();

		$listener = new ExtensionListener();

		$dispatcher = STheme::getDispatcher();
		$dispatcher->addListener(TwigEvents::TWIG_EXTENSION_ADD, [$listener, 'addExtension']);
	}
}