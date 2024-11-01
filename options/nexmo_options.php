
        
  <tbody id="nexmo_options" style="display: <?php if($smsapi!='nexmo') { echo "none;";  } ?>">

    <tr>
      <td><h2>Nexmo options</h2></td>
      <td>
      </td>
      <td></td>
    </tr>


              <tr>
                <td>Nexmo API key</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_nexmo_key" class="form-control" value="<?php echo get_option('cspd_cf7_nexmo_key'); ?>">
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Nexmo secret</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_nexmo_secret" class="form-control" value="<?php echo get_option('cspd_cf7_nexmo_secret'); ?>">
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Nexmo from</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_nexmo_from" class="form-control" value="<?php echo get_option('cspd_cf7_nexmo_from'); ?>">
                </td>
                <td></td>
              </tr>

 </tbody>
