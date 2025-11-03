<?php
echo $otp= rand(10000,99999);
sendOTP(9226807651,$otp);

function sendOTP($mobile,$otp){
	$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "integrated_number": "919226807651",
    "content_type": "template",
    "payload": {
        "messaging_product": "whatsapp",
        "type": "template",
        "template": {
            "name": "otp01",
            "language": {
                "code": "en",
                "policy": "deterministic"
            },
            "namespace": null,
            "to_and_components": [
                {
                    "to": [
                        "<list_of_phone_numbers>"
                    ],
                    "components": {
                        "body_1": {
                            "type": "text",
                            "value": "123456"
                        }
                    }
                }
            ]
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'authkey: <authkey>',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
	
}


?>