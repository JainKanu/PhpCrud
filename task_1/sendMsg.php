<?php

// define("APIKEY","H2Q46C467NFUX0T40HL3THQ7GLKH82WB");
// define("APISECERET","W2762JG5N2A82F2J");


define("APIKEY","RKDWRXNBEUL24GGTXW3UJS9PPW951N55");
define("APISECERET","8S8HAFKSIM2LVQ2O");
define("PHONE","7888415250");
define("SENDERID","7888415250");
function sendmsg(){
    $url="https://www.way2sms.com/api/v1/sendCampaign";
    $message = urlencode("HI KANU , CHECK MSG");// urlencode your message
    $POSTFIELDS =  'apikey='.APIKEY.'&secret='.APISECERET.'&usetype=stage&phone='.PHONE.'&senderid='.SENDERID."&message=$message";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
    curl_setopt($curl, CURLOPT_POSTFIELDS, $POSTFIELDS);// post data
    // query parameter values must be given without squarebrackets.
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;
}
sendMsg();