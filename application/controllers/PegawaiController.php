<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiController extends AccessController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai');
		
		if (empty($this->session->userdata('logged_in'))) {
			redirect('');
		}
	}

	public function index()
	{
		$data['title'] = "Pegawai";
		$data['users'] = $this->Pegawai->get_all();
		$this->render('user_page/admin/pegawai/index', $data);
	}

	public function index_form($idPegawai = '')
	{
		$data = [];
		$data['title'] = "Form Pegawai";
		if (!empty($idPegawai)) {
			$dataRawPegawai = $this->Pegawai->get_pegawai_by_id($idPegawai);

			$CnvrtData = json_encode((array)$dataRawPegawai);
			$CnvrtData = preg_replace("/(\r\n|\r|\n)/", "\\n", $CnvrtData);
			$CnvrtData = preg_replace("/\\\\t/", " ", $CnvrtData);
			$data['pegawai'] = json_decode($CnvrtData, true);
		}
		$this->render('user_page/admin/pegawai/form', $data);
	}

	public function submit()
	{
		try {
			$dataReq = $this->input->post();
			$idPegawai = $dataReq['id_pegawai'];
			$data = [
				"nama" => $dataReq['nama'] ?? NULL,
				"unit" => $dataReq['unit'] ?? NULL,
				"nip" => $dataReq['nip'] ?? NULL,
				"jabatan" => $dataReq['jabatan'] ?? NULL,
				"golongan_pangkat" => $dataReq['golongan'] ?? NULL,
				"sertifikasi_jfa" => $dataReq['sertifikasi'] ?? NULL,
				"pengalaman_kerja" => $dataReq['pengalaman'] ?? NULL,
			];

			if (empty($idPegawai)) {
				$this->db->insert('tb_pegawai', $data);

				$this->session->set_flashdata('succ_msg', 'Berhasil menyimpan data pegawai!');
				redirect('admin/pegawai');
			} else {
				$this->db->where(['id' => $idPegawai])->update('tb_pegawai', $data);
				$this->session->set_flashdata('succ_msg', 'Berhasil memperbarui data pegawai!');
				redirect('admin/pegawai');
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data pegawai, error ' . $e->getMessage());
			redirect('admin/pegawai');
		}
	}

	public function delete($idPegawai)
	{
		try {
			$this->db->where('id', $idPegawai)->delete('tb_pegawai');
			$this->session->set_flashdata('succ_msg', 'Berhasil menghapus data pegawai!');
			redirect('admin/pegawai');
		} catch (Exception $e) {
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data pegawai, error ' . $e->getMessage());
			redirect('admin/pegawai');
		}
	}

	public function render($content_page, $data = [])
	{
		$data['akses'] = $this->akses;
		$data['js_script'] = "user_page/admin/pegawai/js_script";
		$this->load->view('template_page_user/header', $data);
		$this->load->view($content_page, $data);
		$this->load->view('template_page_user/footer', $data);
	}
}
