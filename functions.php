<?php
function cspd_cf7_send_twilio_sms($id, $token, $from, $to, $body)
{

$url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);

  $auth = base64_encode( $id.':'.$token );
 
   $args = array(
    'headers' => [
        'Authorization' => "Basic $auth"
    ],

    'body' => $data,
    'timeout' => '45',
    'redirection' => '5',
    'httpversion' => '1.0',
    'sslverify' => false,
    'blocking' => true
    );
   $response = wp_remote_post( $url, $args );
   return $response;

}



function cspd_cf7_send_nexmo_sms($key,$secret,$to_number,$from_number,$sms_text)
{
  $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
        'api_key' => $key,
        'api_secret' => $secret,
        'to' => $to_number,
        'from' => $from_number,
        'text' => $sms_text
    ]);

    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // return curl_exec($ch);

   $response = wp_remote_get( $url );
   return $response;

}

function cspd_cf7_send_msg91_sms($api,$smstxt,$sender_id,$to)
{
  $response = @wp_remote_get("https://control.msg91.com/api/sendhttp.php?authkey=". $api ."&mobiles=".$to."&message=".$smstxt."&sender=". $sender_id ."&route=4&country=0")['body'];
  return $response;
}



function cspd_send_textlocal_sms($api_key,$sender,$number,$message)
{
  // Account details
  $apiKey = urlencode($api_key);
  
  // Message details
  $numbers = array($number);
  $sender = urlencode($sender);
  $message = rawurlencode($message);
 
  $numbers = implode(',', $numbers);
  // Prepare data for POST request
  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
  // $response = wp_remote_post( 'https://api.textlocal.in/send/', array( 'data' => $data ) );
    

    $response = wp_remote_post( 'https://api.textlocal.in/send/', array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array(),
    'body'        => $data,
    'cookies'     => array()
    )
);

return $response;
    // echo "<pre>"; print_r($response); echo "</pre>";
}

?>