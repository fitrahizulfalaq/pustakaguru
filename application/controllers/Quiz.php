<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('quiz_m');
		//Agar tidak ada form resubmission
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
	}

	public function index()
	{
		redirect("");
	}

	public function startQUiz()
	{
		$id = $this->uri->segment(3);

		//Cek Penilaian
		$cek_penilaian = $this->quiz_m->cekHaveDone($this->session->id,$id)->num_rows();
        if ($cek_penilaian != null) {
            $this->session->set_flashdata('warning','Hanya bisa mengisi 1 kali');
            redirect('quiz/viewResult/'.$id);
        }

		$this->load->library('form_validation');
        $data['row'] = $this->quiz_m->getSoalBySubtema($id);
        $data['menu'] = "Selamat Mengerjakan Quiz";            
        $this->templateadmin->load('template/tanpa-buttom','quiz/lembar_kerja',$data);
	}

	public function quizResult()
	{
		$post = $this->input->post(null, TRUE);

		if ($post == null ) {
		    redirect('quiz','refresh');
		}

		$jumlah = $post["jumlah"];
		$subtema_id = $post["subtema_id"];
		$pilihan = $post["pilihan"];
		$id_soal = $post["id"];        
		$user_id = $this->session->id;        
		            
		$score = 0;
		$benar = 0;
		$salah = 0;
		$kosong = 0;

		for ($i=0; $i < $jumlah; $i++) { 
		    $nomor = $id_soal[$i];

		    if (empty($pilihan[$nomor])) {
		        $kosong++;
		    } else {
		        // $jawaban = $pilihan[$nomor];
		        $jawaban = substr($pilihan[$nomor], 1);
		        $pil_jawaban = substr($pilihan[$nomor], 0, 1);

		        //Input Riwayat Jawaban di DB
		        $jawaban_rows = $this->fungsi->hitung_rows_multiple("tb_riwayat_jawaban","user_id",$this->session->id,"soal_id",$nomor);
		        if ($jawaban_rows == null ) {
		            $this->quiz_m->simpan_riwayat_jawaban($this->session->id,$nomor,$subtema_id,$pil_jawaban);
		        }

		        //Cocokkan dengan jawaban di db
		        $this->db->where("id",$nomor);
		        $this->db->where("kunci",$jawaban);
		        $cek = $this->db->get("tb_soal")->num_rows();

		        if ($cek) {
		            $benar++;
		        } else {
		            $salah++;
		        }               
		    }

		}

		//Rata-rata
		$score = 100 / $jumlah * $benar;
		$hasil = number_format($score, 0);
		
		if ($hasil < 80 ) {
		    $pesan = "danger";
		    $status = "Maaf kamu belum lulus, jangan patah semangat ya..";          
		} else {
		    $pesan = "success";
		    $status = "Yey, kamu berhasil, selamat ya...";
		}

		$this->session->set_flashdata($pesan,'Skor kamu '.$hasil."<br><h4>".$status."</h4>");

		// Simpan Hasil Di DB
		$penilaian_rows = $this->quiz_m->cekHaveDone($this->session->id,$subtema_id)->num_rows();
		if ($penilaian_rows == null ) {
			$this->quiz_m->simpan_penilaian($this->session->id,$subtema_id,$hasil,$benar,$salah,$kosong);
		}
		

		redirect("quiz/viewResult/".$subtema_id);
		// $data["jumlah_soal"]    = $jumlah;
		// $data["benar"]  = $benar;
		// $data["salah"]  = $salah;
		// $data["hasil"]  = $hasil;
		// $data["kosong"] = $kosong;
		// $data["status"] = $status;
		// $data["subtema_id"]  = $subtema_id;
		// $data['menu'] = "Hasil";

		// $this->templateadmin->load('template/tanpa-buttom','quiz/hasil',$data);
	}

	public function viewResult()
	{
		$id = $this->uri->segment(3);
		$data['menu'] = "Hasil Skor Kamu";
		$data['hasil'] = $this->quiz_m->getNilai($this->session->id,$id)->row('skor');
		$data['benar'] = $this->quiz_m->getNilai($this->session->id,$id)->row('benar');
		$data['salah'] = $this->quiz_m->getNilai($this->session->id,$id)->row('salah');
		$data['kosong'] = $this->quiz_m->getNilai($this->session->id,$id)->row('kosong');
		$data['jumlah_soal'] = $this->quiz_m->getSoalBySUbtema($this->uri->segment(3))->num_rows();
		$this->templateadmin->load('template/tanpa-buttom','quiz/hasil',$data);
	}

}
