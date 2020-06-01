<?php

namespace App\Http\Controllers\Checker;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailChecker extends Controller
{
    protected $key;
    protected $email;
    protected $checker;

    public function __construct($checker, $key)
    {
        //set checker
        $this->checker = $checker;
        // set the api key and email to be validated
        $this->key = $key;
//        $this->email = urlencode($email);
    }

    public function check($email)
    {
        if($this->checker == 'bulkemailchecker') {
            $this->email = urlencode($email);
// use curl to make the request
            $url = 'http://api-v4.bulkemailchecker2.com/?key=' . $this->key . '&email=' . $this->email;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            $response = curl_exec($ch);
            curl_close($ch);

// decode the json response
            $json = json_decode($response, true);

// if address is failed, alert the user they entered an invalid email
//        if ($json['status'] == 'failed') {
// send alert
//            return 'invalid';
//        } else {
            return $json;
//        }

        } else if($this->checker == 'emaillistverify'){

            $url = "https://app.emaillistverify.com/api/verifEmail?secret=".$this->key."&email=".$email;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }
    }
}
