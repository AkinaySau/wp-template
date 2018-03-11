<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 11.03.18
 * Time: 17:14
 */

namespace Sau\WP\Theme\Source\Carbon;


use Carbon_Fields\Field;
use Sau\WP\Theme\Carbon\Containers\BaseContainer;

class BaseFields extends BaseContainer {

	/**
	 * Add custom fields
	 *
	 * @return void
	 */
	protected function addFields() {
		$this->container->add_fields( [
			Field::make( 'header_scripts', 'crb_header_script' ),
			Field::make( 'footer_scripts', 'crb_footer_script' )
		] );
	}
}