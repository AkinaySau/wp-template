<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 06.03.18
 * Time: 11:13
 */

namespace Sau\WP\Theme\Ru\TwigExtension;

use Twig_Filter;

class Filters {
	/**
	 * @return array
	 */
	public function getFilters (): array {
		return $this->filters;
	}

	private $filters;

	public function __construct () {
		$this->filters = [
			new Twig_Filter('ru_phone', [
				$this,
				'ru_phone'
			])
		];

		return $this->filters;
	}

	public function ru_phone ( $var ) {
		$var = preg_replace('/[^0-9]/', '', $var);
		if ( strlen($var) == 11 ) {
			$var = '7' . substr($var, 1);
		}
		$var = '+' . $var;
		return $var;
	}
}