<?php
// webba booking email notifications class
class WBK_Email_Notifications {
	  
	// send email to customer status  
	protected $customer_book_status;
	// send email to admin status
	protected $admin_book_status;
	// customer email message
	protected $customer_email_message;
	// admin email message
	protected $admin_email_message;
	// customer email subject
	protected $customer_email_subject;
	// admin email subject
	protected $admin_email_subject;
	// from: email
	protected $from_email;
	// from: name
	protected $from_name;
	// service id
	protected $service_id;
	// appointment
	protected $appointment_id;	
	// service_id: int
	// appointment_id: int
	public function __construct( $service_id, $appointment_id ) {
		$this->customer_book_status = get_option( 'wbk_email_customer_book_status' );
 
		$this->admin_book_status = get_option( 'wbk_email_admin_book_status' );
		$this->customer_email_message = get_option( 'wbk_email_customer_book_message' );
		$this->admin_email_message = get_option( 'wbk_email_admin_book_message' );
		
		$this->customer_email_subject = get_option( 'wbk_email_customer_book_subject' );
		$this->admin_email_subject = get_option( 'wbk_email_admin_book_subject' );
		
		$this->from_email = get_option( 'wbk_from_email' );
		$this->from_name = get_option( 'wbk_from_name' );
		$this->service_id = $service_id;
		$this->appointment_id = $appointment_id;
 
 	}
 	public function set_email_content_type() {
 		return 'text/html';
 	}
 	public function send( $event ) {
		
		$appointment = new WBK_Appointment();
		if ( !$appointment->setId( $this->appointment_id ) ) {
			return;
		}
		if ( !$appointment->load() ) {
			return;
		}
		$service = new WBK_Service();
		if ( !$service->setId( $this->service_id ) ) {
			return;
		}
		if ( !$service->load() ) {
			return;
		}
		$date_format = WBK_Date_Time_Utils::getDateFormat();
		$time_format = WBK_Date_Time_Utils::getTimeFormat();
		switch ( $event ) {
		    case 'book':
		    	// email to cutomer
		    	if( $this->customer_book_status != '' ) {
  
			    	//	validation
			    	if ( !WBK_Validator::checkStringSize( $this->customer_email_message, 1, 10000 ) ||
			    		 !WBK_Validator::checkStringSize( $this->customer_email_subject, 1, 100 ) || 
			    		 !WBK_Validator::checkEmail( $this->from_email ) ||
			    		 !WBK_Validator::checkStringSize( $this->from_name, 1, 100 )
			    	   ) {
			    	   return; 
			        }
 
 			        $this->customer_email_message = str_replace( '#service_name', $service->getName(), $this->customer_email_message );
			        $this->customer_email_message = str_replace( '#customer_name', $appointment->getName(), $this->customer_email_message );
			        $this->customer_email_message = str_replace( '#appointment_day', date_i18n( $date_format, $appointment->getDay() ), $this->customer_email_message );
			        $this->customer_email_message = str_replace( '#appointment_time', date_i18n( $time_format, $appointment->getTime() ), $this->customer_email_message );
			        $this->customer_email_message = str_replace( '#customer_phone', $appointment->getPhone(), $this->customer_email_message );
			        $this->customer_email_message = str_replace( '#customer_email', $appointment->getEmail(), $this->customer_email_message );
					$this->customer_email_message = str_replace( '#customer_comment', $appointment->getDescription(), $this->customer_email_message );
					$this->customer_email_message = str_replace( '#items_count', $appointment->getQuantity(), $this->customer_email_message );
					
					// extra data
					$extra_data = $appointment->getExtra();
					$extra_data = str_replace( '###', '<br />', $extra_data);
					$this->customer_email_message = str_replace( '#customer_custom', $extra_data, $this->customer_email_message );

					$headers = 'From: ' . $this->from_name . ' <' . $this->from_email .'>' . "\r\n";
					     	
					add_filter( 'wp_mail_content_type', array( $this, 'set_email_content_type' ) );

			    	wp_mail( $appointment->getEmail(), $this->customer_email_subject, $this->customer_email_message, $headers );	
 		
 					remove_filter( 'wp_mail_content_type', array( $this, 'set_email_content_type' ) );
 					 
			    }
 		      
		    	// email to admin
		    	if( $this->admin_book_status != '' ) {
  
			    	//	validation
			    	if ( !WBK_Validator::checkStringSize( $this->admin_email_message, 1, 10000 ) ||
			    		 !WBK_Validator::checkStringSize( $this->admin_email_subject, 1, 100 ) || 
			    		 !WBK_Validator::checkEmail( $this->from_email ) ||
			    		 !WBK_Validator::checkStringSize( $this->from_name, 1, 100 )
			    	   ) {
			    	   return; 
			        }
 			        $this->admin_email_message = str_replace( '#service_name', $service->getName(), $this->admin_email_message );
			        $this->admin_email_message = str_replace( '#customer_name', $appointment->getName(), $this->admin_email_message );
			        $this->admin_email_message = str_replace( '#appointment_day', date_i18n( $date_format, $appointment->getDay() ), $this->admin_email_message );
			        $this->admin_email_message = str_replace( '#appointment_time', date_i18n( $time_format, $appointment->getTime() ), $this->admin_email_message );
			        $this->admin_email_message = str_replace( '#customer_phone', $appointment->getPhone(), $this->admin_email_message );
			        $this->admin_email_message = str_replace( '#customer_email', $appointment->getEmail(), $this->admin_email_message );
					$this->admin_email_message = str_replace( '#customer_comment', $appointment->getDescription(), $this->admin_email_message );
					$this->admin_email_message = str_replace( '#items_count', $appointment->getQuantity(), $this->admin_email_message );
			        
					// extra data
					$extra_data = $appointment->getExtra();
					$extra_data = str_replace( '###', '<br />', $extra_data);
					$this->admin_email_message = str_replace( '#customer_custom', $extra_data, $this->admin_email_message );



					$headers = 'From: ' . $this->from_name . ' <' . $this->from_email .'>' . "\r\n";
			     
					add_filter( 'wp_mail_content_type', array( $this, 'set_email_content_type' ) );
			    	wp_mail( $service->getEmail(), $this->admin_email_subject, $this->admin_email_message, $headers );	
 					remove_filter( 'wp_mail_content_type', array( $this, 'set_email_content_type' ) );
 
			    }
 
		    break;
		     
		}
 	}
 }