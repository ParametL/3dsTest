<?php
	$target = $_GET['mod'];
	$page = $_GET['page'];
	
	$pageTitle = " - 3ds test";
	
	if( !isset( $target ) || $target == "" ) {
		$target = "main";
	}
		
	$cssFile = '/' . $target . '.css';
	$jsFile = '/' . $target . '.js';

	if( file_exists( 'modules/mod_' . $target . $cssFile ) ) {
		$stylesheet = '<link href="modules/mod_' . $target . $cssFile . '" rel="stylesheet">';
	}

	if( file_exists( 'modules/mod_' . $target . $jsFile ) ) {
		$script = '<script type="text/javascript" src="modules/mod_' . $target . $jsFile . '"></script>';
	}
	
	
	if( isset( $page ) && $page != '' ) {
		$contentIndex = 'modules/mod_' . $target . '/' . $page . '.php';
	} else {
		$contentIndex = 'modules/mod_' . $target . '/index.php';
	}

	if( !file_exists( $contentIndex ) ) {
		$pageTitle = "เกิดข้อผิดพลาด ! ไม่พบหน้าที่ต้องการเข้าถึง";
		$contentIndex = 'page/404.html';
	}
	
function resetStyleSheet(){
	global $stylesheet;
	$stylesheet = '';
}

function addStyleSheet( $from, $filename ){
	global $stylesheet;
	
	$path = "css";
	if( $from != "main" ) {
		$path = "modules/mod_" . $from;
	}
	$stylesheet.= '<link rel="stylesheet" href="'. $path .'/'. $filename .'">';
}

function resetScript(){
	global $script;
	$script = '';
}

function addScript( $from, $filename ){
	global $script;
	
	$path = "js";
	if( $from != "main" ) {
		$path = "modules/mod_" . $from;
	}
	$script = '<script type="text/javascript" src="'. $path .'/'. $filename .'"></script>' . $script;
}

function resetTitle(){
	global $pageTitle;
	$pageTitle = '';
}

function setTitle( $text ){
	global $pageTitle;
	$pageTitle = $text . $pageTitle;
}
?>