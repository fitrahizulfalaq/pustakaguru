<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("pertanyaan_m");


	}

	public function index()
	{
		if ($this->session->tipe_user == "1") {
			redirect("pertanyaan/tambah");
		} else {
			redirect("pertanyaan/list");
		}
	}

	public function tambah()
	{	
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {			
			$data['menu'] = "Ajukan Pertanyaan";
			$data['tanya'] = $this->pertanyaan_m->getByPenanya($this->session->id);
			$this->templateadmin->load('template/detail','pertanyaan/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->pertanyaan_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Pertanyaan berhasil ditambahkan');
	        }	
	        redirect('pertanyaan/tambah');	        	
	    }
	}

	public function list()
	{
		$data['menu'] = "List Pertanyaan";
		$data['tanya'] = $this->pertanyaan_m->getPertanyaanBelum();
		$this->templateadmin->load('template/detail','pertanyaan/list',$data);
	}

	public function semua()
	{
		$data['menu'] = "Semua Pertanyaan";
		$data['tanya'] = $this->pertanyaan_m->get();
		$this->templateadmin->load('template/detail','pertanyaan/list',$data);
	}

	public function jawab($id)
	{	
		if ($this->session->tipe_user != 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menjawab');
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('jawaban', 'jawaban', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {			
			$query = $this->pertanyaan_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
            	$data['menu'] = "Jawab Pertanyaan";           
                $this->templateadmin->load('template/detail','pertanyaan/jawab',$data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');</script>";
                echo "<script>window.location='".site_url('pertanyaan/list')."';</script>";
            }
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->pertanyaan_m->jawab($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Pertanyaan berhasil dijawab');
	        }	
	        redirect('pertanyaan/list');	        	
	    }		
	}

	public function detail()
	{
		$id	= $this->uri->segment(3);

		$data['menu'] = "Detail Pertanyaan";
		$data['row'] = $this->pertanyaan_m->get($id)->row();
		$this->templateadmin->load('template/detail', 'pertanyaan/detail', $data);
	}

	function hapus()
	{
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);

		$this->pertanyaan_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('pertanyaan/semua/');
	}



}
