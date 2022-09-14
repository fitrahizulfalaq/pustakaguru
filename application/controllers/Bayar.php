<?php
ob_start();

defined('BASEPATH') or exit('No direct script access allowed');

class Bayar extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model("bayar_m");
	}

    public function index()
    {
        $transaksi_terakhir = $this->bayar_m->cek($this->session->id);
		if ($transaksi_terakhir->num_rows() != null ) {
			redirect($transaksi_terakhir->row("url"));
		}
		
		//Real
		// $va           = '1179001231390340'; //get on iPaymu dashboard
        // $secret       = '3A523EFD-6476-44B6-AE38-0AA82F94CEEA'; //get on iPaymu dashboard

		//sandbox
		$va = '0000001231390340';
		$secret = 'SANDBOXB291D70F-A174-4054-AB38-E7637E83AD0D';

        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
        // $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode

        $method       = 'POST'; //method

		//Get data from request
		$user_id = $this->input->get("userid");
		$username = $this->input->get("username"); 
		$buyerPhone = $this->input->get("hp"); 
		$email = $this->input->get("email");
		$status = $this->input->get("status");

        //Request Body//
        $body['product']    = ['Tiket Tiktok'];
        $body['qty']        = ['1'];
        $body['price']      = ['10000'];
        $body['buyerName']      = $username;
        $body['buyerPhone']      = $buyerPhone;
        $body['buyerEmail']      = $email;
        $body['expired']      = '1';
        $body['expiredType']      = 'hours';
        $body['returnUrl']  = base_url()."/bayar/proses?eventid=1&userid=".$user_id."&username=".$username."&email=".$email."&responses=".$status;
        $body['cancelUrl']  = base_url()."/dashboard";
        $body['notifyUrl']  = base_url()."/bayar/proses?eventid=1&userid=".$user_id."&username=".$username."&email=".$email."&responses=".$status;
        $body['referenceId'] = date("Ymdhms"); //your reference id
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
				$this->bayar_m->proses($ret->Data->Url);			
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

    public function proses()
    {
		// Masukkan pembayaran
		$params['event_id'] = $this->input->get("eventid"); 
		$params['user_id'] = $this->input->get("userid"); 
		$params['username'] = $this->input->get("username"); 
		$params['email'] = $this->input->get("email"); 
		$params['invoice'] = $this->input->get("username").date("ymd");
		$params['created'] = date("Y:m:d:h:i:sa");
		$status = $this->input->get("status"); 
		
		if ($params['user_id'] != null & $params['email'] != null & $params['event_id'] != null & $params['username'] != null & $status == "berhasil" or $status == "successful") {
			//cek Apakah sudah ada sebelumnya atau tidak
			if ($this->fungsi->pilihan("tb_pembelian","user_id",$params['user_id'])->num_rows() != null) {
				$this->bayar_m->simpan($params);
			}
			redirect('bayar/berhasil');
		} else {
			$this->session->set_flashdata('warning', 'Harap Lakukan pembayaran terlebih dahulu');
			redirect('dashboard');
		}

    }

	public function berhasil()
    {
		$data['menu'] = "Pembayaran Berhasil";
		$this->templateadmin->load('template/tanpa-buttom','page/bayar/berhasil',$data);
    }

	public function manual()
	{
		$data['menu'] = "Petunjuk Pembayaran Manual";
		$this->templateadmin->load('template/tanpa-buttom','page/bayar/manual',$data);
	}

	public function konfirmasiOnline()
	{
		$data['menu'] = "Petunjuk Pembayaran Otomatis";
		$this->templateadmin->load('template/tanpa-buttom','page/bayar/konfirmasiOnline',$data);
	}
}
