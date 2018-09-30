<?php

namespace sms2profit\api\client;

class SMS2ProfitAbstract {

    private $smsGateway;

    const BROWSER = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

    public function __construct($gatewayLink = '') {
        $this->smsGateway = 'https://portal.sms2profit.com/sms-api/';
    }

    protected function sendMessage($postData = array()) {
        $result = $this->callGateway($postData);
        return $result;
    }

    protected function getBalance($apiUrl, $posData) {
        $this->smsGateway = $apiUrl;
        $result = $this->callGateway($this->smsGateway, $posData);
        return $result;
    }

    protected function getMessageReport($apiUrl, $messageId) {
        $this->smsGateway = $apiUrl;
        $result = $this->callGateway($this->smsGateway, $messageId);
        return $result;
    }

    protected function postSocketRequest($data, $referer = '') {
        $url = 'https://portal.sms2profit.com/sms-api/?';
        $data = http_build_query($data);
        $url = parse_url($url);
        $host = $url['host'];
        $path = $url['path'] . '?';
        $fp = fsockopen($host, 80, $errno, $errstr, 30);
        if ($fp) {
            fputs($fp, "POST $path HTTP/1.1\r\n");
            fputs($fp, "Host: $host\r\n");
            if ($referer != '')
                fputs($fp, "Referer: $referer\r\n");
            fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
            fputs($fp, "Content-length: " . strlen($data) . "\r\n");
            fputs($fp, "Connection: close\r\n\r\n");
            fputs($fp, $data);
            $result = '';
            while (!feof($fp)) {
                $result .= fgets($fp, 128);
            }
        } else {
            return array('status' => 'err', 'error' => "$errstr ($errno)");
        }
        fclose($fp);
        $result = explode("\r\n\r\n", $result, 2);
        $header = isset($result[0]) ? $result[0] : '';
        $content = isset($result[1]) ? $result[1] : '';
        return array('status' => 'ok', 'header' => $header, 'content' => $content);
    }
 protected function curlpostData($url = "https://portal.sms2profit.com/sms-api/?", Array $postData = []) {
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
      
}
