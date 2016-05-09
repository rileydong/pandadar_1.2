<?php
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
class WBK_Date_Time_Utils {
	// get date format option
	public static function getDateFormat () {
		$date_format =  trim ( get_option ( 'wbk_date_format' ) );
		if ( empty ( $date_format ) ) {
			$date_format = trim ( get_option ( 'date_format' ) );
				if ( empty ( $date_format ) ) {
					$date_format = 'l, F j';
				}
		}
		return $date_format;
	}
	// get start of week option
	public static function getStartOfWeek () {
		$start_of_week = get_option ( 'wbk_start_of_week' );
		if ( $start_of_week == 'wordpress' ) {
			$start_of_week = get_option ( 'start_of_week', 0 );
			if ( $start_of_week == 0 ) {
				$start_of_week = 'sunday';
			
			} else {
				$start_of_week = 'monday';
			}
		}
		if ( $start_of_week !== 'sunday' &&  $start_of_week !== 'monday' ){
			$start_of_week = 'sunday';
		}
		return $start_of_week;
	}
	// get time format option
	public static function getTimeFormat () {
		$time_format =  trim ( get_option ( 'wbk_time_format' ) );
		if ( empty ( $time_format ) ) {
			$time_format = trim ( get_option ( 'time_format' ) );
				if ( empty ( $time_format ) ) {
					$time_format = 'H:i';
				}
		}
		return $time_format;
	}
	// get start of current week
	public static function getStartOfCurrentWeek() {
		$start_of_week = WBK_Date_Time_Utils::getStartOfWeek();
		if ( $start_of_week == 'sunday' ){
			return strtotime( 'last sunday', strtotime('tomorrow') );
		} else {
			return strtotime( 'last monday', strtotime('tomorrow') );
		}
	}
	// get start of current week
	public static function getStartOfWeekDay( $day ) { 
		$start_of_week = WBK_Date_Time_Utils::getStartOfWeek();
		if ( $start_of_week == 'sunday' ){
			if( date( 'N', $day ) == '7' ) {
		   		return  $day; 
		    } else {
				return strtotime( 'last sunday', $day );
			}
		} else {
		   if( date( 'N', $day ) == '1' ) {
		   		return  $day; 
		   } else {
				return strtotime( 'last monday', $day );
		   } 
		}
	}
	// render business hours form 
    public static function renderBHForm() {
        date_default_timezone_set( 'UTC' );
        $business_hours = new WBK_Business_Hours();
        $business_hours->setDefault();

        $html =  WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'monday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'tuesday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'wednesday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'thursday' );        
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'friday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'saturday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_at_day( $business_hours, 'sunday' );
        
        $timezone = get_option( 'wbk_timezone', '' );
        if ( $timezone != '' ){
            date_default_timezone_set( $timezone );
        }
        
        return $html;
    }
    // render business hours for cell (string)
    public static function renderBHCell( $value ) {
        date_default_timezone_set( 'UTC' );        
        $business_hours = new WBK_Business_Hours();
        $arr_bh = explode( ';', $value );
        $business_hours->setFromArray( $arr_bh );

        $html =  WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'monday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'tuesday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'wednesday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'thursday' );        
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'friday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'saturday' );
        $html .= WBK_Date_Time_Utils::render_business_hours_cell_at_day( $business_hours, 'sunday' );
        
        $timezone = get_option( 'wbk_timezone', '' );
        if ( $timezone != '' ){
            date_default_timezone_set( $timezone );
        }
        return $html;
    }
    // render hours for day
    public static function render_business_hours_at_day( $business_hours, $day ) {
        // prepare title
        if ( $day == 'monday' ){
            $day_name =  __( 'Monday', 'wbk' );
        }
        if ( $day == 'tuesday' ){
            $day_name =  __( 'Tuesday', 'wbk' );
        }
        
        if ( $day == 'wednesday' ){
            $day_name =  __( 'Wednesday', 'wbk' );
        }
        if ( $day == 'thursday' ){
            $day_name =  __( 'Thursday', 'wbk' );
        }
        if ( $day == 'friday' ){
            $day_name =  __( 'Friday', 'wbk' );
        }
        if ( $day == 'saturday' ){
            $day_name =  __( 'Saturday', 'wbk' );
        }
        if ( $day == 'sunday' ){
            $day_name =  __( 'Sunday', 'wbk' );
        }
        // create html for time lists
        $interval_count = $business_hours->getIntervalCount( $day );
        $time_format = WBK_Date_Time_Utils::getTimeFormat();
        if ( $business_hours->isWorkday( $day )  == true ) {
            $disabled = '';
        } else {
            $disabled = 'disabled';
        }
        
        // render interval 1
        $interval = $business_hours->getInterval( $day, 1 );
        
        if ( isset ( $interval ) && count ( $interval ) == 2 ){
    
            $start_time = $interval[0] - 2;
            $end_time   = $interval[1] - 2; 
        }  else {
            return;
        }
        
        // render "from" list for interval 1
        $html_interval_1_1 = '<select  class="wbk_select_no_border wbk-business-hours" id="int_1_1_' . $day . '" name="wbk_business_hours[]" >';
        for( $time = 0; $time <= 84600;  $time += 1800 ) {
            $temp_time = $time + 2;
            $html_interval_1_1 .= '<option ' . selected( $start_time, $time, false ) . ' value="' . $temp_time . '">' . date_i18n ( $time_format, $time ) . '</option>';
          
        }
        $html_interval_1_1 .= '</select>';
        // render "to" list for interval 1
        $html_interval_1_2 = '<select  class="wbk_select_no_border wbk-business-hours" id="int_1_2_' . $day . '" name="wbk_business_hours[]" >';
        for( $time = 1800; $time <= 84600;  $time += 1800 ) {
            $temp_time = $time + 2;
            $html_interval_1_2 .= '<option ' . selected( $end_time, $time, false ) . ' value="' . $temp_time . '">' . date_i18n ( $time_format, $time ) . '</option>';
          
        }
        $html_interval_1_2 .= '</select>';
        // render interval 2
        if ( $interval_count == 2 ) {
            $interval = $business_hours->getInterval( $day, 2 );
            
            if ( isset ( $interval ) && count ( $interval ) == 2 ){
        
                $start_time = $interval[0] - 2;
                $end_time   = $interval[1] - 2; 
            }  else {
                return;
            }
            
            // render "from" list for interval 1
            $html_interval_2_1 = '<select class="wbk_select_no_border wbk-business-hours" id="int_2_1_' . $day . '" name="wbk_business_hours[]" >';
            for( $time = 3600; $time <= 84600;  $time += 1800 ) {
                $temp_time = $time + 2;
                $html_interval_2_1 .= '<option ' . selected( $start_time, $time, false ) . ' value="' . $temp_time . '">' . date_i18n ( $time_format, $time ) . '</option>';
              
            }
            $html_interval_2_1 .= '</select>';
            // render "to" list for interval 1
            $html_interval_2_2 = '<select class="wbk_select_no_border wbk-business-hours" id="int_2_2_' . $day . '" name="wbk_business_hours[]" >';
            for( $time = 5400; $time <= 84600;  $time += 1800 ) {
                $temp_time = $time + 2;
                $html_interval_2_2 .= '<option ' . selected( $end_time, $time, false ) . ' value="' . $temp_time . '">' . date_i18n ( $time_format, $time ) . '</option>';
              
            }
            $html_interval_2_2 .= '</select>';
        }
         
        $checkbox_val = (int) $business_hours->isWorkday( $day );
        $html = '<input type="checkbox"  value = "' . $checkbox_val . '"' . checked( $business_hours->isWorkday( $day ), true, false ) . ' id="chk_day_' . $day . '" />';
        $html .= '<input type="hidden" class="wbk-business-hours" name="wbk_business_hours[]" value = "' . $checkbox_val . '"' . ' id="chk_day_val_' . $day . '" />';
        $html .= '<label for="chk_day_' . $day . '">' . $day_name . '</label><br/>';
        $html .= '<div id="business_hours_' . $day . '_1" class="business_hours_container" >' . $html_interval_1_1 . ' - ' . $html_interval_1_2 . '</div>';
        if ( $interval_count == 2 ){
            $html .= '<div id="business_hours_' . $day . '_2" class="business_hours_container" >' . $html_interval_2_1 . ' - ' . $html_interval_2_2 . '</div>';
            $html .= '<div id="business_hours_' . $day . '_control" class="business_hours_control_container" >' .       
                        
                        ' <a href="javascript:removeInterval( &#39;' . $day . '&#39; )">' . __( 'Remove the second gap', 'wbk') . '</a> 
                      </div>';
        } else {
            $html .= '<div id="business_hours_' . $day . '_2" class="business_hours_container" ></div>';
            $html .= '<div id="business_hours_' . $day . '_control" class="business_hours_control_container" >' .       
                        
                        ' <a href="javascript:addInterval( &#39;' . $day . '&#39; )">' . __( 'Add the second gap', 'wbk') . '</a> 
                      </div>';
        }
        return $html;
    }
    // render hours for day (cell)
    public static function render_business_hours_cell_at_day( $business_hours, $day ) {
        date_default_timezone_set( 'UTC' );
                
        // prepare title
        if ( $day == 'monday' ){
            $day_name =  __( 'Monday', 'wbk' );
        }
        if ( $day == 'tuesday' ){
            $day_name =  __( 'Tuesday', 'wbk' );
        }
        
        if ( $day == 'wednesday' ){
            $day_name =  __( 'Wednesday', 'wbk' );
        }
        if ( $day == 'thursday' ){
            $day_name =  __( 'Thursday', 'wbk' );
        }
        if ( $day == 'friday' ){
            $day_name =  __( 'Friday', 'wbk' );
        }
        if ( $day == 'saturday' ){
            $day_name =  __( 'Saturday', 'wbk' );
        }
        if ( $day == 'sunday' ){
            $day_name =  __( 'Sunday', 'wbk' );
        }
        $html = '<b>' . $day_name . '</b>';
 
        $interval_count = $business_hours->getIntervalCount( $day );
        $time_format = WBK_Date_Time_Utils::getTimeFormat();
        if ( !$business_hours->isWorkday( $day )  == true ) {
           return;
        }  
        
        
        $interval = $business_hours->getInterval( $day, 1 );
        
        if ( isset ( $interval ) && count ( $interval ) == 2 ){
    
            $start_time = $interval[0];
            $end_time   = $interval[1]; 
        }  else {
            return;
        }
        $html .= ' ('.  date_i18n( $time_format, $start_time ) . ' - ' . date_i18n( $time_format, $end_time );
        
 
        if ( $interval_count == 2 ) {
            $interval = $business_hours->getInterval( $day, 2 );
            
            if ( isset ( $interval ) && count ( $interval ) == 2 ){
        
                $start_time = $interval[0];
                $end_time   = $interval[1]; 
            }  else {
                return;
            }
            $html .= ', '.  date_i18n( $time_format, $start_time ) . ' - ' . date_i18n( $time_format, $end_time );
        }
         
        $html .= ') ';
        $timezone = get_option( 'wbk_timezone', '' );
        if ( $timezone != '' ){
            date_default_timezone_set( $timezone );
        }
        
        return $html;
    }    
}
?>