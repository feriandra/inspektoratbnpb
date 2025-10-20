<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokumenController extends AccessController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumen');

		if (empty($this->session->userdata('logged_in'))) {
			redirect('');
		}
	}

	public function index()
	{
		$data['title'] = "Dokumen";
		$data['dokumen'] = $this->Dokumen->get_dokumen_all();
		$this->render('user_page/admin/dokumen/index', $data);
	}

	public function index_form($idDoc = '')
	{
		$data['title'] = "Form Dokumen";

		$list_icons = $this->getIcons();
		if ($list_icons['status'] == 'success') {
			$data['list_icons_fa'] = $list_icons['data'];
		} else {
			$data['list_icons_fa'] = [];
		}

		if (!empty($idDoc)) {
			$dataRawDoc = $this->Dokumen->get_dokumen_by_id($idDoc);

			$CnvrtData = json_encode((array)$dataRawDoc);
			$CnvrtData = preg_replace("/(\r\n|\r|\n)/", "\\n", $CnvrtData);
			$CnvrtData = preg_replace("/\\\\t/", " ", $CnvrtData);
			$data['dokumen'] = json_decode($CnvrtData, true);
		}

		$this->render('user_page/admin/dokumen/form', $data);
	}

	public function submit()
	{
		try {
			$dataReq = $this->input->post();
			$idDocs = $dataReq['id_dokumen'];
			$data = [
				"title" => $dataReq['title_doc'] ?? NULL,
				"body" => $dataReq['desc_doc'] ?? NULL,
				"icon" => $dataReq['icon_doc'] ?? NULL,
				"link" => $dataReq['link_doc'] ?? NULL,
			];

			if (empty($idDocs)) {
				$data['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('tb_dokumen', $data);

				$this->session->set_flashdata('succ_msg', 'Berhasil menyimpan data dokumen!');
				redirect('admin/dokumen');
			} else {
				$data['updated_at'] = date('Y-m-d H:i:s');
				$this->db->where(['id' => $idDocs])->update('tb_dokumen', $data);

				$this->session->set_flashdata('succ_msg', 'Berhasil memperbarui data dokumen!');
				redirect('admin/dokumen');
			}
		} catch (Exception $e) {
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data dokumen, error ' . $e->getMessage());
			redirect('admin/dokumen');
		}
	}

	public function delete($idDokumen)
	{
		try {
			$data['deleted_at'] = date('Y-m-d H:i:s');
			$this->db->where(['id' => $idDocs])->update('tb_dokumen', $data);

			$this->session->set_flashdata('succ_msg', 'Berhasil menghapus data dokumen!');
			redirect('admin/dokumen');
		} catch (Exception $e) {
			$this->session->set_flashdata('err_msg', 'Gagal menyimpan data dokumen, error ' . $e->getMessage());
			redirect('admin/dokumen');
		}
	}

	public function render($content_page, $data = [])
	{
		$data['akses'] = $this->akses;
		$data['js_script'] = "user_page/admin/dokumen/js_script";
		$this->load->view('template_page_user/header', $data);
		$this->load->view($content_page, $data);
		$this->load->view('template_page_user/footer', $data);
	}

	public function getIcons()
	{
		$fa_url = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/refs/heads/master/metadata/icons.json";

		// ambil data dari GitHub
		$json = @file_get_contents($fa_url);
		if ($json === false) {
			return [
				'status' => 'error',
				'message' => 'Gagal mengambil data dari FontAwesome.'
			];
		}

		$icons = json_decode($json, true);

		// filter berdasarkan query string (GET)
		if ($this->input->get('free')) {
			$icons = array_filter($icons, function ($icon) {
				return isset($icon['free']) && $icon['free'] === true;
			});
		}

		// Ambil style dari query param, default 'solid'
		$style = 'solid';
		$icons = array_filter($icons, function ($icon) use ($style) {
			return isset($icon['styles']) && in_array($style, $icon['styles']);
		});

		// mapping hasil
		$result = [];
		foreach ($icons as $key => $icon) {
			$result[] = $key;
		}

		// kirim response
		return [
			'status' => 'success',
			'message' => 'Berhasil mengambil data dari FontAwesome.',
			'data' => $result
		];
	}
}
