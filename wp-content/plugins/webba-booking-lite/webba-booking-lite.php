<?php
/*
Plugin Name: Webba Booking Lite
Plugin URI: http://webba-booking.com
Description: Responsive appointment booking plugin.
Version: 1.3.3
Author: Webba Agency
Author URI: http://webba-booking.com 
License: Commercial
*/
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
// plugin version 
define( 'PLUGIN_VERSION' , '1.3.3' );
// entities classes
include 'common/class_wbk_entity.php';
// backend class include
include 'backend/class_wbk_backend.php';
// utils classes include
include 'common/class_wbk_db_utils.php';
// ajax controller
include 'common/class_wbk_ajax_controller.php';
// frontend class include
include 'frontend/class_wbk_frontend.php';
// include email notification class
include 'common/class_wbk_email_notifications.php';
// include stat class
include 'common/class_wbk_stat.php';
// include admin notices
include 'common/class_wbk_admin_notices.php';

// localization
add_action( 'init', 'wbk_load_textdomain' );
function wbk_load_textdomain() {
 	load_plugin_textdomain( 'wbk', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
 
// activation/deactivation hooks
register_activation_hook( __FILE__, 'wbk_activate' );
register_deactivation_hook( __FILE__, 'wbk_deactivate' );
register_uninstall_hook( __FILE__, 'wbk_uninstall');

add_action( 'plugins_loaded', 'wbk_update_database' );

function wbk_activate() {
 

	// create tables if not created
	WBK_Db_Utils::createTables();
 
	add_option( 'wbk_start_of_week', '' );
	add_option( 'wbk_date_format', '' );
	add_option( 'wbk_time_format', '' );
	add_option( 'wbk_timezone', '' );
	
	add_option( 'wbk_email_customer_book_status', '' );
	add_option( 'wbk_email_customer_book_message', '<p>Dear #customer_name,</p><p>You have successfully booked #service_name on #appointment_day at #appointment_time</p><p>Thank you for choosing our company!</p>' );
	add_option( 'wbk_email_customer_book_subject', __( 'You have successfully booked an appointment', 'wbk' ) );
	
	add_option( 'wbk_email_admin_book_status', '' );
	add_option( 'wbk_email_admin_book_message', '<p>Details of booking:</p><p>Date: #appointment_day<br />Time: #appointment_time<br />Customer name: #customer_name<br />Customer phone: #customer_phone<br />Customer email: #customer_email<br />Customer comment: #customer_comment</p><p> </p>' );
	add_option( 'wbk_email_admin_book_subject', __( 'New appointment booking', 'wbk' ) );
	add_option( 'wbk_from_name', get_option( 'blogname' ) );
	add_option( 'wbk_from_email', get_option( 'admin_email' ) );	 
	add_option( 'wbk_mode', 'extended' );
	add_option( 'wbk_stat', '0' );
	add_option( 'wbk_service_label', __( 'Select a service', 'wbk' ) );
	add_option( 'wbk_date_extended_label', __( 'Book an appointment on or after', 'wbk' ) );
	add_option( 'wbk_date_basic_label', __( 'Book an appointment on', 'wbk' ) );
	add_option( 'wbk_hours_label', __( 'Suitable hours', 'wbk' ) );
	add_option( 'wbk_slots_label', __( 'Available time slots', 'wbk' ) );
	add_option( 'wbk_form_label', __( 'Fill in a form', 'wbk' ) );
	add_option( 'wbk_book_items_quantity_label', __( 'Booking items count', 'wbk' ) );
	add_option( 'wbk_book_thanks_message', __( 'Thanks for booking appointment', 'wbk' ) );

	add_option( 'wbk_phone_mask', 'enabled' ); 
	add_option( 'wbk_phone_format', '(999) 999-9999' ); 

	add_option( 'wbk_booking_forms',  '' );

	add_option( 'wbk_button_background', '#186762' );
	add_option( 'wbk_button_color', '#ffffff' );

}

function wbk_update_database(){
	// update tables
	WBK_Db_Utils::update_1_2_0();
	WBK_Db_Utils::update_1_3_0();
}

function wbk_deactivate() {
  
}
function wbk_uninstall() {
	 
}
// set timezone
$timezone = get_option( 'wbk_timezone', '' );
if ( $timezone != '' ){
	date_default_timezone_set( $timezone );
}
  	 
// common ajax controller
$ajaxController = new WBK_Ajax_Controller();
// check frontend / backend
if ( is_admin() ) {
	$backend = new WBK_Backend();
} else {
	$frontend = new WBK_Frontend();
}
 
?>