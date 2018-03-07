<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 06.03.18
 * Time: 10:51
 */

namespace Sau\WP\Theme\Ru;


use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\Ru\Listeners\TwigFilterListener;
use Sau\WP\Theme\STheme;
use Sau\WP\Theme\Twig\TwigEvents;

class RuExtendTemplate extends ExtendTemplate {
	public function __construct () {
		$listener   = new TwigFilterListener();
		$dispatcher = STheme::getDispatcher();
		$dispatcher->addListener(TwigEvents::TWIG_FILTER_ADD, [
			$listener,
			'addFilters'
		]);
	}
}