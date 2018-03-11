<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:17
 */

namespace Sau\WP\Theme;


use Sau\WP\Theme\Source\Carbon\BaseFields;
use Sau\WP\Theme\Traits\Menu;

abstract class InitTemplateClass {
	use Menu;

	public function __construct() {
		TGM::init();
		$this->define();
		$this->customCode();
		$this->baseCarbon();
		$this->carbon();
	}

	/**
	 * For register defines
	 */
	protected function define() {
		if ( ! defined( 'DS' ) ) {
			define( 'DS', DIRECTORY_SEPARATOR );
		}
		if ( ! defined( 'THEME_LANG' ) ) {
			define( 'THEME_LANG', 'sau_theme' );
		}
	}

	/**
	 * BaseFields carbon fields
	 */
	private function baseCarbon() {
		if ( class_exists( BaseFields::class ) ) {
			BaseFields::init( 'theme_options', __( 'Scripts', THEME_LANG ) );
		}
	}

	/**
	 * For register carbon fields
	 */
	protected function carbon() {
	}

	/**
	 * For print custom code
	 * @return mixed
	 */
	abstract protected function customCode();
}