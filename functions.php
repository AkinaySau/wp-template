<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 12.05.2017
 * Time: 10:40
 */
if ( ! defined( 'DS' ) )
{
	define( 'DS', DIRECTORY_SEPARATOR );
}
//Load scripts and styles
add_action( 'wp_enqueue_scripts', function ()
{
	// https://wp-kama.ru/function/wp_enqueue_style
	wp_enqueue_style( 'tutmee-style', get_stylesheet_directory_uri() . '/css/style.css' );
	// https://wp-kama.ru/function/wp_enqueue_script
	wp_enqueue_script( 'tutmee-script', get_stylesheet_directory_uri() . '/js/bundle.js', [], false, true );
} );

//Languages
add_action( 'init', function ()
{
	load_theme_textdomain( 'tutmee_theme', get_stylesheet_directory() . DS . 'languages' );
} );

//For include scripts
//Array for include files
$sau_code = [];
foreach ( $sau_code as $file )
{
	if ( file_exists( __DIR__ . DS . $file ) )
	{
		require $file;
	}

}


//Logo
add_action( 'login_head', function ()
{
	echo '<style type="text/css">#login h1 a { background: url(' . get_stylesheet_directory_uri() . '/images/logo.png) no-repeat 0 0 !important; width:187px; height:70px; }</style>';
} );
add_filter( 'login_headerurl', create_function( '', 'return "http://tutmee.ru";' ) );
add_filter( 'login_headertitle', create_function( '', 'return false;' ) );