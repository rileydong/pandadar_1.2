<?php
// Webba Booking service schedule management class
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
require_once 'class_wbk_business_hours.php'; 
require_once 'class_wbk_appointment.php'; 
require_once 'class_wbk_service.php';
require_once 'class_wbk_time_slot.php';
require_once 'class_wbk_date_time_utils.php';
class WBK_Service_Schedule {
	// service id
	protected $service_id;
	// service
	protected $service;
	// result time slots for day
	protected $timeslots;
	// time slots locked manualy
	protected $locked_ts;
	// days locked manualy
	protected $locked_days;
	// days unlocked manualy
	protected $unlocked_days;
	// locked timeslots
	protected $locked_timeslots;
	// list of appointments for day
	protected $appointments;
	// business hours global option
	protected $busines_hours;
	// breakers (appointments, day break)
	protected $breakers;
  
 	// load custom locks / unlocks
 	public function load() {
 		// load locked and unlocked days
 		$this->loadLockedDays();
	 	$this->loadUnlockedDays();
	 	// load locked timeslots
		$this->loadLockedTimeSlots();
	 	// initalize service object
	 	$this->service = new WBK_Service();
	 	if ( $this->service->setId( $this->service_id ) ){
	 		if ( !$this->service->load() ){
	 			return false;
	 		}
	 	} else {
	 		return false;
	 	}
		$this->busines_hours = new WBK_Business_Hours();
 		$this->busines_hours->load( $this->service->getBusinessHours() );
	 	return true;
 	}
	// set service id
	public function setServiceId( $value ) {
		if ( WBK_Validator::checkInteger( $value, 1, 99999 ) ){
			$this->service_id = $value;
			return true;
		} else {
			array_push( $this->error_messages, __( 'incorrect id', 'wbk' ) );
			return false;
		}
	}
	// full schedule for day
	public function buildSchedule( $day ){
		$this->breakers = array();
		
		// load appointments
		$this->loadAppointmentsDay( $day );
 
		// output
		$html = '';
		$arr_hours =  $this->busines_hours->getBusinessHours( $day );
		$count = count($arr_hours);
		if ( $count != 2 && $count != 4 ) {
			return;
		}
		$betw_interval = $this->service->getInterval() * 60;
		$duration = $this->service->getDuration() * 60;
		$step = $this->service->getStep() * 60; 
		$this->timeslots = array();
	
		// interval 1 output
		$start = $day + $arr_hours[0] - 2;
		$end = $day + $arr_hours[1] - 2;		
		for ( $time = $start; $time < $end; $time += $step ) {
			$temp = $time + $duration + $betw_interval;
			$total_duration = $duration + $betw_interval;
			if ( $temp > $end ) {
				continue;
			}
			$status = $this->timeSlotStatus( $time, $total_duration );			
			if ( $status == -1 ) {
				continue;
			
			}
			
			$slot = new WBK_Time_Slot( $time, $temp );	
 			$slot->setStatus( $status );
 			array_push( $this->timeslots, $slot );	
			
		}
		// interval 2
		if ( $count == 4 ) {
			$start = $day + $arr_hours[2] - 2;
			$end = $day + $arr_hours[3] - 2;	
			$total_duration = $duration + $betw_interval;	
			for ( $time = $start; $time < $end; $time += $step ) {
				$temp = $time + $duration + $betw_interval;
				if ( $temp > $end ) {
					continue;
				}
				$status = $this->timeSlotStatus( $time, $total_duration );			
				if ( $status == -1 ){
					continue;
				
				}
				
				$slot = new WBK_Time_Slot( $time, $temp );	
	 			$slot->setStatus( $status );
	 			array_push( $this->timeslots, $slot );	
	 	  			
			}
		}
		// check for not attached appointments
		$need_sort = false;
		foreach ( $this->appointments as $appointment ) {
			
			$appointment_found = false;
			foreach ( $this->timeslots as $timeslot ) {
				
				if ( $appointment->getTime() == $timeslot->getStart() ) {
					$appointment_found = true;
				}
			}
			if ( !$appointment_found ) {
				$temp = $appointment->getTime() + $appointment->getDuration();
				$slot = new WBK_Time_Slot( $appointment->getTime(), $duration + $betw_interval );	
	 			$slot->setStatus( $appointment->getId() );
	 			array_push( $this->timeslots, $slot );	
	 			$need_sort = true;
			}
		}
		if ( $need_sort ) {
			$arr_temp = array();
			foreach ( $this->timeslots as $timeslot ) {
				array_push( $arr_temp, $timeslot->getStart() );
			}
			array_multisort( $this->timeslots, $arr_temp  );
		}
	}
	// render shcedule for day for backend
	public function renderDayBackend() {
		$html = '';
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		foreach ( $this->timeslots as $timeslot ) {
			$time = date( $time_format, $timeslot->getStart() ); 
			$status_class = '';
			$time_controls = '<a id="time_lock_' . $this->service_id . '_' . $timeslot->getStart() . '"><span class="dashicons dashicons-unlock"></span></a>';
			
			$time_controls = '<a id="app_add_' . $this->service_id . '_' . $timeslot->getStart() . '"><span class="dashicons dashicons-welcome-add-page"></span></a>' . $time_controls;
			
			if( is_array( $timeslot->getStatus() ) ){
				$time_controls = '';
				$items_booked = 0;
				foreach ( $timeslot->getStatus() as $app_id ) {
					$appointment = new WBK_Appointment();
					if ( !$appointment->setId( $app_id ) ) {
						continue;
					};
					if ( !$appointment->load() ) {
						continue;
					};
					$items_booked += $appointment->getQuantity();
					 
				 	$time_controls .= '<a class="wbk-appointment-backend" id="wbk_appointment_' .  $app_id . '_'. $this->service_id .'_1" >' . $appointment->getName() . ' ('. $appointment->getQuantity() . ')' . '</a> ';	 
				}

				if ( $items_booked < $this->service->getQuantity() ) {

					$time_controls .= '<a id="app_add_' . $this->service_id . '_' . $timeslot->getStart() . '"><span class="dashicons dashicons-welcome-add-page"></span></a>';
				}

			}

			if ( $timeslot->getStatus() == -2 ) {
				
				$status_class = 'red_font';
			 	$time_controls = '<a class="red_font" id="time_unlock_' . $this->service_id . '_' . $timeslot->getStart() . '"><span class="dashicons dashicons-lock"></span></a></a>';
			}			
			
			if ( $timeslot->getStatus() > 0  && !is_array( $timeslot->getStatus() ) ) {

				$appointment = new WBK_Appointment();
				if ( !$appointment->setId( $timeslot->getStatus() ) ) {
					continue;
				};
				if ( !$appointment->load() ) {
					continue;
				};
				if ( strlen( $appointment->getName() ) > 9 ){
					$name = substr( $appointment->getName(), 0, 8 ) . '...';
				} else {
					$name = $appointment->getName();
				}
			 	$time_controls = '<a class="wbk-appointment-backend" id="wbk_appointment_' .  $appointment->getId() . '_'. $this->service_id .'_1" >' . $name . '</a>';
 
			}
 		//	$time_controls = $timeslot->getStatus();
			$html .= '<div class="timeslot_container">
						<div class="timeslot_time ' . $status_class . '">'.
							$time.
						'</div>
						<div class="timeslot_controls">'.
							$time_controls.'
						</div> 
						<div class="cb"></div>
					  </div>';
   
		}
		return $html;
	}
	
	// render for past day for backend
	public function renderPastDayBackend() {
		$html = '';
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		foreach ( $this->timeslots as $timeslot ) {
			$time = date( $time_format, $timeslot->getStart() ); 
		 	if ( $timeslot->getStatus() > 0 ) {
				$appointment = new WBK_Appointment();
				if ( !$appointment->setId( $timeslot->getStatus() ) ) {
					continue;
				};
				if ( !$appointment->load() ) {
					continue;
				};
				if ( strlen( $appointment->getName() ) > 9 ){
					$name = substr( $appointment->getName(), 0, 8 ) . '...';
				} else {
					$name = $appointment->getName();
				}
				$time_controls = '<a class="wbk-appointment-backend" id="wbk_appointment_' .  $appointment->getId() . '_'. $this->service_id .'_0" >' . $name . '</a>';
			} else {
				continue;
			}
			$html .= '<div class="timeslot_container">
						<div class="timeslot_time">'.
							$time.
						'</div>
						<div class="timeslot_controls">'.
							$time_controls.'
						</div>
						<div class="cb"></div>
					  </div>';
		}
		return $html;
	}
	// get timeslot status. 0 - free timeslot
	public function timeSlotStatus( $time, $duration ) {
		$start = $time;
		$end = $time + $duration;
		// check breakers
		foreach ( $this->breakers as $breaker ) {
			if ( $start > $breaker->getStart() && $start < $breaker->getEnd() ) {				 
				return -1;
			}
			if ( $end > $breaker->getStart() && $end < $breaker->getEnd() ) {
				return -1;
			}
		}
		// check locked timeslots
 		if ( in_array( $start, $this->locked_timeslots ) ) {
 			return -2;
 		}
		// check appointments
		if ( $this->service->getQuantity() == 1 ) {
			foreach ( $this->appointments as $appointment ) {
				if ( $time == $appointment->getTime() ){
					return $appointment->getId();
				}
			}		
		} else {
			$booking_ids = array();
			foreach ( $this->appointments as $appointment ) {
				if ( $time == $appointment->getTime() ){
					array_push( $booking_ids, $appointment->getId() );
				}
			}
			if ( count( $booking_ids ) > 0 ) {
				return $booking_ids;
			}
		}
	}
 
	// load locked days for service
	public function loadLockedDays() {
		global $wpdb;
		$days = $wpdb->get_col( $wpdb->prepare( 
						"
						SELECT day
						FROM wbk_days_on_off
						where service_id = %d AND status = 0						 
						",
						$this->service_id
					));
		$this->locked_days = array();
		$this->locked_days = array_merge( $this->locked_days, $days );
	}
	// load unlocked days for service
	public function loadUnlockedDays() {
		global $wpdb;
		$days = $wpdb->get_col( $wpdb->prepare( 
						"
						SELECT day
						FROM wbk_days_on_off
						where service_id = %d AND status = 1						 
						",
						$this->service_id
					));
		$this->unlocked_days = array();
		$this->unlocked_days = array_merge( $this->unlocked_days, $days );
	}
	// load unlocked days for service
	public function loadLockedTimeSlots() {
		global $wpdb;
		$timeslots = $wpdb->get_col( $wpdb->prepare( 
						"
						SELECT time
						FROM wbk_locked_time_slots
						where service_id = %d",
						$this->service_id
					));
		$this->locked_timeslots = array();
		$this->locked_timeslots = array_merge( $this->locked_timeslots, $timeslots );
	}
	// get day status working / weekend
	// 1 - working, 0 - weekend
	public function getDayStatus( $day ){
		// check manual arrays
		if ( in_array( $day, $this->locked_days ) === true ){
		 	return 0;
		}
		// check manual arrays
		if ( in_array( $day, $this->unlocked_days ) === true ){
		 	return 1;
		}
		// check global holyday option
		if ( $this->busines_hours->checkIfHolyday( $day )  === true ) {
		 	return 0;
		}
		// check global weekly options
		if ( $this->busines_hours->isWorkdayTime( $day )  === true ) {
			return 1;
		
		} else {
			return 0;
		}
	}
	// load all appoitments from db for given day
	public function loadAppointmentsDay( $day ) {
		global $wpdb;
 
		$db_arr = $wpdb->get_results( $wpdb->prepare( "
													SELECT *
													FROM wbk_appointments
													where service_id = %d AND day = %d						 
													",
													$this->service_id,
													$day
													) ); 
		$this->appointments  = array();
		if ( count($db_arr ) == 0 ) {
			return 0;
		}
		foreach ( $db_arr as $item ) {
			$appointment = new WBK_Appointment();
			if ( $appointment->set( $item->id,
								    $item->name, 
									$item->description,
									$item->email,
									$item->duration,
									$item->time,
									$item->day,
									$item->phone,
									$item->extra,
									$item->attachment,
									$item->quantity ) ){
				array_push( $this->appointments, $appointment );
				// create breaker
				$betw_interval = $this->service->getInterval();
				$app_end = $item->time + $item->duration * 60 + $betw_interval * 60;
				$breaker = new WBK_Time_Slot( $item->time, $app_end );
				array_push( $this->breakers, $breaker );
			};
		}
		return; 
	}
	// add break for day
	public function addBusinessHoursBreak( $day ) {
		$arr = $this->busines_hours->getBusinessHours( $day );
		if ( count( $arr) == 4 ) {
			$start = $day + $arr[1];
			$end = $day + $arr[2];
			$breaker = new WBK_Time_Interval( $start, $end );
			array_push( $this->breakers, $breaker );
		}
	}
	// frontend render
	public function renderDayFrontend( $time_after ) {		
		$html = '';
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		$time_slots = '';
		foreach ( $this->timeslots as $timeslot ) {
			$time = date_i18n( $time_format, $timeslot->getStart() ); 
			if ( $timeslot->getStatus() == 0  ||  is_array( $timeslot->getStatus() ) ) {
				if ( $timeslot->getStart() >= $time_after ) {
					if ( $timeslot->getStart() > time() ) {
						$availability = '';
						if ( $this->service->getQuantity() > 1 ) {
							$available_count = $this->getAvailableCount( $timeslot->getStart() );
							if ( $available_count > 0 ){
								$time_slots .=
								'<div class=" wbk-width-20-50-100">
									<input value="'.  $time .'" id="wbk-timeslot-btn_' . $timeslot->getStart() . '" data-available="' . $available_count . '" type="button" class="wbk-time-slot wbk-button wbk-width-100" />									 	 
									<span class="wbk-available-count">' . $available_count . ' ' . __( 'available', 'wbk' )  .'</span>
								</div>';

							}

				 
						} else {
							$time_slots .= '<div class=" wbk-width-20-50-100">
											<input value="'.  $time .'" id="wbk-timeslot-btn_' . $timeslot->getStart() . '" type="button" class="wbk-time-slot wbk-button wbk-width-100" />									 	 
										    </div>'; 
						}


					}		
				}
			}
 
 		}
 		if ( $time_slots != '' ) {
			$html = '<div class="wbk-row-padding-5 ">';
			$html .= $time_slots;
			
			$html .= '</div>';
 		}
		
		return $html;
	}
	public function getAvailableCount( $time ){
		global $wpdb;
 		$booked = $wpdb->get_var(  
									$wpdb->prepare(	"SELECT sum(quantity) FROM wbk_appointments WHERE service_id = %d AND time = %d", 
									$this->service_id,
									$time

								)
 								);
 		if ( $booked === NULL ){
 			$booked = 0;
 		}
 		$service = new WBK_Service();
 		if( !$service->setId( $this->service_id ) ){
 			return 0;
 		}
 		if( !$service->load() ){
 			return 0;
 		}
 		$available = $service->getQuantity() - $booked;
		if ( $available < 0 ){
			$available = 0;
		}
		return $available;
	}
 
}
?>