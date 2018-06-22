<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	$index = $_POST['service'];
	$action = $_POST['action'];
	$data = $_POST['data'];

	/*
	if( !isset( $_SESSION['userID'] ) || $_SESSION['userID'] == 0 ) {
		if( $index != "login" && $action != "login" ) {
			$json_arr = array(
				'status' => false,
				'response' => 'Access Denied'
			);
			returnJSON( $json_arr );
		}
	}
	*/
	if( isset( $index ) && $index != '' ) {
		$index = strtolower( $index );
		if( isset( $action ) && $action != '' ) {
			if( file_exists( 'modules/mod_' . $index . '/' . $index . 'Controller.php' ) ) {
				require( 'import/conn.php' );
				require( 'modules/mod_' . $index . '/' . $index . 'Controller.php' );
			} else {
				$json_arr = array(
					'status' => false,
					'response' => 'File not exists'
				);
				returnJSON( $json_arr );
			}
		}
	} else {
		$json_arr = array(
			'status' => false,
			'response' => 'Invalid Service'
		);
		returnJSON( $json_arr );
	}
	
function returnJSON( $json_arr ){	
	echo json_encode( $json_arr, JSON_UNESCAPED_UNICODE );
	exit(0);
}
?>