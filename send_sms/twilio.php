<?php
add_action( 'wpcf7_before_send_mail', 'process_cf7_and_send_sms' );
function process_cf7_and_send_sms( $contact_data ){

	// global $wp;
	// echo "<pre>"; print_r($wp); echo "</pre>";
	$phone_field=get_option('cspd_cf7_sms_phone_field');
    $submission = WPCF7_Submission::get_instance();

	if (isset($_POST[$phone_field])) {
		// echo $_POST[$phone_field]."<br><br><br>";

        if ($submission) {
            // get submission data
            $twilio_sid = get_option('cspd_cf7_twilio_sid');
            $twilio_token = get_option('cspd_cf7_twilio_token');
            $admin_phone_num = get_option('cf7_admin_phone_number');
            $sender_phone_num = get_option('cf7_sender_phone_number');
            $user_phone_num = sanitize_text_field($_POST[$phone_field]);
            $data = $submission->get_posted_data();

           if (get_option('cf7_enable_user_sms')=="checked") {
           	
                    $user_sms_txt = get_option('cspd_cf7_user_sms', 'Your message has been sent to [site_name]');
                    $user_sms_txt = str_replace('[site_name]', get_bloginfo( 'name' ), $user_sms_txt);

                    $user_sms_txt = preg_replace_callback(
                       // "(\[otsection\](.*?)\[/otsection\])is",
                       "(\[field=(.*?)\])is",
                       function($m) use ($data) {
                           static $id = 0;
                           $id++;
                           return $data[$m[1]];
                       },
                       $user_sms_txt);

                      // echo $user_sms_txt;
                    cspd_cf7_send_twilio_sms($twilio_sid, $twilio_token, $sender_phone_num, $user_phone_num, $user_sms_txt);

           }


           if (get_option('cf7_enable_admin_sms')=="checked") {
            
                   $admin_sms_txt = get_option('cspd_cf7_admin_sms', 'You have just got a contact message on [site_name]');
                    $admin_sms_txt = str_replace('[site_name]', get_bloginfo( 'name' ), $admin_sms_txt);

                   $admin_sms_txt = preg_replace_callback(
                      // "(\[otsection\](.*?)\[/otsection\])is",
                      "(\[field=(.*?)\])is",
                      function($m) use ($data) {
                          static $id = 0;
                          $id++;
                          return $data[$m[1]];
                      },
                      $admin_sms_txt);
                   // echo $admin_sms_txt;
                    cspd_cf7_send_twilio_sms($twilio_sid, $twilio_token, $sender_phone_num, $admin_phone_num, $admin_sms_txt);
           }


            /*foreach ($data as $key => $value) {
            	if ($key==$phone_field) {
            		// echo $key.": ".$value."<br>Send the SMS";
            	}
            }*/

        }

	}

}

