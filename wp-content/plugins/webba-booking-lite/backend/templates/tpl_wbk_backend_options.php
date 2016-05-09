<!-- Webba Booking backend options page template --> 
<?php
    // check if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;
?>
 
<div class="wrap">
	<h2 class="wbk_panel_title"><?php  echo 'Webba Booking ' . __( 'Settings', 'wbk' ); ?></h2>
 	
 	<?php
        if( function_exists( 'settings_errors' ) ) {
            settings_errors(); 
        }
    ?>
    <form method="post" action="options.php">
    
    <?php
    // output settings tabs 
    settings_fields( 'wbk_options' );
   // settings_fields( 'wbk_schedule_settings_section' );
    global $wp_settings_sections, $wp_settings_fields;
    $page = 'wbk-options';
    if ( !isset( $wp_settings_sections[$page] ) ){
        return;      
    } 
  
    echo '<div id="tabs">';
    
    echo '<ul>';
    foreach( (array)$wp_settings_sections[$page] as $section ) {
        if( !isset( $section['title'] ) )
            continue;
        printf( '<li><a href="#%1$s">%2$s</a></li>', $section['id'], $section['title']  );
    }
    echo '</ul>';
    foreach( (array)$wp_settings_sections[$page] as $section ) {
        printf( '<div id="%1$s" >', $section['id'] );
        if( !isset($section['title']) ){
            continue;
        }
        
        if( $section['callback'] ) {
            call_user_func($section['callback'], $section);
        }
        if( !isset($wp_settings_fields) || !isset($wp_settings_fields[$page]) || !isset($wp_settings_fields[$page][$section['id']] ) ) {
            continue;
        }
        echo '<table class="form-table">';
        do_settings_fields( $page, $section['id'] );
        
        echo '</table>';
        echo '</div>';
    }
    echo '</div>';
    submit_button(); 
    
    ?>
  
    </form> 
</div>
