<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 02.03.2018
 * Time: 17:35
 */

namespace Sau\WP\Theme\WP;

use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\Events\ExtensionEvent;
use Sau\WP\Theme\Twig\TwigEvents;
use Sau\WP\Theme\WP\TwigExtension\SauTwigWpExtension;


class WP extends ExtendTemplate {
	public function __construct() {
		$listener = function (ExtensionEvent $event) {
			$event->setExtension(new SauTwigWpExtension());
		};
		STheme::getDispatcher()->addListener(TwigEvents::TWIG_EXTENSION_ADD, $listener);
	}
}