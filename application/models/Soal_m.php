<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_soal');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getBySubtema($id = null)
	{
		$this->db->from('tb_soal');
		if ($id != null) {
			$this->db->where('subtema_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function cekDone($id = null)
	{
		$this->db->from('tb_riwayat_jawaban');
		if ($id != null) {
			$this->db->where('soal_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{

		$params['id'] =  "";
		$params['subtema_id'] =  $post['id'];
		$params['soal'] =  $post['soal'];
		$params['pil_a'] =  $post['pil_a'];
		$params['pil_b'] =  $post['pil_b'];
		$params['pil_c'] =  $post['pil_c'];
		$params['pil_d'] =  $post['pil_d'];
		$params['pil_e'] =  $post['pil_e'];
		$jawaban = $post["kunci"];
		$params['kunci'] =  $post[$jawaban];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$params['pembuat'] = $this->session->id;

		$this->db->insert('tb_soal', $params);
	}

	function hapus($id)
	{
		$this->db->where('soal_id', $id);
		$this->db->delete('tb_riwayat_jawaban');

		$this->db->where('id', $id);
		$this->db->delete('tb_soal');
	}

	function update($post)
	{

		$params['id'] =  $post['id'];
		$params['soal'] =  $post['soal'];
		$params['pil_a'] =  $post['pil_a'];
		$params['pil_b'] =  $post['pil_b'];
		$params['pil_c'] =  $post['pil_c'];
		$params['pil_d'] =  $post['pil_d'];
		$params['pil_e'] =  null;
		$jawaban = $post["kunci"];
		$params['kunci'] =  $post[$jawaban];
		$params['pembahasan'] =  $post['pembahasan'];
		$params['durasi'] =  $post['durasi'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_soal', $params);
	}
}
