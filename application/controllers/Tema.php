<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model("tema_m");
	}

	public function index()
	{
		// $this->templateadmin->load('template/dashboard','page/beranda',$data);
	}

	public function list()
	{
		$id	= $this->uri->segment(3);
		$data['menu'] = "List Tema Kelas";
		$data['row'] = $this->tema_m->getKelas($id);
		$data['kelas'] = $this->uri->segment(3);
		$this->templateadmin->load('template/detail','tema/list',$data);
	}
	
	// FORM EKSEKUSI
	public function tambah()
	{	
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;
		
		if ($tipe_user != 2) {
			$this->session->set_flashdata('danger','Hanya relawan yang bisa menambahkan data');
		}
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah data tema";
			$this->templateadmin->load('template/detail','tema/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->tema_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Tema berhasil ditambahkan');
	        }	
	        redirect('tema/list/'.$post['kelas']);	        	
	    }
	}

	function hapus()
	{
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$kelas = $this->uri->segment(5);

		//Cek ada yang sudah mengerjakan sebelumnya atau belum
		$cek_done = $this->tema_m->ceksubtema($id)->num_rows();
		if ($cek_done != null) {
			$this->session->set_flashdata('warning', 'Tema ini memiliki beberapa sub-tema. Harap hapus sub-tema terlebih dahulu sebelum menghapus tema.');
			redirect('tema/list/'.$kelas);
		}

		$this->tema_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('tema/list/'.$kelas);
	}
}
