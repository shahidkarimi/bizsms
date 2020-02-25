<?php
namespace Shahidkarimi\Bizsms\Library;

use Exception;

class Bizsms
{
    protected $username;
    protected $password;
    protected $language = 'English';
    protected $masking;

    // username,pass,text,masking, language,destinationnum
    protected $url = "http://api.bizsms.pk/api-send-branded-sms.aspx";
    protected $debug = false;

    public function __construct($config)
    {
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->masking = $config['masking'];
        $this->debug = $config['debug'];
    }

    public function debug()
    {
        echo "Username: {$this->username}";
        echo "\nPassword: {$this->password}";
        echo "\nMasking: {$this->masking}";
        echo "\nDebug: {$this->debug}";
    }

    public function send($mobileNumber, $smsBody)
    {
        return $this->httpRequest([
            'destinationnum' => $mobileNumber,
            'text' => $smsBody,
        ]);
    }

    public function sendToMany($users, $smsBody)
    {
        foreach ($users as $user) {
            $this->send($user['phohne'], $smsBody);
        }
        return true;
    }

    protected function httpRequest($params)
    {
        if (!isset($params['destinationnum'])) {
            throw new Exception("Destination Number can not be empty.");
        }

        if (!isset($params['text'])) {
            throw new Exception("The SMS body can not be empty.");
        }

        $dataArray = [
            'username' => $this->username,
            'pass' => $this->password,
            'masking' => $this->masking,
            'langudage' => $this->language,
        ];

        $dataArray = array_merge($dataArray, $params);
        $getUrl = $this->url . "?" . http_build_query($dataArray);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $getUrl);
        curl_close($curl);
        return true;
    }
}
