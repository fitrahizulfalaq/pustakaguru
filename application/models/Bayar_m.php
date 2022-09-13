<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_m extends CI_Model
{

	function simpan($data)
	{
		$this->db->insert('tb_pembelian', $data);
	}

	function proses($url)
	{
		$data['user_id'] = $this->session->id;
		$data['url'] = $url;
		$data['created'] = date("Ymdhmsi");
		$this->db->insert('tb_riwayat_transaksi', $data);
	}

	public function cek($id)
	{
		$this->db->from('tb_riwayat_transaksi');
		$this->db->where('user_id', $id);
		$this->db->like('created',date("Y-m-d h"));
		$query = $this->db->get();
		return $query;
	}

}
