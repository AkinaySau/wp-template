<?php
add_action( 'tgmpa_register', function () {
	$plugins = array(
		array(
			'name'             => 'The SEO Framework',
			'slug'             => 'autodescription',
			'required'         => true,
			'force_activation' => true,
		),
		array(
			'name'             => 'SVG Support',
			'slug'             => 'svg-support',
			'required'         => true,
			'force_activation' => true,
		),
		array(
			'name' => 'WP Minify Fix',
			'slug' => 'wp-minify-fix',
		),
		array(
			'name'             => 'Sender',
			'slug'             => 'sau_sender',
			'source'           => 'https://github.com/AkinaySau/wp_sender/archive/master.zip',
			'force_activation' => true,
		),

	);

	$config = array(
		'id'           => 'tutmee_tgm',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => 'Tutmee Agency',
	);

	tgmpa( $plugins, $config );
} );