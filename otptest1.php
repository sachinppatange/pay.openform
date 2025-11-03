<?php 

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
    "integrated_number": "919420353943",
    "content_type": "template",
    "payload": {
        "messaging_product": "whatsapp",
        "type": "template",
        "template": {
            "name": "admissionotp",
            "language": {
                "code": "en",
                "policy": "deterministic"
            },
            "namespace": "8c2587cc_a149_4258_a9c6_6a16020def28",
            "to_and_components": [
                {
                    "to": [
                        "919226807651"
                    ],
                    "components": {
                        "body_1": {
                            "type": "text",
                            "value": "1234"
                        },
                        "button_1": {
                            "subtype": "url",
                            "type": "text",
                            "value": "1"
                        }
                    }
                }
            ]
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'authkey: 424907As1fqLFNjqi67ab5048P1',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

?>