<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 05.03.18
 * Time: 11:10
 */

namespace Sau\WP\Theme\Carbon\Containers;


use Carbon_Fields\Container;
use Carbon_Fields\Carbon_Fields\Container\Container as CrbBaseContainer;
use Sau\WP\Theme\Carbon\CarbonActions;

abstract class BaseContainer {
	protected $container;

	/**
	 * Create container
	 *
	 * @param string $type  Container type maybe: post_meta, term_meta, user_meta, theme_options, comment_meta, nav_menu_item
	 * @param string $title Title for container
	 * @return void
	 */
	public static function init ( $type, $title ) {
		$obj = static::class;
		CarbonActions::carbonFieldsRegisterFields(function () use ( $type, $title, &$obj ) {
			$obj = new $obj($type, $title);
		});
	}

	/**
	 * Container constructor.
	 *
	 * @param string $type  Type container
	 * @param string $title Title
	 */
	final protected function __construct ( $type, $title ) {
		$this->container = Container::make($type, $title);
		$this->addFields();
	}


	/**
	 * Return container
	 *
	 * @return CrbBaseContainer
	 */
	public function getContainer (): CrbBaseContainer {
		return $this->container;
	}

	/**
	 * Add custom fields
	 *
	 * @return void
	 */
	abstract protected function addFields ();

}