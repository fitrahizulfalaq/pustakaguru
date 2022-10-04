<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model("topup_m");
    }

    public function index()
    {
        $transaksi_terakhir = $this->topup_m->cekLastTrans($this->session->id);
		if ($transaksi_terakhir->num_rows() != null ) {
			redirect($transaksi_terakhir->row("url"));
		}

        $data['menu'] = "Top UP Koin";
        $this->templateadmin->load('template/tanpa-buttom', 'topup/menu', $data);
    }

    public function confirm()
    {
        $transaksi_terakhir = $this->topup_m->cekLastTrans($this->session->id);
		if ($transaksi_terakhir->num_rows() != null ) {
			redirect($transaksi_terakhir->row("url"));
		}

        $koin = $this->input->get("coin");
        if ($koin == "10" or $koin == "50" or $koin == "100" or $koin == "150") {
            switch ($koin) {
                case "10":
                    $data['harga'] = "10.000";
                    break;
                case "50":
                    $data['harga'] = "45.000";
                    break;
                case "100":
                    $data['harga'] = "90.000";
                    break;
                case "150":
                    $data['harga'] = "130.000";
                    break;
                default:
                    $this->session->set_flashdata('danger', 'Nominal Koin Tidak Sesuai');
                    redirect("dashboard");
            }
        } else {
            $this->session->set_flashdata('danger', 'Nominal Koin Tidak Sesuai');
            redirect("dashboard");
        }

        $data['koin'] = $koin;
        $data['menu'] = "Konfirmasi Pembayaran";
        $this->templateadmin->load('template/tanpa-buttom', 'topup/konfirmasi', $data);
    }

    public function proses()
    {
        $transaksi_terakhir = $this->topup_m->cekLastTrans($this->session->id);
		if ($transaksi_terakhir->num_rows() != null ) {
			redirect($transaksi_terakhir->row("url"));
		}
		
		$koin = $this->input->get("coin");
        if ($koin == "10" or $koin == "50" or $koin == "100" or $koin == "150") {
            switch ($koin) {
                case "10":
                    $harga = "10000";
                    break;
                case "50":
                    $harga = "45000";
                    break;
                case "100":
                    $harga = "90000";
                    break;
                case "150":
                    $harga = "130000";
                    break;
                default:
                    $this->session->set_flashdata('danger', 'Nominal Koin Tidak Sesuai');
                    redirect("dashboard");
            }
        } else {
            $this->session->set_flashdata('danger', 'Nominal Koin Tidak Sesuai');
            redirect("dashboard");
        }

        
        //Real
		$va           = '1179001231390340'; //get on iPaymu dashboard
        $secret       = '3A523EFD-6476-44B6-AE38-0AA82F94CEEA'; //get on iPaymu dashboard

		//sandbox
		// $va = '0000001231390340';
		// $secret = 'SANDBOXB291D70F-A174-4054-AB38-E7637E83AD0D';

        // $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
        $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode

        $method       = 'POST'; //method

		//Get data from request
		$user_id = $this->session->id;
		$username = $this->session->nama; 
		$buyerPhone = $this->session->hp; 
		$email = $this->session->email;

        //Request Body//
        $body['product']    = ['Pembelian Koin ILTEC'];
        $body['qty']        = ['1'];
        $body['price']      = [$harga];
        $body['buyerName']      = $username;
        $body['buyerPhone']      = $buyerPhone;
        $body['buyerEmail']      = $email;
        $body['expired']      = '55';
        $body['expiredType']      = 'minutes';
        $body['returnUrl']  = base_url("/topup/check");
        $body['cancelUrl']  = base_url("/dashboard");
        $body['notifyUrl']  = base_url("/topup/check");
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
            // test($ret->Data);
            if ($ret->Status == 200) {				
				$this->topup_m->saveTrans($ret->Data);			
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

    public function check()
    {
       //Real
		$va           = '1179001231390340'; //get on iPaymu dashboard
        $secret       = '3A523EFD-6476-44B6-AE38-0AA82F94CEEA'; //get on iPaymu dashboard

		//sandbox
		// $va = '0000001231390340';
		// $secret = 'SANDBOXB291D70F-A174-4054-AB38-E7637E83AD0D';

        // $url          = 'https://sandbox.ipaymu.com/api/v2/transaction'; // for development mode
        $url          = 'https://my.ipaymu.com/api/v2/transaction'; // for production mode

        $method       = 'POST'; //method

		//Get data from request
		$transactionId = $this->input->get("trx_id");

        //Request Body//
        $body['transactionId']    = $transactionId;
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
                $data = $ret->Data;
                if ($data->Status == 1) {
                    $lastPayment = $this->topup_m->cekPayment($data->SessionId);
                    if ($lastPayment->num_rows() == null){
                        // test($data);
                        $this->topup_m->savePayment($data);
                        $this->topup_m->addPoin($this->session->id,$data->Amount);
                        $this->topup_m->sendNotifyBuyProduct($this->session->nama,$data->Amount,"top up");
                        $this->session->set_flashdata('success', 'Saldo Anda Berhasil di Tambahkan');
                    } else {
                        $this->session->set_flashdata('warning', 'Anda telah melakukan pembelian. Anda bisa melalukan Top Up 1 Jam Lagi');
                    }
                    redirect("dashboard");
                } else {
                    $this->session->set_flashdata('warning', 'Silahkan Lanjutkan Pembayaran. Anda bisa Top Up setiap 1 Jam.');
                    redirect("dashboard");
                }				
            } else {
                var_dump($ret);
                die();
            }
            //End Response
        } 
    }
    
    public function beli()
    {
        $produk = $this->input->get("produk");
        $topik = $this->input->get("topik");
        $harga = $this->input->get("harga");
        
        $x = $this->topup_m->cekPaymentProduct($produk,$topik);
        $saldo = $this->fungsi->getSaldo($this->session->id);
        if ($x->num_rows() == null){
            if ($saldo >= $harga){
                $this->topup_m->buyProduct($produk,$topik,$harga);
                $this->session->set_flashdata('success', 'Topik Berhasil Dibeli');
                $this->topup_m->sendNotifyBuyProduct($this->session->nama,$harga,"Pembelian Paket");
            } else {
                $this->session->set_flashdata('warning', 'Saldo kamu kurang');
                redirect("subtema/detail/".$topik);            
            }
            redirect("subtema/detail/".$topik);            
        } else {
            $this->session->set_flashdata('warning', 'Produk Sudah Terbeli');
            redirect("subtema/detail/".$topik);            
        }
        
    }

    public function testWA()
    {
        $this->fungsi->sendWA("081231390341","Testing","dashboard");
    }

    public function konfirmasiWA()
	{	
		$tipe_user = $this->session->tipe_user;		
		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger','Hanya relawan yang bisa menambahkan data');
            redirect();
		}
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[15]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Konfirmasi WA";
			$this->templateadmin->load('template/tanpa-buttom','topup/konfirmasiwa',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
            
            $kalimat = "Terima kasih ".$post['nama']." telah melakukan pemesanan";
            $this->fungsi->sendWA($post['hp'],$kalimat);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di WA');
	        }	
	        redirect("topup/konfirmasiwa");	        	
	    }
	}

    public function riwayat()
	{
		$data['menu'] = "Riwayat Pembelian Materi";
        if ($this->session->tipe_user >= 2) {
            $data['row'] = $this->topup_m->getHistoryTopup();
        } else {
            $data['row'] = $this->topup_m->getHistoryTopup($this->session->id);
        }
		$this->templateadmin->load('template/tanpa-buttom', 'topup/neracaAll', $data);
	}

    public function paymentHistory()
	{
		$data['menu'] = "Riwayat Top UP";
        if ($this->session->tipe_user >= 2) {
            $data['row'] = $this->topup_m->getHistoryPayment();
        } else {
            $data['row'] = $this->topup_m->getHistoryPayment($this->session->id);
        }
		$this->templateadmin->load('template/tanpa-buttom', 'topup/paymentAll', $data);
	}
}

