<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.04.18
 * Time: 17:17
 */

namespace Sau\WP\Theme\Extension\Twig;


use Sau\Lib\Base\BaseAction;

final class TwigActions extends BaseAction {

	/**
	 * For register new filter
	 *
	 * @param callable $action
	 * @param int      $priority
	 * @param int      $accepted_args
	 */
	public static function twigFilters( $action, $priority = null, $accepted_args = null ) {
		$priority      = $priority ?? self::PRIORITY;
		$accepted_args = $accepted_args ?? self::ACCEPTED_ARGS;
		add_action( 'twig_filters', $action, (int) $priority, (int) $accepted_args );
	}

	/**
	 * For register simple function
	 *
	 * @param callable $action
	 * @param int      $priority
	 * @param int      $accepted_args
	 */
	public static function twigSimpleFunction( $action, $priority = null, $accepted_args = null ) {
		$priority      = $priority ?? self::PRIORITY;
		$accepted_args = $accepted_args ?? self::ACCEPTED_ARGS;
		add_action( 'twig_simple_function', $action, (int) $priority, (int) $accepted_args );
	}

	/**
	 * For register extension class
	 *
	 * @param callable $action
	 * @param int      $priority
	 * @param int      $accepted_args
	 */
	public static function twigExtension( $action, $priority = null, $accepted_args = null ) {
		$priority      = $priority ?? self::PRIORITY;
		$accepted_args = $accepted_args ?? self::ACCEPTED_ARGS;
		add_action( 'twig_extension', $action, (int) $priority, (int) $accepted_args );
	}

	/**
	 * For register new template namespace
	 *
	 * @param callable $action
	 * @param int      $priority
	 * @param int      $accepted_args
	 */
	public static function twigLoaderPath( $action, $priority = null, $accepted_args = null ) {
		$priority      = $priority ?? self::PRIORITY;
		$accepted_args = $accepted_args ?? self::ACCEPTED_ARGS;
		add_action( 'twig_loader_path', $action, (int) $priority, (int) $accepted_args );
	}
}