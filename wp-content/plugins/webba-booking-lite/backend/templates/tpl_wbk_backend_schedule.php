<!-- Webba Booking backend schedule page template --> 
<?php
	// check if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;
	require_once  dirname(__FILE__).'/../../common/class_wbk_db_utils.php';
	require_once  dirname(__FILE__).'/../../common/class_wbk_service.php';	 
?>
<div id="dialog-appointment" >
   	<div id="appointment_dialog_content">
   		<div id="appointment_dialog_left">
	   		<label for="wbk-appointment-time"><?php echo __( 'Time', 'wbk') ?> <span class="input-error" id="error-name"></span></label><br/>
            <input id="wbk-appointment-time" class="wbk-long-input" type="text" value="" /><br/>
            <input id="wbk-appointment-timestamp" type="hidden" value="" /> 	
			<label for="wbk-appointment-name"><?php echo __( 'Name', 'wbk') ?> <span class="input-error" id="error-name"></span></label><br/>
            <input id="wbk-appointment-name" class="wbk-long-input" type="text" value="" /><br/>           
            <label for="wbk-appointment-email"><?php echo __( 'Email', 'wbk') ?></label><br/> 
            <input id="wbk-appointment-email" class="wbk-long-input" type="text" value="" /><br/>
            <label for="wbk-appointment-phone"><?php echo __( 'Phone', 'wbk') ?></label><br/> 
            <input id="wbk-appointment-phone" class="wbk-long-input" type="text" value="" /><br/>
            <label id="wbk-appointment-quantity-label" for="wbk-appointment-quantity"><?php echo __( 'Items count', 'wbk') ?></label><br/> 
            <input id="wbk-appointment-quantity" class="wbk-long-input" type="text" value="1" /><br/>
            <input id="wbk-appointment-quantity-max"  type="hidden" value="" /><br/>

        </div>
        <div id="appointment_dialog_right">
        	<label for="wbk-appointment-extra"><?php echo __( 'Custom data', 'wbk') ?></label><br/> 
        	<textarea id="wbk-appointment-extra" rows="7" class="wbk-long-input" readonly="readonly"></textarea>
			<label id="wbk-quantity-label" for="wbk-appointment-desc"><?php echo __( 'Comment', 'wbk') ?></label><br/> 
            <textarea id="wbk-appointment-desc" rows="5" class="wbk-long-input">
            </textarea>
        </div>
   	</div>
</div>
<div class="wrap">
	<h2 class="wbk_panel_title"><?php  echo __( 'Schedule', 'wbk' ); ?></h2>
	<?php
  
		$html = '<div class="row">';
	 		$arrIds = WBK_Db_Utils::getServices();
	 		if ( count( $arrIds ) < 1 ) {
	 			
	 			$html .= __( 'Create at least one service. ', 'wbk' );
	 		
	 		} else {
				$html .= '<p>' . __( 'Click to display the service schedule:', 'wbk' ) . '</p>';
		 		foreach ( $arrIds as $id ) {
				 	 
					// check access
					if ( !in_array( 'administrator', $current_user->roles ) ) {
						if ( !WBK_Validator::checkAccessToService( $id ) ) {
 							
 							continue;
						}    	
					}
		 			$service = new WBK_Service();
		 			if ( !$service->setId( $id ) ) {  
		 				continue;
		 			}
		 			if ( !$service->load() ) {  
		 				 
		 				continue;
		 			}
		 			$html .= '<a class="button ml5" id="load_schedule_'. $id .'" >' . $service->getName() . '</a>';
		 		}
		 	}
		$html .= '</div>';
		echo $html;
	?>
	<div id="days_container">
	</div>
	<div id="control_container">
	</div>
</div>
