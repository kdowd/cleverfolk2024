<?php

function my_page_template_redirect() {
    if ( is_page( 'goodies' ) && ! is_user_logged_in() ) {
        wp_redirect( home_url( '/signup/' ) );
        exit();
    }
}
#add_action( 'template_redirect', 'my_page_template_redirect' );




function get_additional_page(){
$args= array('pagename'=>'test');
$the_query = new WP_Query( $args );

#logger($the_query);

if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {
        $the_query->the_post();
        the_title( ' ' );
        the_content();
	}
 
}

wp_reset_postdata();

}