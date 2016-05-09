// WEBBA Booking js validation functions

// check integer
function wbkCheckInteger( val ) { 
 	return /^\+?(0|[1-9]\d*)$/.test(val);
}

// check string 
function wbkCheckString( val, min, max ) {
	if ( val.length < min || val.length > max ) {
		return false;
	} else {	
		return true; 
	}
}

// check email
function wbkCheckEmail( val ) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(val);
}

// check interger range
function wbkCheckIntegerMinMax( val, min, max ) { 
    if ( val < min || val > max ) {
		return false;
	} else {
		return true;
	}
}

// check phone
function wbkCheckPhone( val ) {
	var pattern = new RegExp(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/);
	return pattern.test(val);
}