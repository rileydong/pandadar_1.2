<?php
//WBK stat class

// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
class WBK_Admin_Notices {

	public static function preEnd(){
		return 	 '<div class="updated error">
					 <p>You are using free version of Webba Booking, ' . WBK_Stat::appLeft() . ' appointments left. Please update to <a target="_blank" href="http://webba-booking.com/">Premium version</a>.</p>    				
				  </div>';
	}	 
	public static function end(){
		return 	 '<div class="updated error">
					 <p>Free version of Webba Booking is expired, ' . WBK_Stat::appLeft() . ' appointments left. Please update to <a target="_blank" href="http://webba-booking.com/">Premium version</a>.</p>    				
				  </div>';
	}	
}
?>