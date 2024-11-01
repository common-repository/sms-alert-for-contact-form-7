<?php
/**
 * @package sms_alert_for_contact_form_7
 * @version 1.0
 */
/*
Plugin Name: SMS Alert for Contact Form 7
Plugin URI: https://www.codespeedy.com/products/
Description: This plugin send SMS when contact form submitted from Contact Form 7. SMS can be sent to both admin and users.
Author: CodeSpeedy
Version: 1.0.0
Author URI: https://www.codespeedy.com/
*/
// Function to send twilio SMS
include 'functions.php';
// Creating option sub menu under CF7

add_action("admin_menu", "cspd_cf7_sms_menu");
function cspd_cf7_sms_menu() {
	add_submenu_page(
        'wpcf7',
        'WooCommerce OTP And SMS by Codespeedy Settings',
        '<span style="color: #e27e81;">CF7 SMS</span>',
        'administrator',
        'cspd-cf7-sms',
        'cspd_cf7_sms_settings_page' );
}


add_action('admin_init', 'cspd_cf7_sms_options');
function cspd_cf7_sms_options() {

  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_send_sms_using');

  // Twilio Option
	register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_twilio_sid');
	register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_twilio_token');
	register_setting('cspd_cf7_sms_option_group', 'cf7_admin_phone_number');
	register_setting('cspd_cf7_sms_option_group', 'cf7_sender_phone_number');
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_sms_phone_field');

  // Nexmo Options
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_nexmo_key');
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_nexmo_secret');
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_nexmo_from');
  // register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_nexmo_key');

  // MSG91 Options
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_msg91_key');
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_msg91_sender_id');

  // Textlocal Option
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_txtlcl_api');
  register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_txtlcl_sender');

  // SMS Text
  // register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_admin_sms');
  // register_setting('cspd_cf7_sms_option_group', 'cspd_cf7_user_sms');
  register_setting('cspd_cf7_sms_option_group', 'cf7_enable_admin_sms');
  register_setting('cspd_cf7_sms_option_group', 'cf7_enable_user_sms');


}



include 'options.php';


 $smsapi = get_option('cspd_cf7_send_sms_using');

 if ($smsapi=='twilio') {
   include 'send_sms/twilio.php';
 }

 if ($smsapi=='nexmo') {
   include 'send_sms/nexmo.php';
 }

 if ($smsapi=='txtlcl') {
   include 'send_sms/txtlcl.php';
 }

 if ($smsapi=='msg91') {
   include 'send_sms/msg91.php';
 }






// Add CSS and JS // To be used later
// define the wpcf7_enqueue_styles callback 
function action_wpcf7_enqueue_styles(  ) { 
}; 
         
// add the action 
add_action( 'wpcf7_enqueue_styles', 'action_wpcf7_enqueue_styles', 10, 0 ); 

// define the wpcf7_enqueue_scripts callback 
function action_wpcf7_enqueue_scripts(  ) { 
}; 
         
// add the action 
add_action( 'wpcf7_enqueue_scripts', 'action_wpcf7_enqueue_scripts', 10, 0 ); 