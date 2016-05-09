<?php
// Webba Booking options page class
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
require_once  dirname(__FILE__).'/../../common/class_wbk_date_time_utils.php';
require_once  dirname(__FILE__).'/../../common/class_wbk_business_hours.php';
 
class WBK_Backend_Options extends WBK_Backend_Component {
	  
	public function __construct() {
		//set component-specific properties
		$this->name          = 'wbk-options';
		$this->title         = 'Settings';
		$this->main_template = 'tpl_wbk_backend_options.php';
		$this->capability    = 'manage_options';
	 
		// init settings
		add_action( 'admin_init', array( $this, 'initSettings' ) );
			
		// init scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueScripts') );
 
		// mce plugin	
	 	add_filter( 'mce_buttons',  array( $this, 'wbk_mce_add_button' ) );
	 	add_filter( 'mce_external_plugins',  array( $this, 'wbk_mce_add_javascript' ) );
	 	add_filter( 'wp_default_editor', create_function( '', 'return \'tinymce\';' ) );
	 	add_filter( 'tiny_mce_before_init', array( $this, 'customizeEditor' ) );
	}
	public function customizeEditor( $in ) {
		
		if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wbk-options' ) { 
		
			$in['remove_linebreaks'] = false;
		 	
		 	$in['remove_redundant_brs'] = false;
	 		
	 		$in['wpautop'] = false;
	 	}
	 	
		return $in;
	}
	public function wbk_mce_add_button( $buttons ) {
		if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wbk-options' ) { 
			$buttons[] = 'wbk_service_name_button';
			$buttons[] = 'wbk_customer_name_button';
			$buttons[] = 'wbk_appointment_day_button';
			$buttons[] = 'wbk_appointment_time_button';
			$buttons[] = 'wbk_customer_phone_button';
			$buttons[] = 'wbk_customer_email_button';
			$buttons[] = 'wbk_customer_comment_button';
			$buttons[] = 'wbk_customer_custom_button';
			$buttons[] = 'wbk_items_count';
		}
		
		return $buttons;	
	}
	public function wbk_mce_add_javascript( $plugin_array ) {
		if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wbk-options' ) { 
		
			$plugin_array['wbk_tinynce'] =  plugins_url( 'js/wbk-tinymce.js', dirname( __FILE__ ) );
		}	
			
		return $plugin_array;
	}
		
	// init wp settings api objects for options page
	public function initSettings() {
		
		// general settings section init 
		add_settings_section(
	        'wbk_general_settings_section',        		 
	        __( 'General', 'wbk' ),             		     		 
	        array( $this, 'wbk_general_settings_section_callback'),  
	        'wbk-options'  
   		);		
		 
    	// start of week
		add_settings_field( 
	        'wbk_start_of_week',                      
	        __( 'Week starts on', 'wbk' ),                       
	        array( $this, 'render_start_of_week'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_start_of_week',
        	array ( $this, 'validate_start_of_week' )
    	);
  		
 		// date format
    	add_settings_field( 
	        'wbk_date_format',                      
	        __( 'Date format', 'wbk' ),                       
	        array( $this, 'render_date_format'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_date_format',
        	array ( $this, 'validate_date_format' )
    	); 
    	// time format
    	add_settings_field( 
	        'wbk_time_format',                      
	        __( 'Time format', 'wbk' ),                       
	        array( $this, 'render_time_format'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_time_format',
        	array ( $this, 'validate_time_format' )
    	); 
    	// timezone
		add_settings_field( 
	        'wbk_timezone',                      
	        __( 'Timezone', 'wbk' ),                       
	        array( $this, 'render_timezone'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_timezone',
        	array ( $this, 'validate_timezone' )
    	); 	
    	// phone mask
		add_settings_field( 
	        'wbk_phone_mask',                      
	        __( 'Phone number mask input', 'wbk' ),                       
	        array( $this, 'render_phone_mask'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_phone_mask',
        	array ( $this, 'validate_phone_mask' )
    	); 	

    	// phone format 
		add_settings_field( 
	        'wbk_phone_format',                      
	        __( 'Phone format', 'wbk' ),                       
	        array( $this, 'render_phone_format'),      
	        'wbk-options',                           
	        'wbk_general_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_phone_format',
        	array ( $this, 'validate_phone_format' )
    	); 	

    	// holyday settings section init
    	add_settings_section(
	        'wbk_schedule_settings_section',        		 
	        __( 'Holidays', 'wbk' ),             		     		 
	        array( $this, 'wbk_schedule_settings_section_callback'),  
	        'wbk-options'  
   		);
 
    	// holydays
    	add_settings_field( 
	        'wbk_holydays',                      
	        __( 'Holidays', 'wbk' ),                       
	        array( $this, 'render_holydays' ),      
	        'wbk-options',                           
	        'wbk_schedule_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_holydays',
         	 array ( $this, 'validate_holydays' )
    	); 
    	// email settings section init
	 	add_settings_section(
	        'wbk_email_settings_section',        		 
	        __( 'Email notifications', 'wbk' ),             		     		 
	        array( $this, 'wbk_email_settings_section_callback'),  
	        'wbk-options'  
   		);	
   		add_settings_field( 
	        'wbk_email_customer_book_status',                      
	        __( 'Send customer an email', 'wbk' ),                       
	        array( $this, 'render_email_customer_book_status' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_customer_book_status',
         	 array ( $this, 'validate_email_customer_book_status' )
    	); 
		add_settings_field( 
	        'wbk_email_customer_book_subject',                      
	        __( 'Subject of an email to a customer', 'wbk' ),                       
	        array( $this, 'render_email_customer_book_subject' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_customer_book_subject',
         	 array ( $this, 'validate_email_customer_book_subject' )
    	); 
		add_settings_field( 
	        'wbk_email_customer_book_message',                      
	        __( 'Message to a customer', 'wbk' ),                       
	        array( $this, 'render_email_customer_book_message' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_customer_book_message',
         	 array ( $this, 'validate_email_customer_book_message' )
    	); 
 
   		add_settings_field( 
	        'wbk_email_admin_book_status',                      
	        __( 'Send administrator an email', 'wbk' ),                       
	        array( $this, 'render_email_admin_book_status' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_admin_book_status',
         	 array ( $this, 'validate_email_admin_book_status' )
    	); 
		add_settings_field( 
	        'wbk_email_admin_book_subject',                      
	        __( 'Subject of an email to an administrator', 'wbk' ),                       
	        array( $this, 'render_email_admin_book_subject' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_admin_book_subject',
         	 array ( $this, 'validate_email_admin_book_subject' )
    	); 
		add_settings_field( 
	        'wbk_email_admin_book_message',                      
	        __( 'Message to an administrator', 'wbk' ),                       
	        array( $this, 'render_email_admin_book_message' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_email_admin_book_message',
         	 array ( $this, 'validate_email_admin_book_message' )
    	); 
	 		
		add_settings_field( 
	        'wbk_from_name',                      
	        __( 'From: name', 'wbk' ),                       
	        array( $this, 'render_from_name' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_from_name',
         	 array ( $this, 'validate_from_name' )
    	); 	
	 		
		add_settings_field( 
	        'wbk_from_email',                      
	        __( 'From: email', 'wbk' ),                       
	        array( $this, 'render_from_email' ),      
	        'wbk-options',                           
	        'wbk_email_settings_section',         
	        array()
    	);	 
    	register_setting(
        	'wbk_options',
        	'wbk_from_email',
         	 array ( $this, 'validate_from_email' )
    	); 	
		// appearance settings section init
 	 	add_settings_section(
	        'wbk_appearance_settings_section',        		 
	        __( 'Appearance', 'wbk' ),             		     		 
	        array( $this, 'wbk_appearance_settings_section_callback'),  
	        'wbk-options'       
   		);	
 
   		add_settings_field( 
	        'wbk_mode',                      
	        __( 'Mode', 'wbk' ),                       
	        array( $this, 'render_mode' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_mode',
         	 array ( $this, 'validate_mode' )
    	); 	
		add_settings_field( 
	        'wbk_service_label',                      
	        __( 'Select service label', 'wbk' ),                       
	        array( $this, 'render_service_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_service_label',
         	 array ( $this, 'validate_service_label' )
    	);
		add_settings_field( 
	        'wbk_date_extended_label',                      
	        __( 'Select date label (extended mode)', 'wbk' ),                       
	        array( $this, 'render_date_extended_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_date_extended_label',
         	 array ( $this, 'validate_date_extended_label' )
    	);
		add_settings_field( 
	        'wbk_date_basic_label',                      
	        __( 'Select date label (basic mode)', 'wbk' ),                       
	        array( $this, 'render_date_basic_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_date_basic_label',
         	 array ( $this, 'validate_date_basic_label' )
    	);
		add_settings_field( 
	        'wbk_hours_label',                      
	        __( 'Select hours label', 'wbk' ),                       
	        array( $this, 'render_hours_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_hours_label',
         	 array ( $this, 'validate_hours_label' )
    	); 	
		add_settings_field( 
	        'wbk_slots_label',                      
	        __( 'Select time slots label', 'wbk' ),                       
	        array( $this, 'render_slots_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_slots_label',
         	 array ( $this, 'validate_slots_label' )
    	); 	
		add_settings_field( 
	        'wbk_form_label',                      
	        __( 'Booking form label', 'wbk' ),                       
	        array( $this, 'render_form_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_form_label',
         	 array ( $this, 'validate_form_label' )
    	); 	
 		add_settings_field( 
	        'wbk_book_items_quantity_label',                      
	        __( 'Booking items count label', 'wbk' ),                       
	        array( $this, 'render_book_items_quantity_label' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_book_items_quantity_label',
         	 array ( $this, 'validate_book_items_quantity_label' )
    	);
   		add_settings_field( 
	        'wbk_book_thanks_message',                      
	        __( 'Booking done message', 'wbk' ),                       
	        array( $this, 'render_book_thanks_message' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_book_thanks_message',
         	 array ( $this, 'validate_book_thanks_message' )
    	); 	
		add_settings_field( 
	        'wbk_button_background',                      
	        __( 'Frontend buttons background', 'wbk' ),                       
	        array( $this, 'render_button_background' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_button_background',
         	 array ( $this, 'validate_button_background' )
    	); 
		add_settings_field( 
	        'wbk_button_color',                      
	        __( 'Frontend buttons text color', 'wbk' ),                       
	        array( $this, 'render_button_color' ),      
	        'wbk-options',                           
	        'wbk_appearance_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_button_color',
         	 array ( $this, 'validate_button_color' )
    	); 

		// activation settings section init
 	 	add_settings_section(
	        'wbk_activation_settings_section',        		 
	        __( 'Activation', 'wbk' ),             		     		 
	        array( $this, 'wbk_activation_settings_section_callback'),  
	        'wbk-options'       
   		);	
 
		add_settings_field( 
	        'wbk_purchase_code',                      
	        __( 'Purchase Code', 'wbk' ),                       
	        array( $this, 'render_purchase_code' ),      
	        'wbk-options',                           
	        'wbk_activation_settings_section',         
	        array()
    	);
    	register_setting(
        	'wbk_options',
        	'wbk_purchase_code',
         	 array ( $this, 'validate_purchase_code' )
    	); 	
	    	
	}	
  
	// init styles and scripts
	public function enqueueScripts() {
                     
 		if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wbk-options' ) { 
		 
	        wp_enqueue_script( 'jquery-plugin', plugins_url( 'js/jquery.plugin.js', dirname( __FILE__ ) ), array( 'jquery' ) );
	        wp_enqueue_script( 'multidate-picker', plugins_url( 'js/jquery.datepick.min.js', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ) );
	        wp_enqueue_script( 'wbk-options', plugins_url( 'js/wbk-options.js', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog', 'jquery-ui-tabs' ) );
            wp_enqueue_script( 'wbk-minicolors', plugins_url( 'js/jquery.minicolors.min.js ', dirname( __FILE__ ) ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ) );                      
            
            wp_enqueue_style( 'wbk-minicolors-style', plugins_url( 'css/jquery.minicolors.css', dirname( __FILE__ ) ) );
	        wp_enqueue_style( 'wbk-datepicker-css', plugins_url( 'css/jquery.datepick.css', dirname( __FILE__ ) )  );
	        
    	}
	}
 
    // general settings section callback
	public function wbk_general_settings_section_callback( $arg ) {
		 
	
	}
    // schedule settings section callback
	public function wbk_schedule_settings_section_callback( $arg ) {
		 
	
	}
    // email settings section callback
	public function wbk_email_settings_section_callback( $arg ) {
		 
	
	}
 
    // appearance  settings section callback 
	public function wbk_appearance_settings_section_callback( $arg ) {
		 
	
	}
	
	// activation settings section callback
	public function wbk_activation_settings_section_callback( $arg ) {
		 
	
	}
	// render start of week
	public function render_start_of_week() {
		
		$html = '<select id="wbk_start_of_week" name="wbk_start_of_week">
				    <option '.selected(  get_option('wbk_start_of_week'), 'sunday', false ).' value="sunday">'.__( 'Sunday', 'wbk' ).'</option>
				    <option '.selected(  get_option('wbk_start_of_week'), 'monday', false ).' value="monday">'.__( 'Monday', 'wbk' ).'</option>
				    <option '.selected(  get_option('wbk_start_of_week'), 'wordpress', false ).' value="wordpress">'.__( 'Wordpress default', 'wbk' ).'</option>
  				</select>';
  		echo $html;
	} 
	// validate start of week
	public function validate_start_of_week( $input ) {
		$input = trim( $input );
		 
		if ( $input != 'sunday' && $input != 'monday' && $input != 'wordpress' ) {
	
			add_settings_error( 'wbk_start_of_week', 'wbk_start_of_week_error', __( 'Incorrect start of week', 'wbk' ) );
			return 'monday';
		} else {
			return $input;
		}
	}
	// render date format
	public function render_date_format() {
		$value = get_option( 'wbk_date_format' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_date_format" name="wbk_date_format" value="'.$value.'" >';
				    
  		$html .= '<p class="description">' . __( 'Leave empty to use Wordpress Date Format. ', 'wbk' ) . '</p>';		
  		echo $html;
	} 
	// validate date format
	public function validate_date_format( $input ) {
		$input = trim( $input );
		if ( strlen( $input ) > 20 ) {
			
			$input = substr( $input, 0, 19 );
			add_settings_error( 'wbk_date_format', 'wbk_date_format_error', __( 'Date format updated', 'wbk' ), 'updated' );
		
		}	 
		
		$input = sanitize_text_field( $input );
			
		return $input;
			 
	}
	// render time format
	public function render_time_format() {
		$value = get_option( 'wbk_time_format' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_time_format" name="wbk_time_format" value="'.$value.'" >';
				    
  		$html .= '<p class="description">' . __( 'Leave empty to use Wordpress Time Format. ', 'wbk' ) . '</p>';		
  		echo $html;
	} 
	// validate time format
	public function validate_time_format( $input ) {
		$input = trim( $input );
		if ( strlen( $input ) > 20 ) {
			
			$input = substr( $input, 0, 19 );
			add_settings_error( 'wbk_time_format', 'wbk_time_format_error', __( 'Time format updated', 'wbk' ), 'updated' );
		
		}	 
		
		$input = sanitize_text_field( $input );
			
		return $input;
			 
	}
	// render phone mask
	public function render_phone_mask() {
		$value = get_option( 'wbk_phone_mask' );
		$value = sanitize_text_field( $value );
		$html = '<select id="wbk_phone_mask" name="wbk_phone_mask">
				    <option ' . selected(  $value, 'enabled', false ) . ' value="enabled">' . __( 'Enabled', 'wbk' ).'</option>
				    <option ' . selected(  $value, 'disabled', false ) . ' value="disabled">' . __( 'Disabled', 'wbk' ).'</option>
   				 </select>';	

  		echo $html;
	} 
	// validate phone mask
	public function validate_phone_mask( $input ) {
		$input = trim( $input );

		return $input;
		$value = sanitize_text_field( $value );
		if ( $value != 'enabled' && $value != 'disabled' ){
			$value = 'enabled';
		}
 		return $input;			 
	}
	// render phone format
	public function render_phone_format() {
		$value = get_option( 'wbk_phone_format' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_phone_format" name="wbk_phone_format" value="'.$value.'" >';
				    
  		$html .= '<p class="description">' . __( 'a - Represents an alpha character (A-Z,a-z), 9 - Represents a numeric character (0-9), * - Represents an alphanumeric character (A-Z,a-z,0-9)', 'wbk' ) . '</p>';		
  		echo $html;
	} 
	// validate phone format
	public function validate_phone_format( $input ) {
		$input = trim( $input );
		$value = sanitize_text_field( $value );
 		return $input;			 
	}
	
	// render timezone
	public function render_timezone() {
		$value = get_option( 'wbk_timezone' );
		$arr_timezones = timezone_identifiers_list(); 
		$html = '<select id="wbk_timezone" name="wbk_timezone" >';
		foreach ( $arr_timezones as $timezone ) {
			if ( $timezone == $value ) {
				$selected = 'selected';
			
			} else {
				$selected = '';
			}
			
			$html .= "<option $selected value=\"$timezone\">$timezone</option>";
		}
		$html .= '</select>';
		echo $html;
	} 
	
	// validate timezone
	public function validate_timezone( $input ) {
		return $input;
	}
	// render holydays
	public function render_holydays() {
 		$value = get_option( 'wbk_holydays' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_holydays" name="wbk_holydays" value="'.$value.'" >';
			 
  		echo $html; 
	}
 
	// validate holydays
	public function validate_holydays( $input ) {
        	     
		return $input;
 
	}
	// render email to customer
	public function render_email_customer_book_status() {
 		$value = get_option( 'wbk_email_customer_book_status' );
		  
		$html = '<input type="checkbox" ' . checked( 'true', $value, false ) . ' id="wbk_email_customer_book_status" name="wbk_email_customer_book_status" value="true" >';
		
		$html .= '<label for="wbk_email_customer_book_status">' . __( 'Check if you\'d like to send customer an email', 'wbk' ) . '</a>';		    
  		 
  		echo $html; 
	}
 
	// validate email to customer
	public function validate_email_customer_book_status( $input ) {
      
        if ( $input != 'true'  && $input != '' ) {
			
			$input = '';
			add_settings_error( 'wbk_email_customer_book_status', 'wbk_email_customer_book_status_error', __( 'Email status updated', 'wbk' ), 'updated' );
		
		}	 	     
		return $input;
 
	}
	// render email to customer message
	public function render_email_customer_book_message() {
 		$value = get_option( 'wbk_email_customer_book_message' );
		
 		$args = array(
            	'media_buttons' => false,
            	'editor_height' => 300
            );
		wp_editor( $value, 'wbk_email_customer_book_message', $args );		
		 
 	}
 
	// validate email to customer message
	public function validate_email_customer_book_message( $input ) {
       	
		return $input;
 
	}
	// render customer email subject
	public function render_email_customer_book_subject() {
		$value = get_option( 'wbk_email_customer_book_subject' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_email_customer_book_subject" name="wbk_email_customer_book_subject" value="'.$value.'" >';
				    
  		echo $html;
	}
	// validate email to customer message
	public function validate_email_customer_book_subject( $input ) {
       	
		$input = sanitize_text_field( $input ); 
  		if ( !WBK_Validator::checkStringSize( $input, 1, 100 ) ) {
			add_settings_error( 'wbk_email_customer_book_subject', 'wbk_email_customer_book_subject_error', __( 'Customer email subject is wrong', 'wbk' ), 'error' );
		
		} else {
			return $input;
		}		 
 
	}
	// render admin email subject
	public function render_email_admin_book_subject() {
		$value = get_option( 'wbk_email_admin_book_subject' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_email_admin_book_subject" name="wbk_email_admin_book_subject" value="'.$value.'" >';
				    
  		echo $html;
	}
	// validate email to admin message
	public function validate_email_admin_book_subject( $input ) {
       	
		$input = sanitize_text_field( $input ); 
  		if ( !WBK_Validator::checkStringSize( $input, 1, 100 ) ) {
			add_settings_error( 'wbk_email_admin_book_subject', 'wbk_email_admin_book_subject_error', __( 'Administrator email subject is wrong', 'wbk' ), 'error' );
		
		} else {
			return $input;
		}		 
 
	}
 
 	// render email to admin
	public function render_email_admin_book_status() {
 		$value = get_option( 'wbk_email_admin_book_status' );
		  
		$html = '<input type="checkbox" ' . checked( 'true', $value, false ) . ' id="wbk_email_admin_book_status" name="wbk_email_admin_book_status" value="true" >';
		
		$html .= '<label for="wbk_email_admin_book_status">' . __( 'Check if you\'d like to send administrator an email', 'wbk' ) . '</a>';		    
  		 
  		echo $html; 
	}
 
	// validate email to admin
	public function validate_email_admin_book_status( $input ) {
      
        if ( $input != 'true'  && $input != '' ) {
			
			$input = '';
			add_settings_error( 'wbk_email_admin_book_status', 'wbk_email_admin_book_status_error', __( 'Email status updated', 'wbk' ), 'updated' );
		
		}	 	     
		return $input;
 
	}
	// render email to admin message
	public function render_email_admin_book_message() {
 		$value = get_option( 'wbk_email_admin_book_message' );
		
 		$args = array(
            	'media_buttons' => false,
            	'editor_height' => 300
            );
		wp_editor( $value, 'wbk_email_admin_book_message', $args );		
		 
 	}
 
	// validate email to admin nessage
	public function validate_email_admin_book_message( $input ) {
       	
		return $input;
 
	}
 
	// render from email
	public function render_from_email() {
		$value = get_option( 'wbk_from_email' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_from_email" name="wbk_from_email" value="'.$value.'" >';
				    
  		echo $html;
	}
	// validate from email
	public function validate_from_email( $input ) {
  		if ( !WBK_Validator::checkEmail( $input ) ) {
			add_settings_error( 'wbk_from_email', 'wbk_from_email_error', __( '"From: email" is wrong', 'wbk' ), 'error' );
		
		} else {
			return $input;
		}	     
	}
	// render name from
	public function render_from_name() {
		$value = get_option( 'wbk_from_name' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_from_name" name="wbk_from_name" value="'.$value.'" >';
				    
  		echo $html;
	}
	// validate from name
	public function validate_from_name( $input ) {
		$input = sanitize_text_field( $input ); 
  		if ( !WBK_Validator::checkStringSize( $input, 1, 100 ) ) {
			add_settings_error( 'wbk_from_name', 'wbk_from_name_error', __( '"From: name" is wrong', 'wbk' ), 'error' );
		
		} else {
			return $input;
		}	
	}
	// render mode
	public function render_mode() {
		$value = get_option( 'wbk_mode', 'extended' );
		$value = sanitize_text_field( $value );
		$html = '<select id="wbk_mode" name="wbk_mode">
				    <option ' . selected(  $value, 'extended', false ) . ' value="extended">' . __( 'Extended', 'wbk' ).'</option>
				    <option ' . selected(  $value, 'simple', false ) . ' value="simple">' . __( 'Basic', 'wbk' ).'</option>
   				 </select>';	
  		echo $html; 
	}
	// validate mode
	public function validate_mode( $input ) {
        	     
		return $input;
 
	}
	// render service label
	public function render_service_label() {
		$value = get_option( 'wbk_service_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_service_label" name="wbk_service_label" value="'.$value.'" >';
				    
  		$html .= '<p class="description">' . __( 'Service frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate service label
	public function validate_service_label( $input ) {
        	     
		return sanitize_text_field( $input );
 
	}
	// render date extended label
	public function render_date_extended_label() {
		$value = get_option( 'wbk_date_extended_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_date_extended_label" name="wbk_date_extended_label" value="'.$value.'" >';
				    
  		$html .= '<p class="description">' . __( 'Date frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate date extended label
	public function validate_date_extended_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render date basic label
	public function render_date_basic_label() {
		$value = get_option( 'wbk_date_basic_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_date_basic_label" name="wbk_date_basic_label" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Date frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate date basic label
	public function validate_date_basic_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render hours label
	public function render_hours_label() {
		$value = get_option( 'wbk_hours_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_hours_label" name="wbk_hours_label" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Hours frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate hours label
	public function validate_hours_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render slots label
	public function render_slots_label() {
		$value = get_option( 'wbk_slots_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_slots_label" name="wbk_slots_label" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Time slots frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate slots label
	public function validate_slots_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render form label
	public function render_form_label() {
		$value = get_option( 'wbk_form_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_form_label" name="wbk_form_label" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Booking form frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate form label
	public function validate_form_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render quantiyy label
	public function render_book_items_quantity_label() {
		$value = get_option( 'wbk_book_items_quantity_label', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_book_items_quantity_label" name="wbk_book_items_quantity_label" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Booking items count frontend label', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate quantity label
	public function validate_book_items_quantity_label( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render thanks message
	public function render_book_thanks_message() {
		$value = get_option( 'wbk_book_thanks_message', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_book_thanks_message" name="wbk_book_thanks_message" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Booking done message', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate thanks message
	public function validate_book_thanks_message( $input ) {
        	     
		return  sanitize_text_field( $input );
 
	}
	// render button background
	public function render_button_background() {
		$value = get_option( 'wbk_button_background', '#186762' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_button_background" name="wbk_button_background" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Background color for buttons on frontend', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate button background
	public function validate_button_background( $input ) {
		$input = sanitize_text_field( trim( $input ) );
		if ( !WBK_Validator::checkColor( $input ) ){
			$input = '#186762';
		}        	     
		return $input;  
	}
	// render button text color
	public function render_button_color() {
		$value = get_option( 'wbk_button_color', '#ffffff' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_button_color" name="wbk_button_color" value="'.$value.'" >';				    
  		$html .= '<p class="description">' . __( 'Text color for buttons on frontend', 'wbk' ) . '</p>';		
  		echo $html;
	}
	// validate button background
	public function validate_button_color( $input ) {
		$input = sanitize_text_field( trim( $input ) );
		if ( !WBK_Validator::checkColor( $input ) ){
			$input = '#ffffff';
		}        	     
		return $input;  
	}
	// render purchase code
	public function render_purchase_code() {
		$value = get_option( 'wbk_purchase_code', '' );
		$value = sanitize_text_field( $value );
		$html = '<input type="text" id="wbk_purchase_code" name="wbk_purchase_code" value="'.$value.'" >';
			 
  		echo $html;
	}
	// validate purchase code
	public function validate_purchase_code( $input ) {
        	     
		$input = sanitize_text_field( $input );
		return $input;
 
	}
}
?>
