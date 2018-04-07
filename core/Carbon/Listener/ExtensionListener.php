<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 05.03.18
 * Time: 11:00
 */

namespace Sau\WP\Theme\Carbon\Listener;


use Sau\WP\Theme\Twig\Events\ExtensionEvent;
use Sau\WP\Theme\Carbon\TwigExtension\SauTwigCrbExtension;

class ExtensionListener {

	public function addExtension(ExtensionEvent $event) {
		$event->setExtension(new SauTwigCrbExtension());
	}
}