<?php

// Log the errors and callbacks for debugging
function jeeb_log($contents)
{
    error_log($contents);
}

// Convert the IRR currency to equivalent Bitcoins
 function convertIrrToBtc($url, $amount, $signature) {

   $ch = curl_init($url.'api/convert/'.$signature.'/'.$amount.'/irr/btc');
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     'Content-Type: application/json')
 );

 $result = curl_exec($ch);
 $data = json_decode( $result , true);
 jeeb_log("data = ".var_export($data, TRUE));
 // Return the equivalent bitcoin value acquired from Jeeb server.
 return (float) $data["result"];

 }

// Create Invoice which can be paid over Jeeb's Payment Gateway.
 function createInvoice($url, $amount, $options = array(), $signature) {

     $post = json_encode($options);

     $ch = curl_init($url.'api/bitcoin/issue/'.$signature);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Content-Length: ' . strlen($post))
     );

     $result = curl_exec($ch);
     $data = json_decode( $result , true);
     jeeb_log("data = ".var_export($data, TRUE));

     return $data['result'];

 }

// Redirect to Jeeb's payment Gateway.
 function redirectPayment($url, $token) {

   // Using Auto-submit form to redirect user with the token
   return "<form id='form' method='post' action='".$url."invoice/payment'>".
           "<input type='hidden' autocomplete='off' name='token' value='".$token."'/>".
          "</form>".
          "<script type='text/javascript'>".
               "document.getElementById('form').submit();".
          "</script>";
 }
