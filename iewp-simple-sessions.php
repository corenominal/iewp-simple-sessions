<?php
/**
 * Plugin Name: IEWP Simple PHP Sessions
 * Plugin URI: https://github.com/corenominal/iewp-simple-sessions
 * Description: A WordPress plugin to provide simple PHP session management and functions.
 * Author: Philip Newborough
 * Version: 0.0.1
 * Author URI: https://corenominal.org
 */

/**
 * Start the session as early as possible
 */
function iewp_start_session()
{
	if( !session_id() )
		session_start();
}
add_action( 'init', 'iewp_start_session', 1 );

/**
 * Destroy the session when a user logs out/in
 */
function iewp_destroy_session()
{
	session_destroy();
}
add_action( 'wp_logout', 'iewp_destroy_session' );
add_action( 'wp_login', 'iewp_destroy_session' );

/**
 * Set a session key value pair
 */
if ( !function_exists( 'set_session' ) )
{
	function set_session( $key = 'foo', $value = 'bar' )
	{
		$_SESSION[$key] = $value;
	}
} 

/**
 * Get a session value from key
 */
if ( !function_exists( 'get_session' ) )
{
	function get_session( $key = 'foo' )
	{
		if( isset( $_SESSION[$key] ) )
			return $_SESSION[$key];

		return false;
	}
}
