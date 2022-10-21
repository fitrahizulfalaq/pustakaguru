<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendaftaran_m');
        $this->load->library("wa");
	}

	// LOAD DATA AJA
	public function index()
	{
		check_not_login();
		redirect('auth/login');
	}

    public function landing()
	{
		check_not_login();
		$data['menu'] = "Aktivasi Berhasil";
		$this->templateadmin->load('template/tanpa-buttom','promo/landing',$data);
	}

	// FORM EKSEKUSI
	public function tryoutgratis()
	{
		check_already_login();
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|is_unique[tb_user.username]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_user.email]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[3]|is_unique[tb_user.hp]|max_length[20]|alpha_dash');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Aktivasi Akun Tryout PPPK Gratis";
			$this->templateadmin->load('template/umum', 'promo/tryout1', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->pendaftaran_m->simpan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil, Sekarang anda bisa login menggunakan email dan password 4 angka belakang nomor anda');
				
				$kalimat = "Terima kasih, *".$post['nama']."*. Anda telah melakukan aktivasi Tryout Gratis.\n \n"."Informasi jadwal akan disampaikan melalui laman resmi https://pustakaguru.id dan grup WA.\n\nSalam Hangat dari Kami, *Komunitas Guru Indonesia*\nPesan otomatis ini dikelola oleh https://bikinkarya.com";
				$this->wa->waWhacenter($post['hp'],$kalimat);
			}

			//Setelah mendaftar langsung login ke Platform
			$data = $this->pendaftaran_m->getByEmail($post['email'])->row();
			$params = array(
				'id' => $data->id,
				'username' => $data->username,
				'nama' => $data->nama,
				'email' => $data->email,
				'hp' => $data->hp,
				'tempat_lahir' => $data->tempat_lahir,
				'tanggal_lahir' => $data->tanggal_lahir,
				'tipe_user' => $data->tipe_user,
				'date_now' => date('Y:m:d H:i:s'),
			);
			$this->session->set_userdata($params);
			redirect('promo/landing');
		}
	}


	
}
