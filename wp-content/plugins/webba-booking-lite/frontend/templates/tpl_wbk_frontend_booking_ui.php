<?php
    // check if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="wbk-row">
	<div class="wbk-col-12-12" id="wbk-service-container">
	
		 <?php 
	
		 	if ( $data[0] <> 0 ){
		 		echo '<input type="hidden" id="wbk-service-id" value="' . $data[0] . '" />';	 	 		
		 	} else {


		 		if ( get_option( 'wbk_mode', 'extended' ) == 'extended' ) {
			 		echo  '<span class="wbk-input-label">' . get_option( 'wbk_service_label', 'Select service' ) . '</span>';
		 		
		 		} else {
			 		echo '<span class="wbk-input-label">' . get_option( 'wbk_service_label', 'Select service' ) . '</span>';
		 		}

		 		echo '<select class="wbk-input wbk-width-100" id="wbk-service-id">'; 
		 		echo '<option value="0" selected="selected">' . __( 'select...', 'wbk' ) . '</option>';
		 		$arrIds = WBK_Db_Utils::getServices();
		 		foreach ( $arrIds as $id ) {
		 			 
		 			$service = new WBK_Service();
		 			if ( !$service->setId( $id ) ) {  
		 				continue;
		 			}
		 			if ( !$service->load() ) {  
		 				 
		 				continue;
		 			}
		 			echo '<option value="' . $service->getId() . '"" >' . $service->getName() . '</option>';
		 		}
		 		echo '</select>';
		 	}
		 ?>
	</div>
</div>
<div class="wbk-row">
	<div class="wbk-col-12-12" id="wbk-date-container"></div>
</div>
<div class="wbk-row" id="timeselect_row">
	<div class="wbk-col-12-12" id="wbk-time-container"></div>
</div>
<div class="wbk-row">
	<div class="wbk-col-12-12" id="wbk-slots-container"></div>
</div>
<div class="wbk-row">
	<div class="wbk-col-12-12" id="wbk-booking-form-container"></div>
</div>
<div class="wbk-row">
	<div class="wbk-col-12-12" id="wbk-booking-done"></div>
</div>
