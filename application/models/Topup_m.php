<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topup_m extends CI_Model
{

	public function cekLastTrans($id)
	{
		$this->db->from('tb_transaksi');
		$this->db->where('user_id', $id);
		$this->db->like('created',date("Y-m-d h"));
		$query = $this->db->get();
		return $query;
	}

	public function getHistoryTopup($id = null)
	{
		$this->db->from('tb_neraca');
		if ($id != null) {
			$this->db->where("user_id",$id);
		}
		$this->db->where("tipe","debit");
		$this->db->order_by("created","DESC");
		$query = $this->db->get();
		return $query;
	}

	public function getHistoryPayment($id = null)
	{
		$this->db->from('tb_pembayaran');
		if ($id != null) {
			$this->db->where("user_id",$id);
		}
		$this->db->order_by("SuccessDate","DESC");
		$query = $this->db->get();
		return $query;
	}
    
    function saveTrans($x)
	{
		$data['user_id'] = $this->session->id;
		$data['email'] = $this->session->email;
		$data['url'] = $x->Url;
		$data['SessionId'] = $x->SessionID;
		$data['created'] = date("Ymdhmsi");
		$kalimat = "Terima kasih telah melakukan pemesanan. Silahkan lakukan pembayaran melalui ".$x->Url."\n\nSalam Hangat dari Kami, *ILTEC APPS* \nProvided by *Bikin Karya Creative Media* \n https://bikinkarya.com";
		$this->fungsi->sendWA($this->session->hp,$kalimat);

		$this->db->insert('tb_transaksi', $data);
	}

    function savePayment($url)
	{
		$data['user_id'] = $this->session->id;
		$data['email'] = $this->session->email;
		$data['TransactionId'] = $url->TransactionId;
		$data['SessionId'] = $url->SessionId;
		$data['Amount'] = $url->Amount;
		$data['TypeDesc'] = $url->TypeDesc;
		$data['CreatedDate'] = $url->CreatedDate;
		$data['SuccessDate'] = $url->SuccessDate;
		$data['PaymentChannel'] = $url->PaymentChannel;
		$this->db->insert('tb_pembayaran', $data);
	}

    public function cekPayment($id)
	{
		$this->db->from('tb_pembayaran');
		$this->db->where('SessionId', $id);
		$query = $this->db->get();
		return $query;
	}

    public function addPoin($id,$amount)
	{
		//nilai koin sesuai jumlah
        if ($amount == "10000" or $amount == "45000" or $amount == "90000" or $amount == "130000") {
            switch ($amount) {
                case "10000":
                    $koin = "10";
                    break;
                case "45000":
                    $koin = "50";
                    break;
                case "90000":
                    $koin = "100";
                    break;
                case "130000":
                    $koin = "150";
                    break;
                default:
                    $this->session->set_flashdata('danger', 'Nominal amount Tidak Sesuai');
                    redirect("dashboard");
            }
        }

        $data['user_id'] = $id;
		$data['tipe'] = "debit";
		$data['poin'] = $koin;
		$data['keterangan'] = "topup";
		$data['created'] = date("Ymdhmsi");
		$this->db->insert('tb_neraca', $data);
	}
	
	public function cekPaymentProduct($produk,$topik)
	{
		$this->db->from('tb_neraca');
		$this->db->where('user_id', $this->session->id);
		$this->db->where('keterangan', $produk.$topik);
		$query = $this->db->get();
		return $query;
	}
	
	function buyProduct($produk,$topik,$harga)
	{
		$data['user_id'] = $this->session->id;
		$data['tipe'] = "kredit";
		$data['poin'] = $harga;
		$data['keterangan'] = $produk.$topik;
		$data['created'] = date("Ymdhmsi");
		$this->db->insert('tb_neraca', $data);
	}

	function sendNotifyBuyProduct($nama = null, $harga = null, $keperluan = null)
	{
		$kalimat = "*Terima kasih*, ".$nama.". \n Anda telah melakukan ".$keperluan." sebanyak ".$harga.". \n Sisa saldo poin kamu sebanyak ".$this->fungsi->getSaldo($this->session->id).". \n \n Salam hangat dari kami, *ILTEC APPS* \n Provided by *Bikinkarya Creative Media* \n https://bikinkarya.com.";
		
		$this->fungsi->sendWA($this->session->hp,$kalimat);

	}
}
