<?php
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
require_once  dirname(__FILE__).'/../../common/class_wbk_date_time_utils.php';
require_once  dirname(__FILE__).'/../../common/class_wbk_service_schedule.php';
 
class WBK_Backend_Schedule extends WBK_Backend_Component   {
	
	public function __construct() {
		//set component-specific variables
		$this->name          = 'wbk-schedule';
		$this->title         = 'Schedule';
		$this->main_template = 'tpl_wbk_backend_schedule.php';
		$this->capability    = 'read';
		 
		// init scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueScripts') );
		// add ajax actions
		add_action( 'wp_ajax_wbk_schedule_load', array( $this, 'ajaxScheduleLoad' ) );
		add_action( 'wp_ajax_wbk_lock_day', array( $this, 'ajaxLockDay' ) );
		add_action( 'wp_ajax_wbk_unlock_day', array( $this, 'ajaxUnlockDay' ) );
		add_action( 'wp_ajax_wbk_lock_time', array( $this, 'ajaxLockTime' ) );
		add_action( 'wp_ajax_wbk_unlock_time', array( $this, 'ajaxUnlockTime' ) );
		add_action( 'wp_ajax_wbk_view_appointment', array( $this, 'ajaxViewAppointment' ) );
		add_action( 'wp_ajax_wbk_prepare_appointment', array( $this, 'ajaxPrepareAppointment' ) );
		add_action( 'wp_ajax_wbk_delete_appointment', array( $this, 'ajaxDeleteAppointment' ) ); 
		add_action( 'wp_ajax_wbk_add_appointment_backend', array( $this, 'ajaxAddAppointment' ) );
 	}
	// init styles and scripts
	public function enqueueScripts() {
                     
 		if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wbk-schedule' ) { 
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-dialog' );
            
	        wp_enqueue_script( 'wbk-schedule', plugins_url( 'js/wbk-schedule.js', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ) );
 			wp_enqueue_script( 'wbk-validator', plugins_url( '../common/wbk-validator.js', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core' ) );   
	 		wp_enqueue_script( 'jquery-maskedinput', plugins_url( '../common/jquery.maskedinput.min.js', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core' ) );

			$translation_array = array(
				'addappointment' => __( 'Add appointment', 'wbk' ),			
				'add' => __( 'Add', 'wbk' ),	
				'close' => __( 'Close', 'wbk' ),
				'appointment' => __( 'Appointment', 'wbk' ),
				'delete' => __( 'Delete', 'wbk' ),
				'shownextweek' => __( 'Show next week', 'wbk' )
			);
			wp_localize_script( 'wbk-schedule', 'wbkl10n', $translation_array );

 		}
 	}
 	// ajax edit description
 	public function ajaxScheduleLoad() {
 		$service_id = $_POST['service_id'];
		global $current_user;
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
 		$start = $_POST['start'];
 		if ( !WBK_Validator::checkInteger( $service_id, 1, 99999 ) ){
			echo '-1';
 			die();
 			return;
 		}
 		if ( !WBK_Validator::checkInteger( $start, 0, 99999 ) ){
			echo '-2';
 			die();
 			return;
 			
 		}
 		// check if service exists
 		$service_test = new WBK_Service();
 		if ( !$service_test->setId( $service_id ) ){
 			echo -1;
 			die();
 			return;
 		}
 		if ( !$service_test->load() ){
 			echo -1;
 			die();
 			return;
 		}
 		// init service schedulle
 		$service_schedule = new WBK_Service_Schedule();
 		$service_schedule->setServiceId( $service_id );
 		$service_schedule->load();
 		// output days
 		if ( $start == 0 ){
			$day_to_render = WBK_Date_Time_Utils::getStartOfCurrentWeek();
 		} else {
			$nextWeekDay = strtotime('today') +  86400 * 7 * $start;
			
			$day_to_render = WBK_Date_Time_Utils::getStartOfWeekDay( $nextWeekDay );
 		}
        
		$date_format = WBK_Date_Time_Utils::getDateFormat();	 
		$html = '<div class="row-simple">';
		for ( $i = 1;  $i <= 7 ;  $i++ ) { 
			$statusClass = 'green_bg';
			$day_status = $service_schedule->getDayStatus( $day_to_render );
			if ( $day_status == 0 ) {
				$statusClass = 'red_bg';
			}
			$today = strtotime('today');
			if ( $day_to_render < $today ) {
				$statusClass = 'gray_bg';		
				$html_day_controls = ''; 
			} else {
				if ( $day_status == 0 ){
					$html_day_controls = '<div class="day_controls" href="/" id="day_controls_' . $day_to_render . '">
												<a class="green_font" id="day_unlock_' . $service_id . '_' . $day_to_render . '">' . __( 'open', 'wbk' ) . '</a>
										  </div>';
				} else {
					$html_day_controls = '<div class="day_controls" id="day_controls_' . $day_to_render . '">
												<a class="red_font" id="day_lock_' . $service_id . '_' . $day_to_render . '">' . __( 'close', 'wbk' ) . '</a>
										  </div>';
				}
			}
 			
			$service_schedule->buildSchedule( $day_to_render );
			if ( $day_to_render < $today ) {
				$html_schedule = $service_schedule->renderPastDayBackend();
			} else {
				$html_schedule = $service_schedule->renderDayBackend();
			
			}
			$html .=  '<div class="day_container">' . 
					    	'<div id="day_title_' . $day_to_render . '" class="day_title ' . $statusClass . '">'.
								date_i18n( $date_format, $day_to_render ).
								'</div>' . $html_day_controls . '
								<div>'.
								$html_schedule
								.'</div>
						</div>'; 
			
			$day_to_render = strtotime( 'tomorrow', $day_to_render  );
		}
  		
  		$html .= '</div>';
		echo $html;
		die();
 
 	}
 	// ajax lock day
 	public function ajaxLockDay() {
 		
 		global $wpdb;
 		
 		$service_id = $_POST['service_id'];	
		global $current_user;
        
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
 		if ( !WBK_Validator::checkInteger( $service_id, 1, 99999 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		$day = $_POST['day'];
 		if ( !WBK_Validator::checkInteger( $day, 1438426800, 1754046000 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		 
 		if ( $wpdb->query( $wpdb->prepare( "DELETE FROM wbk_days_on_off WHERE day = %d and service_id = %d",  $day, $service_id ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		if ( $wpdb->insert( 'wbk_days_on_off', array( 'service_id' => $service_id, 'day' => $day, 'status' => 0 ), array( '%d', '%d', '%d' ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		
 		echo '<a class="green_font" id="day_unlock_' . $service_id . '_' . $day . '">' . __( 'open', 'wbk' ) . '</a>';
		die();
 		
 	}	 
	// ajax unlock day
 	public function ajaxUnlockDay() {
 		
 		global $wpdb;
 		global $current_user;
 		
 		$service_id = $_POST['service_id'];
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
 		if ( !WBK_Validator::checkInteger( $service_id, 1, 99999 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		$day = $_POST['day'];
 		if ( !WBK_Validator::checkInteger( $day, 1438426800, 1754046000 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		 
 		if ( $wpdb->query( $wpdb->prepare( "DELETE FROM wbk_days_on_off WHERE day = %d and service_id = %d",  $day, $service_id ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		if ( $wpdb->insert( 'wbk_days_on_off', array( 'service_id' => $service_id, 'day' => $day, 'status' => 1 ), array( '%d', '%d', '%d' ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		
 		echo '<a class="red_font" id="day_lock_' . $service_id . '_' . $day . '">' . __( 'close', 'wbk' ) . '</a>';
		die();
 		
 	}	
 	// ajax lock time
 	public function ajaxLockTime() {
 		
 		global $wpdb;
 		
 		global $current_user;
 		
 		$service_id = $_POST['service_id'];
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
 		if ( !WBK_Validator::checkInteger( $service_id, 1, 99999 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		$time = $_POST['time'];
 		if ( !WBK_Validator::checkInteger( $time, 1438426800, 1754046000 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		 
 		if ( $wpdb->query( $wpdb->prepare( "DELETE FROM wbk_locked_time_slots WHERE time = %d and service_id = %d",  $time, $service_id ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		if ( $wpdb->insert( 'wbk_locked_time_slots', array( 'service_id' => $service_id, 'time' => $time ), array( '%d', '%d' ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 		
 		echo  '<a class="red_font" id="time_unlock_' . $service_id . '_' . $time . '"><span class="dashicons dashicons-lock"></span></a>';
	            
		die();
 		
 	}	 
 	
 	// ajax unlock time
 	public function ajaxUnlockTime() {
 		
 		global $wpdb;
 		
 		global $current_user;
 		
 		$service_id = $_POST['service_id'];
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
 		if ( !WBK_Validator::checkInteger( $service_id, 1, 99999 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		$time = $_POST['time'];
 		if ( !WBK_Validator::checkInteger( $time, 1438426800, 1754046000 ) ){
 			echo -1;
 			die();
 			return;
 		}
 		 
 		if ( $wpdb->query( $wpdb->prepare( "DELETE FROM wbk_locked_time_slots WHERE time = %d and service_id = %d",  $time, $service_id ) ) === false ){
 			echo -1;
 			die();
 			return;
 		}
 
 		
 		echo  '<a id="app_add_' . $service_id . '_' . $time . '"><span class="dashicons dashicons-welcome-add-page"></span></a><a id="time_lock_' . $service_id . '_' . $time . '"><span class="dashicons dashicons-unlock"></a>';
	            
		die();	
 	}
	// ajax view appointmet
 	public function ajaxViewAppointment() {
 		global $wpdb;
 		
 		global $current_user;
 		
 		$service_id = $_POST['service_id'];
 		$appointment_id = $_POST['appointment_id'];
 
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
        $appointment = new WBK_Appointment();
        if ( !$appointment->setId( $appointment_id ) ) {
            echo '-2';
            die();
            return;
        }     
        if ( !$appointment->load() ) {
            echo '-4';
            die();
            return;
        }
        $name = $appointment->getName();
        $desc = $appointment->getDescription();
        $email = $appointment->getEmail();
        $phone = $appointment->getPhone();
        $time = $appointment->getTime();
        $quantity = $appointment->getQuantity();
        $extra = $appointment->getExtra();
        $extra = str_replace( '###', PHP_EOL, $extra );

		$date_format = WBK_Date_Time_Utils::getDateFormat();
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		$time_string = date_i18n( $date_format, $time ) . ' ' . date_i18n( $time_format, $time );
		$resarray = array( 'name' => $name, 'desc' =>  $desc, 'email' => $email, 'phone' => $phone, 'time' => $time_string, 'extra' => $extra, 'quantity' => $quantity );
    
        echo json_encode($resarray);
        
        die();
        return;
        
 	}
	// ajax prepare appointmet
 	public function ajaxPrepareAppointment() {
 		global $wpdb;
 		
 		global $current_user;
 
 		$time = $_POST['time'];
 		$service_id = $_POST['service_id'];

 		$service = new WBK_Service();
 		if ( !$service->setId( $service_id ) ){
			echo '-1';
			die();
			return; 
 		}
  		if ( !$service->load() ){
			echo '-1';
			die();
			return; 
 		}
 		$quantity = $service->getQuantity();
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
		$date_format = WBK_Date_Time_Utils::getDateFormat();
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		$time_string = date_i18n( $date_format, $time ) . ' ' . date_i18n( $time_format, $time );

		$service_schedule = new WBK_Service_Schedule();
		$service_schedule->setServiceId( $service_id );
		$appointment_available =   $service_schedule->getAvailableCount( $time );

		$resarray = array( 'time' => $time_string, 'timestamp' => $time, 'quantity' => $quantity, 'available' => $appointment_available );
    
        echo json_encode($resarray);
        
        die();
        return;
        
 	}
 	// ajax delete appointment
 	public function ajaxDeleteAppointment() {
 		global $wpdb;
 		
 		global $current_user;
 		
 		$service_id = $_POST['service_id'];
 		$appointment_id = $_POST['appointment_id'];
 
        // check access
        if ( !in_array( 'administrator', $current_user->roles ) ) {
        	if ( !WBK_Validator::checkAccessToService( $service_id ) ) {
	            echo '-1';
	            die();
	            return; 
	        }    	
        }
        $appointment = new WBK_Appointment();
        if ( !$appointment->setId( $appointment_id ) ) {
	 			echo '-1';
	 			die();
	 			return;
		}
		if ( !$appointment->load() ){
			echo -3;
			die();
			return;
		}
		$day = $appointment->getDay();
 
		if ( $appointment->delete() === false ) {
	 			echo '-2';
	 			die();
	 			return;
		} 
 		$service_schedule = new WBK_Service_Schedule();
 		$service_schedule->setServiceId( $service_id );
 		$service_schedule->load();
 		$service_schedule->buildSchedule( $day );
 		$day = $service_schedule->renderDayBackend();
 
		$resarray = array( 'day' =>  $day );
        echo json_encode($resarray);
	 	die();
	 	return;
 	}
	public function ajaxAddAppointment() {
		global $wpdb;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$time = $_POST['time'];
		$desc = $_POST['desc'];
		$extra = $_POST['extra'];
		$quantity = $_POST['quantity'];
		 
		$service_id = $_POST['service_id'];
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

		$count = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(*) FROM wbk_appointments where service_id = %d and time = %d', $service_id, $time ) );
		if ( $count > 0 && $service->getQuantity() == 1 ) {
			echo -9;
			die();
			return;
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



		$id = $appointment->add();
		
		if ( $id === false ) {
			echo -8;
			die();
			return;
		}	
 		$service_schedule = new WBK_Service_Schedule();
 		$service_schedule->setServiceId( $service_id );
 		$service_schedule->load();
 		$service_schedule->buildSchedule( $day );
 		$day = $service_schedule->renderDayBackend();
 
		$resarray = array( 'day' =>  $day );
    
        echo json_encode($resarray);
		die();
		return;
	}
}
?>