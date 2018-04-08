<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 08.04.18
 * Time: 13:40
 */

namespace Sau\WP\Theme\Source\Carbon;


use Carbon_Fields\Field;
use Sau\WP\Theme\Extension\Carbon\Containers\BaseWidget;

class ExampleWidget extends BaseWidget {

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
		$return = <<<HTML
			{$args['before_title']} {$instance['title']} {$args['after_title']}
            <p> {$instance['content']}  </p>
HTML;

		return $return;
	}

	/**
	 * @return string
	 */
	protected function setWidgetId(): string {
		return 'example-widger';
	}

	/**
	 * @return string
	 */
	protected function setTitle(): string {
		return __( 'Пример виджета', THEME_LANG );
	}

	/**
	 *
	 * @return array
	 */
	protected function setFields(): array {
		return [
			Field::make( 'text', 'title', 'Title' )
			     ->set_default_value( 'Hello World!' ),
			Field::make( 'textarea', 'content', 'Content' )
			     ->set_default_value( 'Lorem Ipsum dolor sit amet' )
		];
	}
}