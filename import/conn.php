<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();

	define( "DBHOST", "localhost" );
	define( "DBUSER", "" );
	define( "DBPASS", "" );
	define( "DBNAME", "" );
	/*
	$conn = new mysqli( DBHOST, DBUSER, DBPASS, DBNAME );
	if( $conn->connect_errno ) {
		echo $conn->connect_error;
		exit();
	}
	$conn->set_charset('utf8');
	*/
function simpleSelect( $field, $table, $where, $limit ){
	global $conn;
	
	if( $field == "*" ) {
		$fieldName = $field;
	} else {
		$fieldName = fieldArray2SQL( $field );
	}
	
	$sql = "SELECT $fieldName FROM `$table`";
	if( $where !== 0 ) {
		$sql.= " WHERE $where";
	}
	if( $limit > 0 ) {
		$sql.= " LIMIT $limit";
	}
	$query = $conn->query( $sql );
	if( $query ) {
		$status = true;
		$result = array();
		while( $row = $query->fetch_assoc() ) {
			array_push( $result, $row );
		}
	} else {
		$status = false;
		$result = $conn->error;
	}
	
	$response['status'] = $status;
	$response['result'] = $result;
	return $response;
}

function simpleInsert( $table, $field, $value ){
	global $conn;
	
	$fieldName = fieldArray2SQL( $field );
	$value = valueArray2SQL( $value );
	$sql = "INSERT INTO `$table` ( $fieldName ) VALUES ( $value )";
	$query = $conn->query( $sql );
	
	if( $query ) {
		$status = true;
		$result = $conn->insert_id;
	} else {
		$status = false;
		$result = $conn->error;
	}
	
	$response['status'] = $status;
	$response['result'] = $result;
	return $response;
}

function simpleUpdate( $table, $field, $value, $where ){
	global $conn;
	
	if( strlen( $where ) < 9 ) {
		$status = false;
		$result = "Please assign WHERE";
	} else {
		$sqlCode = '';
		for( $i = 0; $i < count( $field ); $i++ ) {
			$fieldName = $field[$i];
			$val = $value[$i];
			$sqlCode.= "`$fieldName` = '$val', ";
		}
		$sqlCode = substr( $sqlCode, 0, -2 );
		
		$sql = "UPDATE `$table` SET $sqlCode WHERE $where LIMIT 1";
		$query = $conn->query( $sql );
		if( !$query ) {
			$status = false;
			$result = $conn->error;
		} else {
			$status = true;
			$result = $conn->affected_rows;
		}
	}
	
	$response['status'] = $status;
	$response['result'] = $result;
	return $response;
}

function simpleToggle( $table, $field, $where ){
	global $conn;
	
	$sql = "UPDATE `$table` SET `$field` = IF( `$field` = 1, 0, 1) WHERE $where LIMIT 1";
	$query = $conn->query( $sql );
	if( !$query ) {
		$status = false;
		$result = $conn->error;
	} else {
		$status = true;
		$result = $conn->affected_rows;
	}
	$response['status'] = $status;
	$response['result'] = $result;
	return $response;
}

function simpleDelete( $table, $where ){
	global $conn;
	
	if( strlen( $where ) < 9 ) {
		$status = false;
		$result = "Please assign WHERE";
	} else {
		$sql = "DELETE FROM `$table` WHERE $where LIMIT 1";
		$query = $conn->query( $sql );
		if( !$query ) {
			$status = false;
			$result = $conn->error;
		} else {
			$status = true;
			$result = $conn->affected_rows;
		}
	}
	
	$response['status'] = $status;
	$response['result'] = $result;
	return $response;
}

function fieldArray2SQL( $field ){
	$sql = '';
	foreach( $field as $v ){
		$sql.= "`$v`, ";
	}
	$sql = substr( $sql, 0, -2 );
	return $sql;
}

function valueArray2SQL( $value ){
	$sql = '';
	foreach( $value as $v ){
		$sql.= "'$v', ";
	}
	$sql = substr( $sql, 0, -2 );
	return $sql;
}

function uploadImage( $image, $imgName, $path ){
	$status = false;
	$imgPath = "images/". $path ."/";
	if( ( $image['type'] == 'image/jpg' || $image['type'] == 'image/jpeg' || $image['type'] == 'image/png' || $image['type'] == 'image/gif' ) ) {
		if( $image['error'] == 0 ) {
			if( move_uploaded_file( $image['tmp_name'], $imgPath . $imgName ) ) {
				$status = true;
			} else {
				$status = "เกิดข้อผิดพลาดระหว่างการถ่ายโอนไฟล์";
			}
		} else {
			$status = "เกิดข้อผิดพลาดระหว่างการถ่ายโอนไฟล์";
		}
	} else {
		$status = "ประเภทของไฟล์รูปภาพไม่ถูกต้อง";
	}
	
	return $status;
}

function changeDateFormat( $date ){
	// input dd/mm/yyyy
	$date = str_replace( "/", "-", $date );
	$date = date( "Y-m-d", strtotime( $date ) );
	return $date;
}
?>