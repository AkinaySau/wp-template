<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see        http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Tutmee Theme
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once __DIR__ . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sau_tgm_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function sau_tgm_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => 'Carbon Fields',
			'slug'     => 'carbon-fields',
			'required' => true,
			'force_activation'   => true,
		),
		array(
			'name'      => 'Sender',
			'slug'      => 'sau_sender',
			'source'    => 'https://github.com/AkinaySau/wp_sender/archive/master.zip',
			'force_activation'   => true,
		),

	);

	$config = array(
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'id'           => 'tutmee_tgm',
		// Default absolute path to bundled plugins.
		'default_path' => '',
		// Menu slug.
		'menu'         => 'tgmpa-install-plugins',
		// Parent menu slug.
		'parent_slug'  => 'themes.php',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'capability'   => 'edit_theme_options',
		// Show admin notices or not.
		'has_notices'  => true,
		// If false, a user cannot dismiss the nag message.
//		'dismissable'  => true,
		// If 'dismissable' is false, this message will be output at top of nag.
		'dismiss_msg'  => '',
		// Automatically activate plugins after installation or not.
		'is_automatic' => true,
		// Message to output right before the plugins table.
		'message'      => 'Tutmee Agency',
	);

	tgmpa( $plugins, $config );
}
