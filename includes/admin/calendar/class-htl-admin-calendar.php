<?php
/**
 * Hotelier View Calendar Page.
 *
 * @author   Benito Lopez <hello@lopezb.com>
 * @category Admin
 * @package  Hotelier/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'HTL_Admin_Calendar' ) ) :

/**
 * HTL_Admin_Calendar Class
 */
class HTL_Admin_Calendar {

	/**
	 * Show the view calendar page
	 */
	public static function output() {
		// Get weeks
		$weeks  = ! empty( $_GET[ 'weeks' ] ) ? absint( $_GET[ 'weeks' ] ) : 1;

		// Sanitize weeks parameter
		if ( $weeks < 1 || $weeks > 4 ) {
			$weeks = 1;
		}

		// Get marker date
		$marker = ! empty( $_GET[ 'marker' ] ) ? ( $_GET[ 'marker' ] ) : '';

		if ( ! HTL_Formatting_Helper::is_valid_date( $marker ) ) {
			$marker = new Datetime();
		} else {
			$marker = new Datetime( $marker );
		}

		// Get room category (if any)
		$room_cat = ! empty( $_GET[ 'room_term' ] ) ? ( $_GET[ 'room_term' ] ) : false;

		include_once( 'views/html-admin-calendar.php' );
	}
}

endif;
