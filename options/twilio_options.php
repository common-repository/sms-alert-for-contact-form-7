

            <tbody id="twilio_options" style="display: <?php if($smsapi!='twilio') { echo "none;";  } ?>">

               <tr>
                <td><h2>Twilio Options</h2></td>
                <td>
                 
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Twilio account SID</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_twilio_sid" class="form-control" value="<?php echo get_option('cspd_cf7_twilio_sid'); ?>">
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Twilio token</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_twilio_token" class="form-control" value="<?php echo get_option('cspd_cf7_twilio_token'); ?>">
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Sender phone number</td>
                <td>
                	<input style="width: 100%" type="text" name="cf7_sender_phone_number" class="form-control" value="<?php echo get_option('cf7_sender_phone_number'); ?>">
                </td>
                <td>This number is provided by Twilio</td>
              </tr>
            
            </tbody>
