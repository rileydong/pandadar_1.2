<?php
/**
 * Schedule specific functions.
 */

/**
 * Generates the day table for admin use.
 * 
 * @param int $day: the weekday (sunday = 0, monday = 1)
 */
function wcs3_render_day_table( $day ) {
    $day_data = wcs3_get_day_schedule( $day );
    
    $output = '<div class="wcs3-day-content-wrapper">';
    
    if ( $day_data ) {
        $output .= '<table id="wcs3-admin-table-day-' . $day . '" class="widefat wcs3-admin-schedule-table">';
        $output .= '<tr>
            <th>' . __( 'Class', 'wcs3' ) . '</th>
            <th>' . __( 'Instructor', 'wcs3' ) . '</th>
            <th>' . __( 'Location', 'wcs3' ) . '</th>
            <th>' . __( 'Start', 'wcs3' ) . '</th>
            <th>' . __( 'End', 'wcs3' ) . '</th>
            <th>' . __( 'Visibility', 'wcs3') . '</th>
            <th>' . __( 'Delete', 'wcs3') . '</th>
            <th>' . __( 'Edit', 'wcs3') . '</th>
        </tr>';
        
        foreach ( $day_data as $class ) {
        	$output .= '<tr>';
        	foreach ( $class as $key => $value ) {
        	    if ( $key != 'id' ) {
        	        $output .= "<td>$value</td>";
        	    }
        		else {
        		    $output .= '<td><a href="#delete" class="wcs3-delete-button wcs3-action-button-day-' . $day . '" 
        		                id="delete-entry-' . $value . '">' . __( 'delete', 'wcs3') . '</a></td>';
        		    $output .=  '<td><a href="#" class="wcs3-edit-button wcs3-action-button-day-' . $day . '" 
        		                id="edit-entry-' . $value . '">' . __( 'edit', 'wcs3' ) . '</a>';  
        		}
        	}
        
        	$output .= '</tr>';
        }
        
        
        $output .= '</table>';
    }
    else {
        $output .= '<div class="wcs3-no-classes"><p>' . __( 'No classes', 'wcs3' ) . '</p></div>';
    }
   
    $output .= '</div>'; // day-content-wrapper
    return $output;
}

/**
 * Returns the database data relevant for the provided weekday.
 * 
 * @param int $day: the weekday (sunday = 0, monday = 1)
 */
function wcs3_get_day_schedule( $day, $location_id = NULL, $limit = NULL ) {
    global $wpdb;
    
    $wcs3_settings = wcs3_load_settings();
    
    $format = ( $wcs3_settings['24_hour_mode'] == 'yes' ) ? 'G:i' : 'g:i a';
        
    $table = wcs3_get_table_name();
    $results = array();
    
    $query = "SELECT * FROM $table WHERE weekday = %d ";
    $query_arr = array( $day );
    
    if ( $location_id !== NULL ) {
        $query .= "AND location_id = %d ";
        $query_arr[] = $location_id;
    }
    
    $query .= "ORDER BY start_hour ";
    
    if ( $limit !== NULL ) {
        $query .= "LIMIT %d";
        $query_arr[] = $limit;
    }
    
    $r = $wpdb->get_results( $wpdb->prepare( $query, $query_arr ) );

    $timezone = wcs3_get_system_timezone();
    $tz = new DateTimeZone( $timezone );
    
    if ( !empty( $r ) ) {
        foreach ( $r as $entry ) {

            $start_utc =  $entry->start_hour;
            $start_dt = new DateTime( WCS3_BASE_DATE . ' ' . $start_utc, new DateTimeZone('UTC') );
            $start_dt->setTimeZone( $tz );

            $end_utc = $entry->end_hour;
            $end_dt = new DateTime( WCS3_BASE_DATE . ' ' . $end_utc, new DateTimeZone('UTC') );
            $end_dt->setTimeZone( $tz );

            $start_hour = $start_dt->format('H:i').':00';
            $end_hour = $end_dt->format('H:i').':00';

            $results[] = array(
                'class' => get_post( $entry->class_id )->post_title,
                'instructor' => get_post( $entry->instructor_id )->post_title,
                'location' => get_post( $entry->location_id )->post_title,
                'start_hour' => date( $format, strtotime( $start_hour ) ),
                'end_hour' => date( $format, strtotime( $end_hour ) ),
                'visible' => ( $entry->visible == 1 ) ? __( 'Visible', 'wcs3' ) : __( 'Hidden', 'wcs3' ),
                'id' => $entry->id,
            );
        }
        return $results;
    }
    else {
        return FALSE;
    }
}

/**
 * Gets all the visible classes from the database including instructors and locations.
 * 
 * @param string $layout: 'normal', 'list', etc.
 * @param string $location
 * @param string $mode: 12 or 24.
 */
function wcs3_get_classes( $layout, $location, $mode = '12', $instructor = 'all', $class = 'all' ) {
    global $wpdb;
    
    $format = ( $mode == '12' ) ? 'g:i a' : 'G:i';
    
    $schedule_table = wcs3_get_table_name();
    $posts_table = $wpdb->prefix . 'posts';
    $meta_table = $wpdb->prefix . 'postmeta';
    
    $query = "SELECT
                c.post_title AS class_title, c.post_content AS class_desc,
                i.post_title AS instructor_title, i.post_content AS instructor_desc,
                l.post_title AS location_title, l.post_content AS location_desc,
                s.weekday, s.start_hour, s.end_hour, 
              s.notes FROM $schedule_table s
              INNER JOIN $posts_table c ON s.class_id = c.ID
              INNER JOIN $posts_table i ON s.instructor_id = i.ID
              INNER JOIN $posts_table l ON s.location_id = l.ID
              WHERE s.visible = 1";
    
    $query = apply_filters( 
            'wcs3_filter_get_classes_query', 
            $query, 
            $schedule_table,
            $posts_table,
            $meta_table );

    // Add IDs by default (post filter)
    $pattern = '/^\s?SELECT/';
    $replacement = "SELECT c.ID AS class_id, i.ID as instructor_id, l.ID as location_id,";
    $query = preg_replace($pattern, $replacement, $query);

    // Filter by location
    if ( $location != 'all' ) {
        $query .= " AND l.post_title = %s";
        $query = $wpdb->prepare( $query, array( $location ) );
    }

    // Filter by instructor
    if ( $instructor != 'all' ) {
        $query .= " AND i.post_title = %s";
        $query = $wpdb->prepare( $query, array( $instructor ) );
    }

    // Filter by class
    if ( $class != 'all' ) {
        $query .= " AND c.post_title = %s";
        $query = $wpdb->prepare( $query, array( $class ) );
    }
    
    $query .= " ORDER BY s.start_hour";
    
    $results = $wpdb->get_results( $query );
    $grouped = array();
    
    if ( $results ) {
        foreach ( $results as $class ) {
            // Prep CSS class name
            wcs3_format_class_object( $class, $format );

            $class->class_link = get_permalink($class->class_id);
            $class->instructor_link = get_permalink($class->instructor_id);
            $class->location_link = get_permalink($class->location_id);

            if ( $layout == 'list' ) {
            	$grouped[$class->weekday][] = $class;
            }
            else {
                $grouped[$class->start_hour_css][] = $class;
            }
        }
    }
    
    return $grouped;
}

/**
 * Formats the time properties of a class object as returned from the database.
 * 
 * @param object $class: reference to class object.
 * @param string $format: time format (e.g. 'g:i a').
 */
function wcs3_format_class_object( &$class, $format ) {
    $timezone = wcs3_get_system_timezone();
    $tz = new DateTimeZone( $timezone );

    $start_utc = $class->start_hour;
    $start_dt = new DateTime( WCS3_BASE_DATE . ' ' . $start_utc, new DateTimeZone('UTC') );
    $start_dt->setTimeZone( $tz );

    $end_utc = $class->end_hour;
    $end_dt = new DateTime( WCS3_BASE_DATE . ' ' . $end_utc, new DateTimeZone('UTC') );
    $end_dt->setTimeZone( $tz );

    $start_hour = $start_dt->format('H:i').':00';
    $end_hour = $end_dt->format('H:i').':00';

    $class->start_hour_css = substr( str_replace( ':', '-', $start_hour), 0, 5);
    $class->end_hour_css = substr( str_replace( ':', '-', $end_hour), 0, 5);
    
    $class->start_hour = date( $format, strtotime( $start_hour ) );
    $class->end_hour = date( $format, strtotime( $end_hour ) );
    
    $class = apply_filters( 'wcs3_format_class', $class );
}
