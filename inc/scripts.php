<?php


function load_site_styles()
{
    global $CACHE_BUSTER;

    wp_enqueue_style('site-styles', CODE_BASE . '/css/site-styles.min.css', array(), $CACHE_BUSTER);
    wp_enqueue_style('main-style', CODE_BASE . '/css/main.min.css', array(), $CACHE_BUSTER);
    // wp_enqueue_style('temp-style', CODE_BASE . '/css/temp.css', array(), $CACHE_BUSTER);
}


add_action("wp_enqueue_scripts", "load_site_styles");


function load_site_scripts()
{
    global $CACHE_BUSTER;


    wp_enqueue_script('debug-js', CODE_BASE . '/assets/js/debug.js', array(), $CACHE_BUSTER);

    if (get_queried_object() == NULL) {
        return;
    }




   // if (is_cart() || is_shop() ) {

        wp_enqueue_script('toast-widget', CODE_BASE . '/assets/js/toast-widget.js', array(), $CACHE_BUSTER);
   // }

    // wp_enqueue_script('floating-widget', CODE_BASE . '/assets/js/floating-cart-widget.js', array(), $CACHE_BUSTER);


    //id 8  
    if (is_page() &&  get_queried_object()->post_name == "checkout" && !DEV_MODE) {
        wp_enqueue_script('warning-script', CODE_BASE . '/assets/js/warning.js', array(), false, true);
    }




    // id 6 = page-shop.php
    if (get_queried_object()->post_name == "shop") {
        wp_enqueue_script('mutation-script', CODE_BASE . '/assets/js/order-mutation.js', array(), false, true);
    }
}



add_action("wp_enqueue_scripts", "load_site_scripts");



///////////////////////////

add_action('wp_enqueue_scripts', 'generic_contact_form');

function generic_contact_form()
{
    if (get_queried_object() == NULL) {
        return;
    }



    if (get_queried_object()->post_name == "about") {
        wp_register_script("contact-form-script", CODE_BASE . '/assets/js/contact-form.js', array(), false, true);
        #wp_localize_script('contact-form-script', 'genericContactForm', array('formBaseURL' => admin_url('admin-ajax.php')));
        wp_enqueue_script('contact-form-script');
    }
}