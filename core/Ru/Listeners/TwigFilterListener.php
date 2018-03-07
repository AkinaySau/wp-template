<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 06.03.18
 * Time: 11:33
 */

namespace Sau\WP\Theme\Ru\Listeners;


use Sau\WP\Theme\Ru\TwigExtension\Filters;
use Sau\WP\Theme\Twig\Events\FiltersEvent;

class TwigFilterListener {

	public function addFilters ( FiltersEvent $event ) {
		$filters = ( new Filters() )->getFilters();
		foreach ( $filters as $filter ) {
			$event->setFilters($filter);
		}
	}
}