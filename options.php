<?php
function cspd_cf7_sms_settings_page() {
  ?>


  <form class="cspd_imdb_option_form" action="options.php" method="post">

  <?php settings_fields('cspd_cf7_sms_option_group');
  do_settings_sections('cspd_cf7_sms_option_group'); ?>

      <h2>Contact form 7 SMS Settings FRK</h2>

           <table class="widefat">
           <tbody>



              <tr>
                <td>Send SMS using</td>
                <td>
                  <?php
                    $smsapi = get_option('cspd_cf7_send_sms_using');
                  ?>

                  <select style="width: 100%;" name="cspd_cf7_send_sms_using" id="cspd_cf7_send_sms_using">
                    <option value="twilio" <?php if($smsapi=='twilio'){ echo "selected"; } ?>>Twilio</option>
                    <option value="nexmo" <?php if($smsapi=='nexmo'){ echo "selected"; } ?>>Nexmo</option>
                    <option value="msg91" <?php if($smsapi=='msg91'){ echo "selected"; } ?>>MSG91</option>
                    <option value="txtlcl" <?php if($smsapi=='txtlcl'){ echo "selected"; } ?>>Textlocal (India)</option>
                  </select>

                </td>
                <td></td>
              </tr>


              
              <?php 
               include 'options/twilio_options.php';
               include 'options/nexmo_options.php'; 
               include 'options/txtlcl_options.php';
               include 'options/msg91_options.php'; 
               ?>






              <tr>
                <td>Admin phone number</td>
                <td>
                  <input style="width: 100%" type="text" name="cf7_admin_phone_number" class="form-control" value="<?php echo get_option('cf7_admin_phone_number'); ?>">
                </td>
                <td>Recieve SMS to this phone number</td>
              </tr>


              <tr>
                <td>Phone number field name in contact form 7</td>
                <td>
                  <input style="width: 100%" type="text" name="cspd_cf7_sms_phone_field" class="form-control" value="<?php echo get_option('cspd_cf7_sms_phone_field'); ?>">
                </td>
                <td>Put the field name of phone number from contact form 7</td>
              </tr>





              <tr>
                <td>
                  <strong>User SMS text</strong><br/>
                  You can edit it on pro version. <a target="_blank" href="https://www.codespeedy.com/products/contact-form-7-sms-alert-plugin/">Buy Pro Version</a>
                </td>
                <td>
                  <textarea title="You can edit this in pro version." style="width: 100%;cursor: not-allowed;background: #e9e9e9;" rows="3" disabled>Your message has been sent to [site_name]</textarea>
                  <p>Use any field name like [field=field-name] to put in SMS.</p>
                </td>
                <td><input type="checkbox" name="cf7_enable_user_sms" value="checked" <?php echo get_option('cf7_enable_user_sms'); ?>> Enable user SMS</td>
              </tr>




              <tr>
                <td>
                  <strong>Admin SMS text</strong><br/>
                  You can edit it on pro version. <a target="_blank" href="https://www.codespeedy.com/products/contact-form-7-sms-alert-plugin/">Buy Pro Version</a>
                </td>
                <td>
                  <textarea title="You can edit this in pro version." style="width: 100%;cursor: not-allowed;background: #e9e9e9;" rows="3" disabled>You have just got a contact message on [site_name]</textarea>
                  <p>Use any field name like [field=field-name] to put in SMS.</p>
                  
                </td>
                <td><input type="checkbox" name="cf7_enable_admin_sms" value="checked" <?php echo get_option('cf7_enable_admin_sms'); ?>> Enable admin SMS</td>
              </tr>



              <tr>
                <td></td>
                <td>
                  <?php submit_button('Save Settings'); ?>
                </td>
              </tr>


           </tbody>
           </table>
           
    </form>

  <?php

    // wp_enqueue_style('cspd_cf7_sms_css', ''. plugin_dir_url( __FILE__ ) .'/assets/admin.css');
    wp_enqueue_script('cspd_cf7_sms_js', ''. plugin_dir_url( __FILE__ ) .'/assets/admin.js');
}