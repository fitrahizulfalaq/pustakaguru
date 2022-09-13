<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_m extends CI_Model
{

	function simpan($data)
	{
		$this->db->insert('tb_pembelian', $data);
	}

}
