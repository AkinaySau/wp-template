<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 05.03.18
 * Time: 12:30
 */

namespace Sau\WP\Theme\Twig\Events;


use Symfony\Component\EventDispatcher\Event;
use Twig_Filter;

final class FiltersEvent extends Event {
	protected $filters = [];

	/**
	 * Filter list
	 *
	 * @return array
	 */
	public function getFilters() {
		return $this->filters;
	}

	/**
	 * Add new filter
	 * @param Twig_Filter $filters
	 */
	public function setFilters(Twig_Filter $filters) {
		if (!array_search($filters, $this->filters)) {
			$this->filters[] = $filters;
		}
	}
}
