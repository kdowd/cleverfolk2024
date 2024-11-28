<?php
/**
 * Default background
 */
function wd_inline_css() {

     $wd_options_default_background = get_field( 'wd_options_default_background', 'option' );
     $wd_options_default_background_mobile = get_field( 'wd_options_default_background_mobile', 'option' );

     $custom_css = "
          .site-container {
               background-image: url('$wd_options_default_background');
               background-size: 100% auto;
               background-repeat: no-repeat;
          }

          @media(max-width:768px) {
               .site-container {
                    background-image: url('$wd_options_default_background_mobile');
                    background-size: 768px auto;
                    background-position: center top;
               }
          }
     ";

     wp_register_style( 'wd-custom-inline-css', false );
     wp_add_inline_style( 'wd-custom-inline-css', $custom_css );
     wp_enqueue_style( 'wd-custom-inline-css' );
     
}
add_action( 'wp_enqueue_scripts', 'wd_inline_css' );