<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 15:41
 */

namespace Sau\WP\Theme\Extension\Twig\Events;

use Symfony\Component\EventDispatcher\Event;
use Twig_Extension;

final class BindVarsEvent extends Event {
	protected $vars = [];

	/**
	 * @return array
	 */
	public function getVars (): array {
		return $this->vars;
	}

	/**
	 * Add vars for enter in template
	 * @param mixed $vars
	 */
	public function setVars ( $vars ): void {
		$this->vars[] = $vars;
	}

}