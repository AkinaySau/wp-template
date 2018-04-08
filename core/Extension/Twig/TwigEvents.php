<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 02.03.2018
 * Time: 15:56
 */

namespace Sau\WP\Theme\Extension\Twig;


abstract class TwigEvents {
	/**
	 * Load path
	 */
	const TWIG_LOADER_PATH = 'twig.loader.path';
	/**
	 * Add new Extension
	 */
	const TWIG_EXTENSION_ADD = 'twig.extension.add';

	/**
	 * Add vars for using in template
	 */
	const TWIG_TEMPLATE_VARS = 'twig.template.vars';

	/**
	 * Add filters
	 */
	const TWIG_FILTER_ADD = 'twig.filter.add';
}