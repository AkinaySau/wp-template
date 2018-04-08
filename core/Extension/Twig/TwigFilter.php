<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 21:02
 */

namespace Sau\WP\Theme\Extension\Twig;


final class TwigFilter {

	/**
	 * Filter for twig template vars
	 *
	 * @param callable $callback Firs param it`s data for bind in template
	 * @param int      $priority
	 * @param int      $accepted_args
	 *
	 * @return true
	 */
	public static final function twigTemplateVars( $callback, $priority = 10, $accepted_args = 1 ) {
		return add_filter( 'twig_template_vars', $callback, $priority, $accepted_args );
	}
}