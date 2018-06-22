( function( $ ){

    getVideo();

} ( jQuery ) );

function getVideo(){
    ajaxCall( apiPath, {
        service: 'test',
        action: 'getVideo'
    }, setVideo );
}

function setVideo( response ){
    var video = response.items;
    console.log( video );
    var str = '';
    $.each( video, function( k, v ){
        if( v.id.kind != 'youtube#video' ) {
            return true;
        }
        str+= '<div class="col-md-4">';
        str+= '<iframe src="https://www.youtube.com/embed/'+ v.id.videoId +'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        str+= '</div>';
    } );

    $('#contentVideo').html( str );
}