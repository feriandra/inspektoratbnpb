<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
	// Penjelasana Role 
	// 0 => Super Admin
	// 1 => User Yang Belum di Verifikasi
	// 2 => User Guest
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth');
	}

	public function index()
	{
		if (!empty($this->session->userdata('logged_in'))) {
			$this->session->set_flashdata('err_msg', 'Anda tidak memiliki akses untuk fitur ini!');
			redirect('');
		}
		$this->render('guest_page/login');
	}

	public function render($content_page)
	{
		$this->load->view('template_page/header_css');
		$this->load->view($content_page);
		$this->load->view('template_page/footer_js');
	}

	public function submit()
	{
		try {
			if ($this->input->method() === 'post') {
				$data = $this->input->post();

				$username = str_replace(' ', '', htmlspecialchars($data['username']));
				$password = str_replace(' ', '', htmlspecialchars($data['password']));

				$guestUser = $this->Auth->get_guest_user($username, $password);
				if (!empty($guestUser) && !empty($guestUser['username']) && !empty($guestUser['password'])) {
					$this->session->set_flashdata('err_msg', 'Akun pengguna sudah ditautkan ke akun lain, gunakan username dan email yang benar!');
					redirect('login');
				}

				$username = $data['username'];
				$password = hash('sha256', $data['password']);
				$user = $this->Auth->get_user($username, $password);
				$dataSession = [];

				if (!empty($user)) {
					$dataSession = [
						'logged_in' 	=> TRUE,
						'user_id'   	=> $user['id'],
						'pegawai_id'   	=> $user['id_pegawai'],
						'username'  	=> $user['username'],
						'nama'  		=> $user['nama'],
						'email'  		=> $user['email'],
						'privillage'  	=> $user['privillage']
					];
				} else if (!empty($guestUser)) {
					$privillage = 2;
					$dataSession = [
						'logged_in' 	=> TRUE,
						'user_id'   	=> NULL,
						'pegawai_id'   	=> $guestUser['id'],
						'username'  	=> explode(' ', $guestUser['nama'])[0],
						'nama'  		=> $guestUser['nama'],
						'email'  		=> $guestUser['nip'],
						'privillage'  	=> $privillage
					];
				}

				if (!empty($dataSession)) {
					if (!empty($user)) {
						if ($user['is_active'] == 0) {
							$this->session->set_flashdata('err_msg', 'Akun masih diverifikasi atau sedang nonaktif, silahkan menghubungi admin untuk informasi lebih lanjut!');
							redirect('login');
						} else if ($user['is_active'] == 2) {
							$this->session->set_flashdata('err_msg', 'Permintaan pembuatan akun anda ditolak, silahkan menghubungi admin untuk informasi lebih lanjut!');
							redirect('login');
						}

						if ($dataSession['privillage'] == 0) {
							$this->session->set_userdata((array)$dataSession);
							$this->session->set_flashdata('succ_msg', 'Berhasil login!');
							redirect('beranda');
						} else if ($dataSession['privillage'] == 1) {
							$this->session->set_userdata((array)$dataSession);
							$this->session->set_flashdata('succ_msg', 'Berhasil login!');
							redirect('beranda');
						} else {
							$this->session->set_flashdata('err_msg', 'Error, hak akses belum didaftarkan pada sistem');
							redirect('login');
						}
					} else if (!empty($guestUser)) {
						if ($dataSession['privillage'] == 2) {
							$this->session->set_userdata((array)$dataSession);
							$this->session->set_flashdata('succ_msg', 'Berhasil login!');
							redirect('beranda');
						} else {
							$this->session->set_flashdata('err_msg', 'Error, hak akses belum didaftarkan pada sistem');
							redirect('login');
						}
					}
				} else {
					if ($dataSession['privillage'] == 2) {
						$this->session->set_flashdata('err_msg', 'Gunakan NIP sebagai password dan username');
						redirect('login');
					} else {
						$this->session->set_flashdata('err_msg', 'Username atau password salah!');
						redirect('login');
					}
				}
			} else {
				$this->session->set_flashdata('err_msg', 'Gunakan form method yang sesuai!');
				redirect('login');
			}
		} catch (Exception $e) {
			$this->session->sess_destroy();
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data pegawai, error ' . $e->getMessage());
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('succ_msg', 'Berhasil keluar dari sistem!');
		redirect('');
	}

	public function reset_password()
	{
		if ($this->input->method() === 'post') {
			$data = $this->input->post();
		} else {
			$this->session->set_flashdata('err_msg', 'Gunakan form method yang sesuai!');
			redirect('login');
		}
	}
}
