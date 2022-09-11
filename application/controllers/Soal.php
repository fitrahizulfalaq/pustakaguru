<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('soal_m');
	}

	public function index()
	{	
		$this->load->library("form_validation");

		$data['menu'] = "Data soal";
		$data['previllage'] = 1;
		$data['row'] = $this->soal_m->get();
		$this->templateadmin->load('template/dashboard','soal/soal_data',$data);
	}

	public function data()
	{	
		$id = $this->uri->segment(3);

		$data['menu'] = "Data Soal";
		$data['id'] = $id;
		$data['tanya'] = $this->soal_m->getBySubtema($id);
		$this->templateadmin->load('template/detail','soal/list',$data);
	}

	public function tambah()
	{
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;

		if ($tipe_user != 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menambahkan data');
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|is_unique[tb_tema.deskripsi]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$id	= $this->uri->segment(3);
			$this->load->model("subtema_m");

			$data['menu'] = "Tambah Soal";
			$data['keterangan'] = $this->subtema_m->get($id)->row();
			$this->templateadmin->load('template/detail', 'soal/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->soal_m->simpan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Soal berhasil ditambahkan');
			}
			redirect('soal/data/' . $post['id']);
		}
	}

	function hapus()
	{
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$subtema = $this->uri->segment(5);

		//Cek ada yang sudah mengerjakan sebelumnya atau belum
		$cek_done = $this->soal_m->cekdone($id)->num_rows();
		if ($cek_done != null) {
			$this->session->set_flashdata('warning', 'Sudah ada user yang mengerjakan soal, penghapusan soal akan mengakibatkan nilai tidak akurat');
			redirect('soal/data/'.$subtema);
		}

		$this->soal_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('soal/data/'.$subtema);
	}
	
		
}
