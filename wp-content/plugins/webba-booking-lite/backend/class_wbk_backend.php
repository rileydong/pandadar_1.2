<?php
// check if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
// include abstract component class
include 'class_wbk_backend_component.php';
// include backend classes from /classes folder
foreach ( glob(dirname(__FILE__).'/classes/*.php') as $filename ) {
	try {
    
        include $filename;
    
    } catch (Exception $e) {
    
    	throw $e;
    }
}
 
 
// define main backend class
class WBK_Backend {
	// general backend title
	const ADMIN_TITLE = 'Webba Booking';
	// 	available components of backend (based on files in classes folder)
	private $components;
	public function __construct() {
		 
		add_action( 'init', array( $this,'inline_upload_enquene' ) );
		
		//add action for wp menu construction
		add_action( 'admin_menu', array( $this, 'createAdminMenu' ) );	
		//set components of backend
		$this->components = array();
 
		foreach ( glob(dirname(__FILE__).'/classes/*.php') as $filename ) {
			$component_name = str_replace ('class_', '', basename( $filename, ".php" ) );
     		
     		$this->components[$component_name] = new $component_name();
			 
		}

		add_action( 'admin_notices', array( $this, 'admin_notices' ) );

	
	}
	public	function settings_updated() {
		if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ) {
	 		  // complie css file        
	        $path_to_css =   dirname( __FILE__ ) .'/../frontend/css/wbk-frontend-custom.css';
	        $css_file = fopen( $path_to_css, 'w' ) or die( 'Unable to create css file ');
	        $css_content = "/* Webba Booking custom css file */".PHP_EOL;     
	        $css_content .= ".wbk-button{".PHP_EOL ;
	        $css_content .= "background-color:" .  get_option( 'wbk_button_background', '#186762' ) . " !important;".PHP_EOL ;
	        $css_content .= "color:" .  get_option( 'wbk_button_color', '#ffffff' ) . "  !important;" .PHP_EOL ; 
	        $css_content .= "}".PHP_EOL;
	        fwrite( $css_file, $css_content );
	        fclose( $css_file );
 		}
 	}

	public function inline_upload_enquene(){
		
		// add common css 
		if ( isset( $_GET[ 'page' ] ) && ( $_GET[ 'page' ] == 'wbk-options' || $_GET[ 'page' ] == 'wbk-schedule' || $_GET[ 'page' ] == 'wbk-services'  ||  $_GET[ 'page' ] == 'wbk-forms'  ) ) { 
		 	wp_enqueue_style( 'wbk-backend-style', plugins_url( '/css/wbk-backend.css', __FILE__ ) );
		}
		// edit post/page scripts
		if ( $this->is_edit_page() ) {
 
			wp_enqueue_script( 'wbk-service-dialog', plugins_url( '/js/wbk-service-dialog.js', __FILE__ ), array( 'jquery-ui-core', 'jquery-ui-dialog' ) ); 

            $translation_array = array( 
                'cancel' => __( 'Cancel', 'wbk' ),   
                'add' => __( 'Add', 'wbk' ),   
				'formtitle' =>	__( 'Add Webba Booking form', 'wbk' )
            ); 
            wp_localize_script( 'wbk-service-dialog', 'wbkl10n', $translation_array );

			wp_enqueue_style( 'wbk-shortcode-dialog-style', plugins_url( '/css/wbk-shortcode-dialog.css', __FILE__ ) );
	 		
	 		wp_enqueue_style ( 'wp-jquery-ui-dialog' );
			// add shortcode dialog to admion
			add_action( 'admin_footer', array( $this, 'createServiceDialog' ) );
			// add shortcode button
			add_action( 'media_buttons', array( $this, 'createShortcodeButton' ));
 
		}	
	}
	public function createAdminMenu() {
 
        global $current_user;
        // check if current user has role of admin
        if ( in_array( 'administrator', $current_user->roles ) || WBK_Validator::checkAccessToSchedule() ){
            if ( !empty($this->components) ){
            	 
	        	add_menu_page( self::ADMIN_TITLE, self::ADMIN_TITLE, 'read', 'wbk-main', array( $this->components['wbk_backend_schedule'], 'render'), plugins_url( 'images/webba-booking.png', __FILE__) );
	        	foreach ( $this->components as  $component ) {
		        	$component_title = $component->getTitle();
	  
		        	$hook = add_submenu_page( 'wbk-main', $component->getTitle(), $component->getTitle(), $component->getCapability(), $component->getName(), array( $component, 'render' ) );
	        	 	
	        	 	if (  $component->getName() == 'wbk-options' ){
	        	    add_action( 'load-'.$hook, array( $this, 'settings_updated' ) );
	        		
	        		}
	        	}
	        	global $submenu;
                unset( $submenu['wbk-main'][0] );      	 
        	}
        	 
        }

	}
	public function createServiceDialog() {
		$service_list = '<select class="wbk-input wbk-width-100" id="wbk-service-id">'; 
		$service_list .= '<option value="0" selected="selected">' . __( 'All services', 'wbk' ) . '</option>';
		$arrIds = WBK_Db_Utils::getServices();
		foreach ( $arrIds as $id ) {
		 			 
			$service = new WBK_Service();
			if ( !$service->setId( $id ) ) {  
				continue;
			}
		 	if ( !$service->load() ) {  
		 				 
		 		continue;
			}
			$service_list .=  '<option value="' . $service->getId() . '"" >' . $service->getName() . '</option>';
		}
		$service_list .=  '</select>';		
		$html = '<div id="wbk-service-dialog" >
				   	<div id="wbk-service-dialog-content">
						<label for="wbk-service">' . __( 'Select service', 'wbk' ) . '<span class="input-error" id="error-name"></span></label><br/>' .
				             
				       $service_list         
 
				   	. '</div>
				</div>';
		echo $html;
	}
	public function createShortcodeButton() {
		echo '<a href="#" class = "button" id = "wbk-add-shortcode" title = "Webba Booking form">' . __( 'Webba Booking form', 'wbk' ) . '</a>';
	}
	protected function is_edit_page($new_edit = null){
	    
	    global $pagenow;
	    
	    //make sure we are on the backend
	    if ( !is_admin() ) {
	    	return false;
	    }
	    if ( $new_edit == 'edit' ) {
	        return in_array( $pagenow, array( 'post.php',  ) );
	    } elseif ( $new_edit == 'new' ) {
	        return in_array( $pagenow, array( 'post-new.php' ) );	    	
	    } 
	    else {  
	        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
		}
	}


	public function admin_notices() {
		if ( WBK_Stat::appStat() == 1 ){
	        echo  WBK_Admin_Notices::preEnd();
		} elseif ( WBK_Stat::appStat() == 2 ) {
	        echo  WBK_Admin_Notices::end();
		}
	}
}
?>