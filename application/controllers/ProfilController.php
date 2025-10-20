<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilController extends AccessController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai');
		$this->load->model('Auth');

		if (empty($this->session->userdata('logged_in'))) {
			redirect('');
		}
	}

	public function index()
	{
		$data['title'] = "Profil";
		$idUser = $this->session->userdata('pegawai_id');
		$data['pegawai'] = $this->Pegawai->get_pegawai_by_id($idUser);
		$data['user'] = $this->Auth->get_user_by_id_pegawai($idUser);

		$this->render('user_page/main/profil', $data);
	}

	public function submit()
	{
		try {
			$dataReq = $this->input->post();

			$id_user = $dataReq['id_user'];
			$idPegawai = $dataReq['id_pegawai'];
			$hashedPassword = (!empty($dataReq['pass']) ? hash('sha256', $dataReq['pass']) : NULL);
			$data = [
				"id_pegawai" => $idPegawai ?? NULL,
				"username" => $dataReq['username'] ?? NULL,
				"nama" => $dataReq['nama'] ?? NULL,
				"password" => $hashedPassword,
				"email" => $dataReq['email'] ?? NULL,
				"privillage" => 1
			];

			$dataUser = $this->Auth->get_user_by_username($data['username']);
			
			if (!empty($dataUser)) {
				$this->session->set_flashdata('err_msg', 'Username sudah digunakan!');
				redirect('account-profil');
			}

			if (empty($id_user)) {
				$data['is_active'] = 0;

				$this->db->insert('tb_user', $data);
				$this->session->set_flashdata('succ_msg', 'Berhasil menyimpan data pengguna!');
				redirect('account-profil');
			} else {
				$this->db->where(['id' => $id_user])->update('tb_user', $data);
				$this->session->set_flashdata('succ_msg', 'Berhasil memperbarui data pengguna!');
				redirect('account-profil');
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data pengguna, error ' . $e->getMessage());
			redirect('account-profil');
		}
	}

	public function render($content_page, $data = [])
	{
		$data['akses'] = $this->akses;
		$data['js_script'] = "user_page/main/js_script";
		$this->load->view('template_page_user/header', $data);
		$this->load->view($content_page, $data);
		$this->load->view('template_page_user/footer', $data);
	}
}
