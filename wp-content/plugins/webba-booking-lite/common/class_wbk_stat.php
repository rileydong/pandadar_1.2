<?php
//WBK stat class
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
class WBK_Stat {
	const APP_TOTAL = 30;
	const APP_MESSAGE = 3;
	public static function appStat(){
		$stat = intval( get_option( 'wbk_stat' ) );
		if ( $stat >= self::APP_MESSAGE && $stat < self::APP_TOTAL ){
			return 1;
		}
		if ( $stat >= 5 ) {
			return 2;
		}
		return 0;
	}
	public static function appLeft(){
		$stat = intval( get_option( 'wbk_stat' ) );
		$app_left = self::APP_TOTAL - $stat;
		return $app_left;	
	}	 

	public static function appPush(){
		$stat = intval( get_option( 'wbk_stat' ) );
		$stat++;
		update_option( 'wbk_stat', $stat );		 	
	}	 
}
?>