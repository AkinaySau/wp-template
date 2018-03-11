<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 11.03.18
 * Time: 19:57
 */

namespace Sau\WP\Theme\Source\Carbon;


use Carbon_Fields\Field;
use Sau\WP\Theme\Carbon\Containers\BaseWidget;

class FirstWidget extends BaseWidget {

	/**
	 * Widget Template
	 *
	 * @param $args
	 * @param $instance
	 *
	 * @return string
	 * todo: add interface
	 */
	protected function render( $args, $instance ): string {
		return $instance['title'];
	}

	/**
	 * @return string
	 */
	protected function setWidgetId(): string {
		return 'widget';
	}

	/**
	 * @return string
	 */
	protected function setTitle(): string {
		return 'Пример виджета Carbon';
	}

	/**
	 *
	 * @return array
	 */
	protected function setFields(): array {
		return [
			Field::make( 'text', '__title', 'Title' )
			     ->set_default_value( 'Hello World!' ),
			Field::make( 'textarea', '__content', 'Content' )
			     ->set_default_value( 'Lorem Ipsum dolor sit amet' )
		];
	}
}