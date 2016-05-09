<?php
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
class WBK_Db_Utils {
	// create tables
	static function createTables() {
		global $wpdb;
		 
		// service table
	   	$wpdb->query(
	        "CREATE TABLE IF NOT EXISTS wbk_services (
	            id int unsigned NOT NULL auto_increment PRIMARY KEY,
	            name varchar(128) default '',
	            email varchar(128) default '',
	            description varchar(255) default '',
	            business_hours varchar(255) default '',
	            users varchar(512) default '',
	            duration int unsigned NOT NULL,	            
	            step int unsigned NOT NULL,
	            interval_between int unsigned NOT NULL,
				form int unsigned NOT NULL default 0,
				quantity int unsigned NOT NULL default 1,
	            UNIQUE KEY id (id)
	       		) 
		        DEFAULT CHARACTER SET = utf8
		        COLLATE = utf8_general_ci"
	    );
		// custom on/off days
	   	$wpdb->query(
	        "CREATE TABLE IF NOT EXISTS wbk_days_on_off (
	            id int unsigned NOT NULL auto_increment PRIMARY KEY,
	            service_id int unsigned NOT NULL,
	            day int unsigned NOT NULL,
	            status int unsigned NOT NULL,
	            UNIQUE KEY id (id)
	        ) 
	        DEFAULT CHARACTER SET = utf8
	        COLLATE = utf8_general_ci"
		);
	   	// custom locked timeslots
	   	$wpdb->query(
	        "CREATE TABLE IF NOT EXISTS wbk_locked_time_slots (
	            id int unsigned NOT NULL auto_increment PRIMARY KEY,
	            service_id int unsigned NOT NULL,
	            time int unsigned NOT NULL,
	            UNIQUE KEY id (id)
	        ) 
	        DEFAULT CHARACTER SET = utf8
	        COLLATE = utf8_general_ci"
		);
		// appointments table
	   	$wpdb->query(
	        "CREATE TABLE IF NOT EXISTS wbk_appointments (
	            id int unsigned NOT NULL auto_increment PRIMARY KEY,
	            name varchar(128) default '',
	            email varchar(128) default '',
	            phone varchar(128) default '',
	            description varchar(255) default '',
	            extra varchar(1000) default '',
	            attachment varchar(255) default '',
	           	service_id int unsigned NOT NULL,
				time int unsigned NOT NULL,
				day int unsigned NOT NULL,
				duration int unsigned NOT NULL,
				quantity int unsigned NOT NULL default 1,
	            UNIQUE KEY id (id)
	        ) 
		        DEFAULT CHARACTER SET = utf8
		        COLLATE = utf8_general_ci"
	    );
	}
	 
	// drop tables
	static function dropTables() {
		global $wpdb;
		$wpdb->query( 'DROP TABLE IF EXISTS wbk_services' );
	  	$wpdb->query( 'DROP TABLE IF EXISTS wbk_appointments' );
	  	$wpdb->query( 'DROP TABLE IF EXISTS wbk_locked_time_slots' );
		$wpdb->query( 'DROP TABLE IF EXISTS wbk_days_on_off' );
	   		 
	}

	// add fields used since 1.2.0
	static function update_1_2_0(){
		global $wpdb; 
		$table_name = 'wbk_services';
		$found = false;
		foreach ( $wpdb->get_col( "DESC " . $table_name, 0 ) as $column_name ) {
			if ( $column_name == 'form' ){
				$found = true;
			}
		}
		if ( !$found ){
			 $wpdb->query("ALTER TABLE `wbk_services` ADD `form` int unsigned NOT NULL default 0");
		}
 	}


	// add fields used since 1.3.0
	static function update_1_3_0(){
		global $wpdb; 

		$table_name = 'wbk_services';
		$found = false;
		foreach ( $wpdb->get_col( "DESC " . $table_name, 0 ) as $column_name ) {
			if ( $column_name == 'quantity' ){
				$found = true;
			}
		}
		if ( !$found ){
			 $wpdb->query("ALTER TABLE `wbk_services` ADD `quantity` int unsigned NOT NULL default 1");
		}

		$table_name = 'wbk_appointments';
		$found = false;
		foreach ( $wpdb->get_col( "DESC " . $table_name, 0 ) as $column_name ) {
			if ( $column_name == 'quantity' ){
				$found = true;
			}
		}
		if ( !$found ){
			 $wpdb->query("ALTER TABLE `wbk_appointments` ADD `quantity` int unsigned NOT NULL default 1");
		}
 	}

	// get services  
	static function getServices() {
	 	global $wpdb;
		$result = $wpdb->get_col( " SELECT id FROM wbk_services " );
		return $result;
	} 
	// get not-admin users
	static function getNotAdminUsers() {
		$arr_users = array();
		$arr_temp = get_users( array( 'role' => 'editor', 'fields' => 'user_login' ) );
		if ( count( $arr_temp ) > 0 ) {
			array_push( $arr_users, $arr_temp );  
	
		}
		$arr_temp = get_users( array( 'role' => 'contributor', 'fields' => 'user_login' ) );
		if ( count( $arr_temp ) > 0 ) {
			array_push( $arr_users, $arr_temp );  
	
		}
		
		$arr_temp =get_users( array( 'role' => 'author', 'fields' => 'user_login' ) );
		if ( count( $arr_temp ) > 0 ) {
			array_push( $arr_users, $arr_temp );  
	
		}
	 
	 	return $arr_users;
	}	
	// get not-admin users
	static function getAdminUsers() {
		$arr_users = array();
		
		array_push( $arr_users, get_users( array( 'role' => 'administrator', 'fields' => 'user_login' ) ) );  
	
	 	return $arr_users;
	}	
	// check if service name is free
	static function isServiceNameFree( $value ) {
		global $wpdb;
		$count = $wpdb->get_var( $wpdb->prepare( " SELECT COUNT(*) FROM wbk_services WHERE name = %s ", $value ) );
		if ( $count > 0 ){
			return false;
		
		} else {
			return true;
		}
	}
	// get CF7 forms
	static function getCF7Forms() {
		$args = array( 'post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1 );
		$result = array();
		if( $cf7Forms = get_posts( $args ) ) {
			foreach( $cf7Forms as $cf7Form ) {
				$form = new stdClass();
				$form ->name = $cf7Form->post_title;
				$form->id = $cf7Form->ID;

				array_push( $result, $form );
			}
		}	
		return $result;	
	}

 


}
?>