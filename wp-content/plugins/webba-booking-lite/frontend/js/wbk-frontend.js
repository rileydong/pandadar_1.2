// WEBBA Booking frontent scripts

// step count
var wbk_total_steps;

// onload function
jQuery(function ($) {
	var service_id = jQuery('#wbk-service-id').val();
	if ( wbkl10n.mode == 'extended' ){
		if ( service_id == 0 ) {
			wbk_total_steps = 4;
	 		wbk_setServiceEvent();
	 	} else {
	 		wbk_total_steps = 3;
	 		wbk_renderSetDate( false );
		}
	} else {
		if ( service_id == 0 ) {
			wbk_total_steps = 3;
	 		wbk_setServiceEvent();
	 	} else {
	 		wbk_total_steps = 2;
	 		wbk_renderSetDate( false );
		}
		jQuery('#timeselect_row').remove();		
	}
});

// clear set date
function wbk_clearSetDate() {
	jQuery('#wbk-date-container').html('');
}

// clear set date
function wbk_clearSetTime() {
	jQuery('#wbk-time-container').html('');
}

// clear timeslots
function wbk_clearTimeslots() {
	jQuery('#wbk-slots-container').html('');
}

// clear form
function wbk_clearForm() {
	jQuery('#wbk-booking-form-container').html('');
}

// clear results
function wbk_clearDone() {
	jQuery('#wbk-booking-done').html('');
}


// set service event
function wbk_setServiceEvent() {
	jQuery('#wbk-service-id').change(function() {
		wbk_clearSetDate();
		wbk_clearSetTime();
		wbk_clearForm();
		wbk_clearDone();
		wbk_clearTimeslots();
		wbk_clearForm();
		var service_id = jQuery('#wbk-service-id').val();
		if ( service_id != 0 ){
			wbk_renderSetDate( true );
		} else {
			wbk_clearSetDate();
			wbk_clearSetTime(); 
		}
	});
}

// clear set time
function wbk_clearSetTime() {
	jQuery('#wbk-time-container').html('');

}

// render time set
function wbk_renderTimeSet() {
	
	var service = jQuery('#wbk-service-id').val();
	var data = {
		'action' : 'wbk-render-days',
		'step' : wbk_total_steps,		 
 		'service' : service
 	};              

 	if ( jQuery('#wbk-time-container').html() != '' ){
 		jQuery('#wbk-search_time_btn').focus();
 		jQuery('html, body').animate({
        	scrollTop: jQuery('#wbk-time-container').offset().top - 120
   		}, 1000);;
 		return;
 	}
 	jQuery('#wbk-time-container').html('<div class="wbk-loading"></div>');
 	jQuery.post( wbkl10n.ajaxurl, data, function(response) {
 		jQuery('#wbk-time-container').css( 'display', 'none');
 		if ( response == -1 ){
			jQuery('#wbk-time-container').html('error');
 		} else {
			jQuery('#wbk-time-container').html(response);
 		}
		jQuery('#wbk-time-container').show('slide');
		
		jQuery('#wbk-search_time_btn').focus();
		jQuery('html, body').animate({
        	scrollTop: jQuery('#wbk-time-container').offset().top - 120
   		}, 1000);
   		jQuery( '[id^=wbk-day]' ).change(function() {
			var day = jQuery(this).attr('id');  
			day = day.substring(8, day.length);
			if( jQuery(this).is(':checked') ) {
				jQuery('#wbk-time_'+day).attr("disabled", false);
 	        } else {
				jQuery('#wbk-time_'+day).attr("disabled", true);
 	        }         
		});
   		jQuery('#wbk-search_time_btn').click(function() {
			 wbk_searchTime();
		});

	});
}


// render date input
function wbk_renderSetDate( scroll ) {
	jQuery('#wbk-date-container').css( 'display', 'none');
	if ( wbkl10n.mode == 'extended' ) { 
		if ( wbk_total_steps  == 3 ){
			current_step = 1;
		} else {
			current_step = 2;
		}
	} else {
		if ( wbk_total_steps  == 3 ){
			current_step = 2;
		} else {
			current_step = 1;
		}	
	}
	if ( wbkl10n.mode == 'extended' ){
		jQuery('#wbk-date-container').html('<span class="wbk-input-label">' + wbkl10n.selectdatestart + '</span><input value="' + wbkl10n.selectdate + '" type="text" class="wbk-input wbk-width-100" id="wbk-date" />');
	} else {
		jQuery('#wbk-date-container').html('<span class="wbk-input-label">' + wbkl10n.selectdatestartbasic + '</span><input value="' + wbkl10n.selectdate + '" type="text" class="wbk-input wbk-width-100" id="wbk-date" />');
	}
	jQuery('#wbk-date-container').show('slide');

	jQuery('#wbk-date').pickadate({
			min: true,

		    monthsFull: [ wbkl10n.january,
						  wbkl10n.february,
  						  wbkl10n.march,
						  wbkl10n.april,
						  wbkl10n.may,
						  wbkl10n.june,
						  wbkl10n.july,
						  wbkl10n.august,
						  wbkl10n.september,
						  wbkl10n.october,
						  wbkl10n.november,
						  wbkl10n.december
 	    				 ],
		    monthsShort: [ wbkl10n.jan,
						   wbkl10n.feb,
  						   wbkl10n.mar,
						   wbkl10n.apr,
						   wbkl10n.mays,
						   wbkl10n.jun,
						   wbkl10n.jul,
						   wbkl10n.aug,
						   wbkl10n.sep,
						   wbkl10n.oct,
						   wbkl10n.nov,
						   wbkl10n.dec
		    			 ],

		    weekdaysFull: [ wbkl10n.sunday,
						    wbkl10n.monday,
  						    wbkl10n.tuesday,
						    wbkl10n.wednesday,
						    wbkl10n.thursday,
						    wbkl10n.friday,
						    wbkl10n.saturday
  		     			  ],
		    weekdaysShort: [ wbkl10n.sun,
						     wbkl10n.mon,
  						     wbkl10n.tue,
						     wbkl10n.wed,
						     wbkl10n.thu,
						     wbkl10n.fri,
						     wbkl10n.sat
  		     			  ],

		    today:  wbkl10n.today,
		    clear:  wbkl10n.clear,
		    close:  wbkl10n.close,

		    firstDay: wbkl10n.startofweek,
		    
		    format: 'dd mmmm yyyy',

		    labelMonthNext: wbkl10n.nextmonth,
		    labelMonthPrev: wbkl10n.prevmonth,	 

			formatSubmit: 'yyyy/mm/dd',
			hiddenPrefix: 'wbk-date',

         	onSet: function( thingSet ) {

         		wbk_clearForm();
         		wbk_clearDone();
         		wbk_clearTimeslots();
         		if(typeof thingSet.select != 'undefined'){
         			if ( wbkl10n.mode == 'extended' ){      		 
    					wbk_renderTimeSet();
    				} else {
    					wbk_searchTime();
    				}	
    			}
  			} 		
	});
	if ( scroll == true ) {
		jQuery('html, body').animate({
	       	scrollTop: jQuery('#wbk-date-container').offset().top - 120
	   	}, 1000);		
	}
}


// search time 
function wbk_searchTime() {

	wbk_clearForm();
	wbk_clearDone();

	if ( wbkl10n.mode == 'extended' ) {
	    var days = jQuery( '.wbk-checkbox:checked' ).map(function() {
	    	return jQuery( this ).val();
	    }).get();

	    var times = jQuery( '.wbk-time_after:enabled' ).map(function() {
	    	return jQuery( this ).val();
	    }).get();

	    if ( days == '' ) {
	    	return;
	    }
	} else {
		days = '';
		times = '';
	}    
    var service = jQuery('#wbk-service-id').val();
    var date = jQuery('[name=wbk-date_submit]').val();
    if ( date == '' ){
    	jQuery('#wbk-date').addClass('wbk-input-error');	
    	return;
    }

    var data = {
		'action' : 'wbk_search_time',
		'days': days,
		'times': times,
		'service': service,
		'date': date 		 
 	};     
	jQuery('#wbk-slots-container').html('<div class="wbk-loading"></div>');
    jQuery.post( wbkl10n.ajaxurl, data, function(response) {
    	if ( response == 0 || response == -1 || response == -2 || response == -3 || response == -4 || response == -4 || response == -6 || response == -7){
     		jQuery('#wbk-slots-container').html('error');
     	} else {
    		jQuery('#wbk-slots-container').css( 'display', 'none');
			jQuery('#wbk-slots-container').html( '<span class="wbk-input-label">' + wbkl10n.selecttime + '</span>' + response);
			jQuery('#wbk-slots-container').show('slide');
    		jQuery('html, body').animate({ scrollTop: jQuery('#wbk-slots-container').offset().top - 120 }, 1000);
			wbk_setTimeslotEvent();
			if ( wbkl10n.mode == 'extended' ){
				jQuery('#wbk-show_more_btn').click(function() {
					wbk_showMore();
				}); 		
			} else {
				jQuery('#wbk-service-id').focus();
			}
    	}    	 
    });	 
}

// search time show more callback 
function wbk_showMore() {

    var days = jQuery( '.wbk-checkbox:checked' ).map(function() {
    	return jQuery( this ).val();
    }).get();

    var times = jQuery( '.wbk-time_after:enabled' ).map(function() {
    	return jQuery( this ).val();
    }).get();

    if ( days == '' ) {
    	return;
    }

    var service = jQuery('#wbk-service-id').val();

    var date = jQuery('#wbk-show-more-start').val();

    var data = {
		'action' : 'wbk_search_time',
		'days': days,
		'times': times,
		'service': service,
		'date': date		 
 	};     
	jQuery('#wbk-show_more_container').html('<div class="wbk-loading"></div>');
	

    jQuery.post( wbkl10n.ajaxurl, data, function(response) {
    	if (response == 0 || response == -1){
			jQuery('#wbk-more-container').html('error');

    	} else {
      		jQuery('#wbk-show_more_container').remove();     		 
      		jQuery('html, body').animate({ scrollTop: jQuery('.wbk-more-container').last().offset().top - 120 }, 1000);
			jQuery('.wbk-more-container').last().css( 'display', 'none' );
			jQuery('.wbk-more-container').last().html(response);
			jQuery('.wbk-more-container').eq(-2).show('slide');
			
			wbk_setTimeslotEvent();
			jQuery('#wbk-show_more_btn').click(function() {
				wbk_showMore();
			});
    		
    	}
    	 
    });	
}


// set timeslot button event
function wbk_setTimeslotEvent(){
	wbk_clearForm();
	wbk_clearDone();
	jQuery('[id^=wbk-timeslot-btn_]').click(function() {
		// get time from id
		var btn_id = jQuery(this).attr('id');  
		var time = btn_id.substring(17, btn_id.length);
		var service = jQuery('#wbk-service-id').val();

		var availale_count = jQuery(this).attr('data-available'); 
		var max_available = 0;
 
		 
	    var data = {
			'action' : 'wbk_render_booking_form',
			'time': time,
			'service': service,
			'step' : wbk_total_steps 			 		 		 
	 	};
 
		jQuery('#wbk-booking-form-container').html('<div class="wbk-loading"></div>');
		jQuery('html, body').animate({ scrollTop: jQuery('#wbk-booking-form-container').last().offset().top - 120 }, 1000);
	 	jQuery.post( wbkl10n.ajaxurl, data, function(response) {
	    	if (response == 0 || response == -1){
				jQuery('#wbk-booking-form-container').html('error');

	    	} else {
			jQuery('#wbk-booking-form-container').html(response);

    		if ( wbkl10n.phonemask == 'enabled' ){
    			jQuery('[name="wbk-phone"]').mask(wbkl10n.phoneformat);
    		}

    		jQuery( 'input' ).focus(function() {
				jQuery( this ).removeClass('wbk-input-error');
			});
			jQuery('#wbk-book_appointment').click(function() {

				var name = jQuery.trim( jQuery( '[name="wbk-name"]' ).val() );
				var email = jQuery.trim( jQuery( '[name="wbk-email"]' ).val() );
				var phone = jQuery.trim( jQuery( '[name="wbk-phone"]' ).val() );
				var desc =  jQuery.trim( jQuery( '[name="wbk-comment"]' ).val() );

				var quantity_length = jQuery( '[name="wbk-book-quantity"]' ).length;
				var quantity = -1;
				if ( quantity_length == 0 ){
					quantity = 1;
				} else {
					quantity =  jQuery.trim( jQuery( '[name="wbk-book-quantity"]' ).val() );
				}
				
				var error_status = 0;
 
				if ( !wbkCheckString( name, 3, 128 ) ){
	 				error_status = 1;
	 				jQuery( '[name="wbk-name"]' ).addClass('wbk-input-error');	 				
	 			}
	 			if ( !wbkCheckEmail( email ) ){
	 				error_status = 1;
	 				jQuery( '[name="wbk-email"]' ).addClass('wbk-input-error');	 				
	 			}	
	 			if ( !wbkCheckString( phone, 7, 30 ) ){
	 				error_status = 1;
	 				jQuery( '[name="wbk-phone"]' ).addClass('wbk-input-error');	 				
	 			}
	 			if ( !wbkCheckString( desc, 0, 255 ) ){
	 				error_status = 1;
	 				jQuery( '[name="wbk-comment"]' ).addClass('wbk-input-error');	 				
	 			}
	 			if ( !wbkCheckIntegerMinMax( quantity, 1, 1000000 ) ){
	 				error_status = 1;	 				 				
	 			}

	 			// validate custom fields (text)
				jQuery('.wbk-text[aria-required="true"]').each(function() {
				    var value =  jQuery( this ).val();
					if ( !wbkCheckString( value, 1, 128 ) ){
	 					error_status = 1;
	 					jQuery( this ).addClass('wbk-input-error');	 				
	 				}
				});

				var extra_value = '';
				
				// custom fields values (text)
				jQuery('.wbk-text').not('#wbk-name,#wbk-email,#wbk-phone').each(function() {
					var label = jQuery('label[for="' + jQuery( this ).attr('id') + '"]').html();
					extra_value += label + ': ';
 			 		extra_value += jQuery( this ).val() + '###';
				});
				
				// custom fields values (checkbox)
				jQuery('.wbk-check').each(function() {
					var label = jQuery('label[for="' + jQuery( this ).attr('id') + '"]').html();
					extra_value += label + ': ';

					jQuery(this).children('span').each(function() {
				 		jQuery(this).children('input:checked').each(function() {
				 			extra_value += jQuery(this).val() + ' '; 
						});
					});
					extra_value += '###';
				});
				
				// custom fields values (select)
				jQuery('.wbk-select').not('#wbk-book-quantity').each(function() {
					var label = jQuery('label[for="' + jQuery( this ).attr('id') + '"]').html();
					extra_value += label + ': ';
 			 		extra_value += jQuery( this ).val() + '###';
				});	 	

		 
	 			if ( error_status == 1 ) {
	 				return;
	 			}
	 			jQuery('#wbk-booking-done').html( '<div class="wbk-loading"></div>');
				jQuery('#wbk-booking-form-container').toggle('slow', function() {
    				jQuery('#wbk-booking-form-container').html('');
    				jQuery('#wbk-booking-form-container').toggle();
  				});
				 
			    var data = {
					'action' : 'wbk_book',
					'time': time,
					'service': service,
 					'name': name,
 					'email': email,
 					'phone': phone,
 					'desc': desc,
 					'extra': extra_value,
 					'quantity': quantity
 			 	};

 			 	jQuery.post( wbkl10n.ajaxurl, data, function(response) {
					if ( response != -1 && 
 						response != -2 &&
 						response != -3 &&
 						response != -4 && 
 						response != -5 && 
 						response != -6 && 
 						response != -7 && 
 						response != -8 && 
 						response != -9 && 
 						response != -10 && 
 						response != -11 && 
 						response != -12 &&
						response != -13
 						) {
						
						jQuery('#wbk-booking-done').html(wbkl10n.thanksforbooking);
					} else {
						jQuery('#wbk-booking-done').html('Something went wrong, please try again.');

					}
					jQuery('#wbk-slots-container').show('slide'); 

 			 	});

			});
    		 
     	}    	 
    });	 

	});
}
