jQuery(document).ready(function($){
    // $('input').css('background','red');
    // $('#nexmo_options > h2').css('display','none');

     $('#cspd_cf7_send_sms_using').change(function(){
          var sms_api = $('#cspd_cf7_send_sms_using').val();

          // alert(sms_api);
          if (sms_api=='twilio') {
          	$('#twilio_options').show();
          	$('#nexmo_options').hide();
          	$('#txtlcl_options').hide();
          	$('#msg91_options').hide();
          } else {
          	// $('#twilio_options').hide();
          	// $('#nexmo_options').hide();
          }



          if (sms_api=='nexmo') {
          	$('#twilio_options').hide();
          	$('#nexmo_options').show();
          	$('#txtlcl_options').hide();
          	$('#msg91_options').hide();
          } else {
          	// $('#twilio_options').hide();
          	// $('#nexmo_options').hide();
          }




          if (sms_api=='txtlcl') {
          	$('#twilio_options').hide();
          	$('#nexmo_options').hide();
          	$('#txtlcl_options').show();
          	$('#msg91_options').hide();
          } else {
          	// $('#twilio_options').hide();
          	// $('#nexmo_options').hide();
          }



          if (sms_api=='msg91') {
          	$('#twilio_options').hide();
          	$('#nexmo_options').hide();
          	$('#txtlcl_options').hide();
          	$('#msg91_options').show();
          } else {
          	// $('#twilio_options').hide();
          	// $('#nexmo_options').hide();
          }

     });


});