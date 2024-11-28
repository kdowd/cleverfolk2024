<?php

// session data is stored in DB under wp_woocommerce_sessions
// php sessions are discouraged, use DB instead
//The session is by default empty and not undertaken for guest users until they add a product to the cart
// great article here:
// https://rajaamanullah.com/how-to-use-woocommerce-sessions-and-cookies/

add_action('woocommerce_init', 'wc_init' );
function wc_init() {
    if (isset(WC()->session) && WC()->session->has_session()) {
		logger("WC session is go");
		WC()->session->set( 'useful_var', "QWERTY" );
    }
}

// wc_session_expiring: set to 47 hours, one hour before actual 
add_filter( 'wc_session_expiring', 'woocommerce_cart_session_about_to_expire', 100, 1 ); 
function woocommerce_cart_session_about_to_expire( $session_time ) {
	logger("ONE HOUR UNTIL EXPIRATION");
}

// set to 48 hours
add_filter( 'wc_session_expiration', 'woocommerce_cart_session_expires', 100, 1); 
function woocommerce_cart_session_expires( $session_time ) {
	logger("EXPIRED");
}