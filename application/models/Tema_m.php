<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tema_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_tema');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('deskripsi', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getKelas($id = null)
	{
		$this->db->from('tb_tema');
		if ($id != null) {
			$this->db->where('kelas', $id);
		}
		$this->db->order_by('deskripsi', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function ceksubtema($id = null)
	{
		$this->db->from('tb_subtema');
		if ($id != null) {
			$this->db->where('tema_id', $id);
		}
		$this->db->order_by('deskripsi', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['kelas'] =  $post['kelas'];
		$params['deskripsi'] =  $post['deskripsi'];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$this->db->insert('tb_tema', $params);
	}

	function hapus($id)
	{
		$this->db->where('tema_id', $id);
		$this->db->delete('tb_subtema');
		
		$this->db->where('id', $id);
		$this->db->delete('tb_tema');
	}	
}
