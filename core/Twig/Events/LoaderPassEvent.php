<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 15:41
 */

namespace Sau\WP\Theme\Twig\Events;


use Sau\WP\Theme\STheme;
use Symfony\Component\EventDispatcher\Event;

final class LoaderPassEvent extends Event {
	protected $path = [];

	public function __construct () {
		$this->setPath('template', get_stylesheet_directory() . DIRECTORY_SEPARATOR . STheme::getConfigs('views'));
	}

	/**
	 * @return array
	 */
	public function getPath (): array {
		return $this->path;
	}

	/**
	 * Add new path for Twig
	 * @param string $namespace Namespace for add new namespace or rewrite
	 * @param string $path      Ful path for current namespace
	 */
	public function setPath ( string $namespace, string $path ) {
		$this->path[ $namespace ] = $path;
	}
}
