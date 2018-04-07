<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 11.03.18
 * Time: 19:22
 */

namespace Sau\WP\Theme\Carbon\Containers;


use Carbon_Fields\Field\Field;
use Carbon_Fields\Widget;
use Sau\Lib\Action;

abstract class BaseWidget extends Widget {

	/**
	 * @var string
	 */
	protected $widget_id;
	/**
	 * @var string
	 */
	protected $title;
	/**
	 * @var string
	 */
	protected $description;
	/**
	 * @var array
	 */
	protected $fields;

	/**
	 * @var bool
	 */
	protected static $init = false;

	static function init() {
		$obj = static::class;
		if ( ! static::$init ) {
			Action::widgetsInit( function () use ( $obj ) {
				register_widget( $obj );
			} );
			#todo need search how crate double widget
			static::$init = true;
		}
	}

	final public function __construct() {
		$this->widget_id   = $this->setWidgetId();
		$this->title       = $this->setTitle();
		$this->description = $this->setDescription();
		$this->fields      = $this->setFields();
		$this->setup( $this->getWidgetId(), $this->getTitle(), $this->getDescription(), $this->parseFields() );
	}

	/**
	 * Widget Template
	 *
	 * @param $args
	 * @param $instance
	 *
	 * @return string
	 * todo: add interface
	 */
	abstract protected function render( $args, $instance ): string;

	public function front_end( $args, $instance ) {
		echo $this->render( $args, $instance );
	}

	/**
	 * Return array where all element it`s Carbon_Fields\Field
	 * @return array
	 */
	final public function parseFields() {
		foreach ( $this->fields as $key => $field ) {
			if ( ! $field instanceof Field ) {
				unset( $this->fields[ $key ] );
			}
		}

		return $this->fields;
	}

	/**
	 * @return string
	 */
	public function getWidgetId(): string {
		return $this->widget_id;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}

	/**
	 * @return array
	 */
	public function getFields(): array {
		return $this->fields;
	}

	/**
	 * @return string
	 */
	abstract protected function setWidgetId(): string;

	/**
	 * @return string
	 */
	abstract protected function setTitle(): string;

	/**
	 * @return string
	 */
	protected function setDescription() {
		return '';
	}

	/**
	 *
	 * @return array
	 */
	abstract protected function setFields(): array;


}