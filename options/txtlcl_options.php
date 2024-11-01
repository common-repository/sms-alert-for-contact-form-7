
        
  <tbody id="txtlcl_options" style="display: <?php if($smsapi!='txtlcl') { echo "none;";  } ?>">

    <tr>
      <td><h2>Textlocal options</h2></td>
      <td>
      </td>
      <td></td>
    </tr>


              <tr>
                <td>Textlocal API key</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_txtlcl_api" class="form-control" value="<?php echo get_option('cspd_cf7_txtlcl_api'); ?>">
                </td>
                <td></td>
              </tr>


              <tr>
                <td>Textlocal sender (TXTLCL by default)</td>
                <td>
                	<input style="width: 100%" type="text" name="cspd_cf7_txtlcl_sender" class="form-control" value="<?php echo get_option('cspd_cf7_txtlcl_sender'); ?>">
                </td>
                <td></td>
              </tr>


 </tbody>
