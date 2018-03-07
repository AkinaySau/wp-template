<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 02.03.2018
 * Time: 12:40
 */

namespace Sau\WP\Theme\Twig\Interfaces;

use Sau\WP\Theme\Twig\Events\LoaderPassEvent;

/**
 * Interface PathListenerInterface
 * @package Sau\WP\Theme\Twig\Interfaces
 * @since 2.0
 */
interface PathListenerInterface {
	public function addPath ( LoaderPassEvent $event );
}