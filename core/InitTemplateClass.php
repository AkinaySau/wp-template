<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:17
 */

namespace Sau\WP\Theme;


use Sau\Lib\Base\BaseAction;
use Sau\WP\Theme\Source\Carbon\BaseFields;
use Sau\WP\Theme\Traits\Menu;

abstract class InitTemplateClass {
	use Menu;

	public function __construct() {
		BaseAction::action( 'after_setup_theme', function () {
			( new STheme() )->requirements();
		}, 1 );
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
	final private function baseCarbon() {
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