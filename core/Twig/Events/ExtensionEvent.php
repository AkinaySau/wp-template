<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 15:41
 */

namespace Sau\WP\Theme\Twig\Events;

use Symfony\Component\EventDispatcher\Event;
use Twig_Extension;

final class ExtensionEvent extends Event {
	protected $extension = [];

	/**
	 * @return array
	 */
	public function getExtension(): array {
		return $this->extension;
	}

	/**
	 * Register new twig extension
	 * @param Twig_Extension $extension
	 */
	public function setExtension(Twig_Extension $extension) {
		if (!array_search($extension, $this->extension)) {
			$this->extension [] = $extension;
		}
	}
}