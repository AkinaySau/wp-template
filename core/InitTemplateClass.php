<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:17
 */

namespace Sau\WP\Theme;


use Sau\WP\Theme\Traits\Menu;

abstract class InitTemplateClass {
	use Menu;

	public function __construct() {
		TGM::init();
		$this->define();
		$this->customCode();
	}

	/**
	 * For register defines
	 */
	public function define() {

	}

	abstract public function customCode();
}