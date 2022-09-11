<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_pertanyaan');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getPertanyaanBelum($id = null)
	{
		$this->db->from('tb_pertanyaan');
		$this->db->where('jawaban', null);
		$query = $this->db->get();
		return $query;
	}

	public function getByPenanya($id = null)
	{
		$this->db->from('tb_pertanyaan');
		if ($id != null) {
			$this->db->where('penanya_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['pertanyaan'] =  $post['pertanyaan'];
		$params['penanya_id'] =  $this->session->id;
		$params['created'] =  date("Y:m:d:h:i:sa");

		$this->db->insert('tb_pertanyaan', $params);
	}

	function jawab($post)
	{
		$params['id'] =  $post['id'];
		$params['jawaban'] =  $post['jawaban'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_pertanyaan', $params);
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_pertanyaan');
	}

}
