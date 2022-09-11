<?php
ob_start();

defined('BASEPATH') or exit('No direct script access allowed');

class Bayar extends CI_Controller
{

    public function index()
    {
        $va           = '1179001231390340'; //get on iPaymu dashboard
        $secret       = '3A523EFD-6476-44B6-AE38-0AA82F94CEEA'; //get on iPaymu dashboard

        // $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
        $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode

        $method       = 'POST'; //method

        //Request Body//
        $body['product']    = ['Tiket Tiktok'];
        $body['qty']        = ['1'];
        $body['price']      = ['10000'];
        $body['returnUrl']  = base_url("bayar/berhasil/");
        $body['cancelUrl']  = base_url("profil");
        $body['notifyUrl']  = base_url("dashboard");
        $body['referenceId'] = $this->session->username." | ".date("d-m-y"); //your reference id
        //End Request Body//

        //Generate Signature
        // *Don't change this
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
        $signature    = hash_hmac('sha256', $stringToSign, $secret);
        $timestamp    = Date('YmdHis');
        //End Generate Signature


        $ch = curl_init($url);

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'va: ' . $va,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp
        );

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, count($body));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $err = curl_error($ch);
        $ret = curl_exec($ch);
        curl_close($ch);

        if ($err) {
            echo $err;
        } else {

            //Response
            $ret = json_decode($ret);
            if ($ret->Status == 200) {
                $sessionId  = $ret->Data->SessionID;
                $url        =  $ret->Data->Url;
                header('Location:' . $url);
            } else {
                var_dump($ret);
                die();
            }
            //End Response
        }
    }

    public function berhasil()
    {
		$data['menu'] = "Menu Utama";
		$this->templateadmin->load('template/dashboard','page/berhasil',$data);
    }
}
