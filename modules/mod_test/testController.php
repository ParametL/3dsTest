<?php
	switch( $action ) {
		case 'getVideo' :
			getVideo();
			break;
		
		default :
			$json_arr = array(
				'status' => false,
				'response' => 'Invalid Action'
			);
			returnJSON( $json_arr );
			break;
	}

function getVideo(){
    $api = 'https://s3-ap-southeast-1.amazonaws.com/ysetter/media/video-search.json';
    $data = file_get_contents( $api );
	echo $data;
}
?>