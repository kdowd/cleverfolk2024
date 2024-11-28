<?php
// Allow SVG uploads to the media uploads
add_filter( 'upload_mimes', 'wd_mime_types' );
function wd_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_action( 'admin_head', 'wd_admin_head' );
function wd_admin_head() {
	$css = '';
	$css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';
	echo '<style type="text/css">'.$css.'</style>';
}

//If SVGs still won’t upload make sure to add this to the top of the SVG code:
//<?xml version="1.0" encoding="UTF-8"



?>




<!-- SWEET -->
<?php
#add_filter( 'body_class', 'add_class_to_body' );
function add_class_to_body( $classes ) {
  $classes[] = 'kjd-class';
  return $classes;
}

 