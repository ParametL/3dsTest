const apiPath = "api.php";
( function( $ ){
	console.log( 'main' );
	
	$('.btnLogout').on( 'click', function( e ){
		console.log( 'logout' );
		e.preventDefault();
		$( this ).addClass( 'disabled', true );
		ajaxCall( apiPath, {
			service: 'user',
			action: 'logout'
		}, function( response ){
			window.location = '/';
		} );
	} );
	
}( jQuery ) );

function ajaxCall( target, parameter, response ){
	$.post( target, parameter, response, 'json' );
}

function lockButton(){
	$('button').attr( 'disabled', true );
}

function unlockButton(){
	$( 'button' ).attr( 'disabled', false );
}

function changeDateFormat( inputDate ){
	var date = new Date( inputDate );
	var m = date.getMonth() + 1;
	return date.getDate() + '/' + m + '/' + date.getFullYear();
}

function dateToString( date ){
	var thaiM = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
	var dateArr = date.split( '-' );
	var d = dateArr[2];
	var m = parseInt( dateArr[1] ) - 1;
		m = thaiM[m];
	var y = dateArr[0];
	return d + ' ' + m + ' ' + y;
}

function imageIsLoaded(e) {
	$('#imgPreview').attr('src', e.target.result);
};

function setAlertBox( alertBox, header, text, type ){
	alertBox.removeClass();
	if( type ) {
		alertBox.addClass( 'alert alert-success' );
	} else {
		alertBox.addClass( 'alert alert-danger' );
	}
	alertBox.find( '.alert-heading' ).html( header );
	alertBox.find( 'p' ).html( text );
}