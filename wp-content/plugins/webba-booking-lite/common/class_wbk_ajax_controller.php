<?php
// Webba Booking common ajax controller class
require_once 'class_wbk_business_hours.php';
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
// define main frontend class
class WBK_Ajax_Controller {
	public function __construct() {
		// add action render service hours on frontend	
		add_action( 'wp_ajax_wbk-render-days', array( $this, 'ajaxRenderDays') );
		add_action( 'wp_ajax_nopriv_wbk-render-days', array( $this,'ajaxRenderDays') );
		// add action search time slots on fronted
		add_action( 'wp_ajax_wbk_search_time', array( $this, 'ajaxSearchTime') );
		add_action( 'wp_ajax_nopriv_wbk_search_time', array( $this,'ajaxSearchTime') );
		// add action render time form
		add_action( 'wp_ajax_wbk_render_booking_form', array( $this, 'ajaxRenderBookingForm') );
		add_action( 'wp_ajax_nopriv_wbk_render_booking_form', array( $this, 'ajaxRenderBookingForm') );
		// add action for booking
		add_action( 'wp_ajax_wbk_book', array( $this, 'ajaxBook') );
		add_action( 'wp_ajax_nopriv_wbk_book', array( $this, 'ajaxBook') );
	}
	// callback render service hours on frontend	
	public function ajaxRenderDays() {
		date_default_timezone_set( 'UTC' );
		
		$total_steps = $_POST['step'];
		$service_id = $_POST['service'];
		if ( !WBK_Validator::checkInteger( $service_id, 1 , 999999 ) ) {
			echo -1;
			die();
			return;
		}
		if ( !WBK_Validator::checkInteger( $total_steps, 3 , 4 ) ) {
			echo -1;
			die();
			return;
		}
		if ( $total_steps == 3 ) {
			$step = 2;
		
		} else {
			$step = 3;
		}
 
		// initalize service object
	 	$this->service = new WBK_Service();
	 	if ( $this->service->setId( $service_id ) ){
	 		if ( !$this->service->load() ){
	 			echo -1;
	 			die();
	 			return;
	 		}
	 	} else {
	 		echo -1;
	 		die();
	 		return;
	 	}
		$business_hours = new WBK_Business_Hours();
 		$business_hours->load( $this->service->getBusinessHours() );
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		 
		$select_hours_label = get_option( 'wbk_hours_label', '' );
		if ( $select_hours_label ==  '' ) {
			$select_hours_label = __( 'Suitable hours', 'wbk' );
		}

		$html = '<span class="wbk-input-label">' . $select_hours_label .' </span>';
		$html .= '<table class="wbk-time_table">';
		$unlocked_days_of_week = $business_hours->getLockedDaysOfWeek( $service_id );
		for ( $i = 1;  $i <= 7;  $i++ ) { 
		
			$day_name = $business_hours->getDayName( $i );
		
			if ( $business_hours->isWorkday( $day_name ) ) {
				$hours = $business_hours->getFullInterval( $day_name );	
				$day_name_translated = $business_hours->getDayNameTranslated( $i );
				$select = '<select id="wbk-time_' . $day_name . '" class="wbk-input wbk-width-100 wbk-time_after">';
				for ( $time = $hours[0]; $time < $hours[1]; $time += 3600 ) {
					$time_temp = $time - 2;
					$select .= '<option value="' . $time_temp . '" >' .  __( 'from', 'wbk' ) . ' ' . date_i18n ( $time_format, $time ) . '</option>';
				}
				
				$select .= '</select>';
				$html .= '<tr>';
				$html .= '<td><input type="checkbox" value="' . $day_name . '" class="wbk-checkbox" id="wbk-day_' . $day_name .  '" checked="checked"/><label for="wbk-day_' . $day_name . '"><span class="label_image"></span><span class="wbk-label_text">' . $day_name_translated . '</label></td>';
				$html .= '<td>' . $select . '</td>';
				$html .= '</tr>';	
			} else {
				if ( in_array( $i, $unlocked_days_of_week ) ) {
					$hours = $business_hours->getFullInterval( $day_name );	
					$select = '<select id="wbk-time_' . $day_name . '" class="wbk-input  wbk-time_after">';
					for ( $time = $hours[0]; $time < $hours[1]; $time += 3600 ) {
						$time_temp = $time - 2;
						$select .= '<option value="' . $time_temp . '" >' .  __( 'from', 'wbk' ) . ' ' . date_i18n ( $time_format, $time ) . '</option>';
					}
					
					$select .= '</select>';
					$html .= '<tr>';
					$html .= '<td><input type="checkbox" value="' . $day_name . '" class="wbk-checkbox" id="wbk-day_' . $day_name .  '" checked="checked"/><label for="wbk-day_' . $day_name . '"><span class="label_image"></span><span class="wbk-label_text">' . $day_name . '</label></td>';
					$html .= '<td>' . $select . '</td>';
					$html .= '</tr>';
				}
			}
	  
		}
		$html .= '</table>';
		$html .= '<input type="button" class="wbk-button wbk-width-100 wbk-searchtime-btn"  id="wbk-search_time_btn" value="' . __( 'Search time slots', 'wbk' ) . '"  />';
 		$timezone = get_option( 'wbk_timezone', '' );
        if ( $timezone != '' ){
            date_default_timezone_set( $timezone );
        }
	 	
	 	echo $html;	
 	    die();
 	    return;
	}
	// callback search time slots
	public function ajaxSearchTime() {
		$service_id  = $_POST['service'];
		$date        = $_POST['date'];
		$days 	     = $_POST['days'];
		$times       = $_POST['times'];
		// check date variable: string date or int timestamp
		if ( !is_numeric( $date) ) {
			$day_to_render = strtotime( $date );
		} else {
			$day_to_render = $date;
		}
		// validation
		if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
		
			if ( !is_array( $days ) || !is_array( $times ) ) {
				echo -1;
				die();
				return;
			}
			
			
			if ( count( $days ) != count( $times ) ) {
				echo -2;
				die();
				return;
			}
			foreach ( $days as $day ) {
				
				if ( !WBK_Validator::checkDayofweek( $day ) ) {
					echo -3;
					die();
					return;
				}
			}
			foreach ( $times as $time ) {
				if ( !WBK_Validator::checkInteger( $time, 0, 1758537351 ) ) {
					echo -4;
					die();
					return;
					
				}
			}
		}	
		if ( !WBK_Validator::checkInteger( $day_to_render, 0, 1758537351 ) ) {
		
				echo -5;
				die();
				return;
		}
 
		// end validation
 		$service_schedule = new WBK_Service_Schedule();
 		$service_schedule->setServiceId( $service_id );
 		if ( !$service_schedule->load() ) {
 			echo -6;
 			die();
 			return;
 		}
 		  
		$date_format = WBK_Date_Time_Utils::getDateFormat();
 		
 		$i = 0;
 		if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
	 		$output_count = 7;
	 	
	 	} else {
	 		$output_count = 0;
	 	}	
	 	$html = '';
 		while ( $i <= $output_count ) {
 			$day_status =  $service_schedule->getDayStatus( $day_to_render );
 
 			if ( $day_status == 1 ) {
				
				if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
	
	 				$day_name = strtolower( date( 'l', $day_to_render ) );
	 				$key = array_search( $day_name, $days );
	 				if ( $key === FALSE ) {
						
						$day_to_render = strtotime( 'tomorrow', $day_to_render );
	 					
	 					continue;
	 				} else {
	 					$time_after = $times[$key] + $day_to_render;
	 				}
	 		
	 			} else {
	 				$time_after = $day_to_render;
	 			}	
 				$service_schedule->buildSchedule( $day_to_render ); 	
	 			$day_title = '<div class="wbk-row-padding-5 ">' . date_i18n ( $date_format, $day_to_render ) . '</div>';
	 			$day_slots = $service_schedule->renderDayFrontend( $time_after );
	 			if ( $day_slots != '' ) {
	 				$html .= '<div class="wbk-day-title">' . $day_title . '</div>' . '<div class="wbk-day-slots">' . $day_slots . '</div>';
	 			}
	 			$i++;
 	
 			}
			if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
	  			$day_to_render = strtotime( 'tomorrow', $day_to_render );
			
			} else {
	  			$i++;
			}
 
		}
		if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
			if ( $html != '' ) {
				$html .= '<div class="wbk-row" id="wbk-show_more_container">
							<input type="button" class="wbk-button wbk-width-100"  id="wbk-show_more_btn" value="' . __( 'Show more', 'wbk' ) . '"  />
							<input type="hidden" id="wbk-show-more-start" value="' . $day_to_render . '">
						  </div>';
				$html .= '<div class="wbk-more-container"></div>';
		
			} else {
				$html = __( 'Unfortunately we were unable to meet your search criteria. Please change the criteria and try again.', 'wbk' );
			}
		} else {
			if ( $html == '' ) {
				$html = __( 'Unfortunately we were unable to meet your search criteria. Please change the criteria and try again.', 'wbk' );
			}
		}
		echo $html;
		die();
		return;
	}
	public function ajaxRenderBookingForm() {
		$total_steps = $_POST['step'];
		$time = $_POST['time'];
		$service_id = $_POST['service'];
		 

		if ( !WBK_Validator::checkInteger( $total_steps, 2 , 4 ) ) {
			echo -1;
			die();
			return;
		}
		if ( !WBK_Validator::checkInteger( $time, 0, 1758537351 ) ) {
		
			echo -1;
			die();
			return;
		}
		if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
			if ( $total_steps == 3 ) {
				$step = 3;
			
			} else {
				$step = 4;
			}
		} else {
			if ( $total_steps == 3 ) {
				$step = 3;			
			} else {
				$step = 2;
			}
		}
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		$time_format = WBK_Date_Time_Utils::getTimeFormat();		
		$date_format = WBK_Date_Time_Utils::getDateFormat();

		$service = new WBK_Service();		 
		if ( !$service->setId( $service_id ) ) {
			echo -1;
			die();
			return;
		}
		
		if ( !$service->load() ) {
			echo -6;
			die();
			return;
		}
 
		
		$form = $service->getForm();
		 
	 	$form_label = get_option( 'wbk_form_label', '' );
	 	if ( $form_label ==  '' ) {
	 		$form_label = __( 'Fill in a form', 'wbk' );
	 	}
  
		$appointment_time = date_i18n( $date_format, $time ) . ' ' . date_i18n( $time_format, $time ) ;
		$html = '<span class="wbk-input-label">' . $form_label . ' </span>';

		if ( $service->getQuantity() > 1 ) {
			$service_schedule = new WBK_Service_Schedule();
			$service_schedule->setServiceId( $service->getId() );
			$avail_count  = $service_schedule->getAvailableCount( $time );	
			$html .= '<label for="wbk-quantity">' . get_option( 'wbk_book_items_quantity_label', '' ) . '</label>';				
			$html .= '<select name="wbk-book-quantity" type="text" class="wbk-input wbk-width-100 wbk-mb-10" id="wbk-book-quantity">';
			for ( $i = 1; $i <= $avail_count; $i ++ ) {
				$html .= '<option value="' . $i . '" >' . $i . '</option>';						
			}
			$html .= '</select>';
		}  

		if ( $form == 0 ){

			$html .= '<label for="wbk-customer_name">' . __( 'Name', 'wbk' ) . '</label>';
			$html .= '<input name="wbk-name" type="text" class="wbk-input wbk-width-100 wbk-mb-10" id="wbk-customer_name" />';
			
			$html .= '<label for="wbk-customer_email">' . __( 'E-mail', 'wbk' ) . '</label>';
			$html .= '<input name="wbk-email"  type="text" class="wbk-input wbk-width-100 wbk-mb-10" id="wbk-customer_email" />';
			
			$html .= '<label for="wbk-customer_phone">' . __( 'Phone', 'wbk' ) . '</label>';
			$html .= '<input name="wbk-phone" type="text" class="wbk-input wbk-width-100 wbk-mb-10" id="wbk-customer_phone" />';
			
			$html .= '<label for="wbk-customer_desc">' . __( 'Comment', 'wbk' ) . '</label>';
	 		$html .= '<textarea name="wbk-comment" rows="3" class="wbk-input wbk-width-100 wbk-mb-10" id="wbk-customer_desc"></textarea> ';
		} else {
			 
			$html .= do_shortcode( '[contact-form-7 id="' . $form . '"]' );
		}

        $html .= '<input type="button" class="wbk-button wbk-width-100 wbk-mt-10-mb-10" id="wbk-book_appointment" value="' . __( 'Book', 'wbk' )  . '">';
 	 	
		echo $html;
		die();
		return;	
	}
	public function ajaxBook() {
		global $wpdb;
		$name = sanitize_text_field( $_POST['name'] );
 
		$email = sanitize_text_field( $_POST['email'] );
		$phone = sanitize_text_field( $_POST['phone'] );
		$time = sanitize_text_field( $_POST['time'] );
		$desc = sanitize_text_field(  $_POST['desc'] );
		$extra = sanitize_text_field( $_POST['extra'] );
		$quantity = sanitize_text_field( $_POST['quantity']);

		if( !WBK_Validator::checkInteger( $quantity, 1, 1000000 ) ){
			echo -9;
			die();
			return;
		}

		$service_id = $_POST['service'];
		$day = strtotime( date( 'Y-m-d', $time ).' 00:00:00' );
		$service = new WBK_Service();
		if ( !$service->setId( $service_id ) ) {
			echo -6;
			die();
			return;
		}		
		if ( !$service->load() ) {
			echo -6;
			die();
			return;
		}
		if( $service->getQuantity() == 1 ) {
			$count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM wbk_appointments where service_id = %d and time = %d', $service_id, $time ) );
			if ( $count > 0 ) {
				echo -9;
				die();
				return;
			}
		} else {
			$service_schedule = new WBK_Service_Schedule();
			$service_schedule->setServiceId( $service->getId() );
			$avail_count  = $service_schedule->getAvailableCount( $time );	
			if ( $quantity > $avail_count ){
				echo -13;
				die();
				return;
			}
		}
		$duration = $service->getDuration();
		$appointment = new WBK_Appointment();
		if ( !$appointment->setName( $name ) ){
			echo -1;
			die();
			return;
		}
		
		if ( !$appointment->setEmail( $email ) ){
			echo -2;
			die();
			return;
		} 
		if ( !$appointment->setPhone( $phone ) ){
			echo -3;
			die();
			return;
		}
		if ( !$appointment->setTime( $time ) ){
			echo -4;
			die();
			return;
		}  
		if ( !$appointment->setDay( $day ) ){
			echo -5;
			die();
			return;
		}  
		if ( !$appointment->setService( $service_id ) ){
			echo -6;
			die();
			return;
		}  
		if ( !$appointment->setDuration( $duration ) ){
			echo -7;
			die();
			return;
		}
		if ( !$appointment->setDescription( $desc ) ){
			echo -9;
			die();
			return;
		}
		if ( !$appointment->setExtra( $extra ) ){
			echo -9;
			die();
			return;
		}
		if ( !$appointment->setQuantity( $quantity ) ){
			echo -9;
			die();
			return;
		}
		$appointment_id = $appointment->add();
		
		if ( !$appointment_id ) {
			echo -8;
			die();
			return;
		}	
		$noifications = new WBK_Email_Notifications( $service_id, $appointment_id );
		$noifications->send( 'book' );
		WBK_Stat::appPush();
		echo $appointment_id;
		die();
		return;
	}
 
}
?>