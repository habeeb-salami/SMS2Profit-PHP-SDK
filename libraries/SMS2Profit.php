<?php

namespace sms2profit\api\client;

class SMS2Profit extends SMS2ProfitAbstract {
	private $url;
    public function __construct($gatewayUrl = "https://portal.sms2profit.com/sms-api/?") {
		$this->url = $gatewayUrl;
        parent::__construct($gatewayUrl);
    }

    public function send($postData = array()) {
        $response = $this-> curlpostData($this->url,$postDatas);//$this->postSocketRequest($postData);
        return $response;
    }
}
