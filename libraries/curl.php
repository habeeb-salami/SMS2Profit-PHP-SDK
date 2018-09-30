<?php

 function curlpostData($url = "https://portal.sms2profit.com/sms-api/?", Array $postData = []) {
        try {
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
            ));          
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            $errorMessage = NULL;
            if (curl_errno($ch)) {
                $isError = true;
                $errorMessage = curl_error($ch);
            }
            curl_close($ch);
            if ($isError) {
                throw new Exception($errorMessage);
            } else {
                return   $response ;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
        //Preparing post parameters
        $postData = [
            'email' =>'sms2profit@mail.com',
            'password' => 'S3cretPassw0rd',
            'message' => 'This is a Test Message from the Curl SDK',
            'sender' => 'SMS2Profit',
            'recipients' => '2348064620491'
        ];
$url = "https://portal.sms2profit.com/sms-api/?";
print_r('<pre>');
print_r(curlpostData($url, $postData));
print_r('</pre>');