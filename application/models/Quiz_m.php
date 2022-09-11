<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_m extends CI_Model {
		
	public function setCharacter($char)
	{
	  $params['id'] =  $this->session->id;
	  $params['foto'] =  "Picture".$char.".jpg";

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_siswa',$params);	
	}

	public function getSoalBySubtema($id = null) 
	{
		$this->db->from('tb_soal');
		if ($id != null) {
			$this->db->where('subtema_id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function getSoal($id = null) 
	{
		$this->db->from('tb_soal');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function cekHaveDone($user_id = null, $subtema_id = null) 
	{
		$this->db->from('tb_penilaian');
		if ($user_id != null) {
			$this->db->where('user_id',$user_id);
			$this->db->where('subtema_id',$subtema_id);
		}

		$query = $this->db->get();
		return $query;
	}


	function simpan_riwayat_jawaban($user_id,$soal_id,$subtema_id,$jawaban)
	{
	  $params['id'] =  "";
	    $params['user_id'] =  $user_id;
	    $params['soal_id'] =  $soal_id;
	    $params['subtema_id'] =  $subtema_id;
	    $params['jawaban'] =  $jawaban;

	  $this->db->insert('tb_riwayat_jawaban',$params);
	}

  function simpan_penilaian($user_id,$subtema_id,$skor,$benar,$salah,$kosong)
  {
    $params['id'] =  "";
    $params['user_id'] =  $user_id;
    $params['subtema_id'] =  $subtema_id;
    $params['skor'] =  $skor;
    $params['benar'] =  $benar;
    $params['salah'] =  $salah;
    $params['kosong'] =  $kosong;

    $this->db->insert('tb_penilaian',$params);
  }

  public function getNilai($id = null, $subtema_id = null) 
  {
    $this->db->from('tb_penilaian');
    if ($id != null) {
      $this->db->where('user_id',$id);
      $this->db->where('subtema_id',$subtema_id);
    }
    $query = $this->db->get();
    return $query;
  }



}
