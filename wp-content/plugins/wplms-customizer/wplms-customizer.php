<?php
/*
Plugin Name: WPLMS Customizer Plugin
Plugin URI: http://www.Vibethemes.com
Description: A simple WordPress plugin to modify WPLMS template
Version: 1.0
Author: VibeThemes
Author URI: http://www.vibethemes.com
License: GPL2
*/
/*
Copyright 2014  VibeThemes  (email : vibethemes@gmail.com)

wplms_customizer program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

wplms_customizer program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with wplms_customizer program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


include_once 'classes/customizer_class.php';



if(class_exists('WPLMS_Customizer_Plugin_Class'))
{	
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('WPLMS_Customizer_Plugin_Class', 'activate'));
    register_deactivation_hook(__FILE__, array('WPLMS_Customizer_Plugin_Class', 'deactivate'));

    // instantiate the plugin class
    $wplms_customizer = new WPLMS_Customizer_Plugin_Class();
}

function wplms_customizer_enqueue_scripts(){
    wp_enqueue_style( 'wplms-customizer-css', plugins_url( 'css/custom.css' , __FILE__ ));
    wp_enqueue_script( 'wplms-customizer-js', plugins_url( 'js/custom.js' , __FILE__ ));
}

add_action('wp_head','wplms_customizer_enqueue_scripts');

add_action('wp_enqueue_scripts','wplms_customizer_custom_cssjs');

/**
 * Objective: Register & Enqueue your Custom scripts
 * Developer notes:
 * Hook you custom scripts required for the plugin here.
 */
function wplms_customizer_custom_cssjs(){
    wp_enqueue_style( 'wplms-customizer-css', plugins_url( 'css/custom.css' , __FILE__ ));
    wp_enqueue_script( 'wplms-customizer-js', plugins_url( 'js/custom.js' , __FILE__ ));
}
/*
 remove section /tab from single course
*/
add_filter('wplms_course_nav_menu','wplms_course_remove_nav_section',100);

function wplms_course_remove_nav_section($sections){
unset($sections['events']);
unset($sections['news']);
unset($sections['activity']);
unset($sections['home']);

return $sections;
}
/**
 * bp_remove_nav_tab is to remove activity tab from user profile. 
 */
function bp_remove_nav_tabs() {
    global $bp;
    bp_core_remove_nav_item( 'activity' );
    bp_core_remove_nav_item( 'forums' );
    bp_core_remove_nav_item( 'buddydrive' );
    bp_core_remove_nav_item( 'my-account');
    bp_core_remove_nav_item( 'membership-account');
}
add_action( 'bp_setup_nav', 'bp_remove_nav_tabs', 15 );


/*allow active users to see units which they have completed in course .*/
add_filter('wplms_curriculum_course_link','enable_course_students_view_units_curriculum');
  
 
function enable_course_students_view_units_curriculum($enable){
  
$user_id = get_current_user_id();
$course_id = get_the_ID();
  
if(wplms_user_course_active_check($user_id,$course_id))
return 1;
  
return $enable;
}


add_filter('wplms_direct_access_tounit','enable_access_tostudents',10,2);
function enable_access_tostudents($flag,$post){
    $user_id = get_current_user_id();
    $check = get_user_meta($user_id,$post->ID,true);
    if(!empty($check)){
        return 0;
    }
   return $flag;
}

/* allow access to all units for the students who have purchased the course*/
function enable_course_students_view_units_curriculum1226($enable){
  
$user_id = get_current_user_id();
$course_id = get_the_ID();
  
if(wplms_user_course_active_check($user_id,$course_id))
return 1;
  
return $enable;
}

add_filter('wplms_direct_access_tounit','enable_access_tostudents1226',10,2);
function enable_access_tostudents1226($flag,$post){
    global $wpdb;
    $user_id = get_current_user_id();
    $course_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key= 'vibe_course_curriculum' AND meta_value LIKE %s LIMIT 1;", "%{$uid}%" ) );
    $check = wplms_user_course_active_check($user_id,$course_id);
    if(!empty($check)){
        return 0;
    }
   return $flag;
}




/*Remove Price Dropdown from purchased course*/

function customwplms_course_credits_array7($credits_html,$course_id){
 
if(is_user_logged_in()) {
    $user_id = get_current_user_id();
    $course_user = bp_course_get_user_course_status($user_id,$course_id);
    if(wplms_user_course_active_check($user_id,$course_id)){
        switch($course_user){
        case 1:
          $course_status =  __('START COURSE','vibe'); 
        break;
        case 2:  
            $course_status = __('CONTINUE COURSE','vibe');
        break;
        case 3:
            $course_status = __('COURSE UNDER EVALUATION','vibe');
        break;
        case 4:
          $finished_course_access = vibe_get_option('finished_course_access');
          if(isset($finished_course_access) && $finished_course_access){
              $course_status = __('FINISHED COURSE','vibe');
             
          }else{
              $course_status = __('COURSE FINISHED','vibe');
          }
        break;
        default:
         $course_status =  __('COURSE ENABLED','vibe').'<span>'.__('CONTACT ADMIN TO ENABLE','vibe');
        break;
      }  
      $credits_html=$course_status;  
    }
 
     
}
 
return $credits_html;
}

/*Redirect to My Account page after checkout*/
add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' ); 
function wc_custom_redirect_after_purchase() {
  global $wp;
  
  if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
    wp_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ) );
    exit;
  }
}
