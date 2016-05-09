<!-- Webba Booking backend options page template --> 
<?php
    // check if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
    $bh = WBK_Date_Time_Utils::renderBHForm();
?>
<div id="dialog-confirm-delete" title="<?php echo __( 'Confirm action', 'wbk') ?>" >
    <p> 
        <?php echo __( 'These services will be permanently deleted and cannot be recovered. Continue?', 'wbk' ) ?>
    </p>
</div>
<div id="dialog-interval-error" title="<?php echo __( 'Error', 'wbk') ?>" >
    <p> 
        <?php echo __( 'Unable to add the gap.', 'wbk' ) ?>
    </p>
</div>
<div id="dialog-interval-error-2" title="<?php echo __( 'Error', 'wbk') ?>" >
    <p> 
        <?php echo __( 'Unable to set the gap.', 'wbk' ) ?>
    </p>
</div>
<div id="dialog-add-service">
    <div id="service_dialog_left">
         
            <label for="wbk-service-name"><?php echo __( 'Name', 'wbk') ?> <span class="input-error" id="error-name"></span></label><br/>
            <input id="wbk-service-name" class="wbk-long-input" type="text" value="" /><br/>
            <input id="wbk-service-prev-name" type="hidden" value="" /> 
       
            <label for="wbk-service-desc"><?php echo __( 'Description', 'wbk') ?></label><br/> 
            <input id="wbk-service-desc" class="wbk-long-input"  type="text"  /><br/>
        
            <label for="wbk-service-email"><?php echo __( 'Email', 'wbk') ?></label><br/> 
            <input id="wbk-service-email" class="wbk-long-input" type="text" value="" /><br/>
            
            <label for="wbk-service-quantity"><?php echo __( 'Maximum booking count per time slot', 'wbk') ?></label><br/> 
            <input id="wbk-service-quantity" class="wbk-long-input" type="text" value="1" /><br/>
            
            <label for="wbk-service-duration"><?php echo __( 'Duration (in minutes)', 'wbk') ?></label><br/>          
            <input  id="wbk-service-duration" type="text" value="" class="wbk-long-input"><br/>
            <label for="wbk-service-interval"><?php echo __( 'Gap (in minutes)', 'wbk') ?></label><br/>
            <input id="wbk-service-interval" class="wbk-long-input" type="text"><br/>
            <label for="wbk-service-step"><?php echo __( 'Step', 'wbk') ?></label><br/>
            <input id="wbk-service-step" class="wbk-long-input" type="text" value="" ><br/>
            <label for="wbk-service-users"><?php echo __( 'Available to users', 'wbk') ?></label><br/>
            <?php
                $arr_users_admin = WBK_Db_Utils::getAdminUsers();           
                $arr_users_not_admin = WBK_Db_Utils::getNotAdminUsers();
                $html = '<select name="wbk-user-list" class="wbk-user-list" id="wbk-user-list" multiple>';
                foreach ( $arr_users_admin[0] as $user ) {
                    $user_info = get_userdata( $user[0] );
                    $html .=  '<option value="' . $user[0] . '" disabled>' . $user_info->user_login . __( ' (has access)', 'wbk' ) . '</option>';
                   
                }

                if ( isset( $arr_users_not_admin[0] ) ) {
                    foreach ( $arr_users_not_admin[0] as $user ) {
                        $user_info = get_userdata( $user[0] );
                        $html .=  '<option value="' . $user[0] . '">' . $user_info->user_login . '</option>';
                       
                    }
                }                    
                $html .= '</select>';
                echo $html;
            ?>


            <label for="wbk-form-list"><?php  echo __( 'Select form', 'wbk') ?></label><br/> 
            <?php
                $html =  '<select name="wbk-form-list" class="wbk-long-input" id="wbk-form-list" >';
                $html .= '<option value="0">' . __( 'default form', 'wbk' ) . '</option>';

                $arr_forms =  WBK_Db_Utils::getCF7Forms();

                if ( count( $arr_forms ) > 0 ) {
                    foreach ($arr_forms as $form ) {
                        $html .=  '<option value="' . $form->id . '">' . $form->name . '</option>';
                    }
                }
                $html .= '</select>';
                echo $html;
            ?>
    </div>
    <div id="service_dialog_right">
        <?php           
            echo $bh;
        ?>
    </div>
    <div style="clear:both"></div>
</div>
<div class="wrap">
 
	<h2 class="wbk_panel_title"><?php  echo __( 'Services', 'wbk' ); ?></h2>
 
    <div class="row">
 
        <table  class="service_table"  >
            <thead>
                <tr class="table_title">
                        <th>
                       
                        </th>       
                        <th class="table_title">
                            <?php echo __( 'Name', 'wbk' ) ?>
                        </th>       
                        <th class="table_title">
                            <?php echo __( 'Description', 'wbk' ) ?>
                        </th>       
                        <th class="table_title">
                            <?php echo __( 'Email', 'wbk' ) ?>
                        </th>       
                        <th class="table_title">
                            <?php echo __( 'Duration ', 'wbk' ) ?>
                        </th>  
                        <th class="table_title">
                            <?php echo __( 'Gap', 'wbk' ) ?>
                        </th> 
                        <th class="table_title">
                            <?php echo __( 'Step', 'wbk' ) ?>
                        </th>       
                        <th class="table_title">
                            <?php echo __( 'Items', 'wbk' ) ?>
                        </th>                   
                        <th class="table_title">
                            <?php echo __( 'Business hours', 'wbk' ) ?>
                        </th>
                        <th class="table_title">
                            <?php echo __( 'Users', 'wbk' ) ?>
                        </th> 
                          
                </tr>
            </thead>        
            <tbody>
       
        <?php 
            // get ids of services
            $ids = WBK_Db_Utils::getServices();
            foreach ( $ids as $id ) {
                $service = new WBK_Service();
                if ( !$service->setId( $id ) ){
                    continue;
                }
                
                if ( !$service->load() ){
                    continue;
                }
        ?>
            <tr id="row_<?php echo $service->getId(); ?>">
                    
                    <td>
                        <input type="checkbox" class="chk_row" id="chk_row_<?php echo $service->getId(); ?>" />
                    </td>       
                    <td>
                        <div id="value_name_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getName(); ?></div>
                         
                    </td>       
                    <td>
                        <div id="value_description_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getDescription(); ?></div>                                            
                    </td>       
                    <td>
                        <div id="value_email_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getEmail(); ?></div>                            
                    </td>       
                    <td>                
                        <div id="value_duration_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getDuration() . ' ' . __( 'minutes', 'wbk' ) ?></div>
                     </td>
                    <td>                
                        <div id="value_interval_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getInterval() . ' ' . __( 'minutes', 'wbk' ) ?></div>
                    </td>
                    <td>                
                        <div id="value_step_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getStep() . ' ' . __( 'minutes', 'wbk' ) ?></div>
                    </td>    
                    <td>                
                        <div id="value_quantity_<?php echo $service->getId(); ?>" class="value_container"><?php echo $service->getQuantity() ?></div>
                    </td>                                    
                    <td>
                        <div class="wbk-font-10" id="value_business_hours_<?php echo $service->getId(); ?>">
                            <?php
                                echo  WBK_Date_Time_Utils::renderBHCell( $service->getBusinessHours() );                           
                            ?>
                        </div>
                    </td>
                    <td>                
                        <div id="value_users_<?php echo $service->getId(); ?>" class="value_container">
                            <?php   
                                
                                $arr_users = explode( ';', $service->getUsers() );
                                $usernames = '';
                             
                                foreach ( $arr_users as $user ) {
                                    if ( $user == '' ) {
                                        continue;
                                    }
                                         
                                    $user_info = get_userdata( $user[0] );
                                   
                                    $usernames .=  $user_info->user_login.', ';
                                }
                                if ( $usernames != '' ) {
                                    $usernames = rtrim( $usernames, ', ' );
                                }
                                
                                echo $usernames;                                 
   
                            ?>
                        </div>
                    </td>
                   
            </tr>
        <?php
            }
         ?>
            </tbody>
        </table>
    </div>
    <a class="button" href="javascript:add_service()"><?php echo __( 'Add service', 'wbk' );  ?></a>
    <a class="button" id="btn_service_delete" disabled="disabled" href="javascript:delete_service()" ><?php echo __( 'Delete service', 'wbk' );  ?></a>
    <a class="button" id="btn_service_edit"  disabled="disabled" href="javascript:edit_service()" ><?php echo __( 'Edit service', 'wbk' );  ?></a>
                                       
</div>
