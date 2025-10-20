<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ErrorController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function error_404()
	{
		$data['msg'] = '
			<div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up">
				<h1 class="display-4 fw-bold text-primary">Oops! Halaman tidak ditemukan</h1>
				<p class="lead text-muted mt-3">
					Sepertinya halaman yang kamu cari tidak tersedia.<br>
					Coba periksa kembali URL atau kembali ke beranda.
				</p>
				
				<div class="mt-4">
					<a href="' . base_url('') . '" class="btn btn-primary btn-lg px-4 me-2">
						Kembali ke Beranda
					</a>
				</div>
			</div>
		';
		$this->render('errors/error_page', $data);
	}

	public function error_500()
	{
		$data['msg'] = '
			<div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up">
				<h1 class="display-4 fw-bold text-danger">500 - Kesalahan Server</h1>
				<p class="lead text-muted mt-3">
					Maaf, terjadi masalah pada server kami.<br>
					Tim teknis sudah mendapatkan laporan dan sedang memperbaikinya.
				</p>
				
				<div class="mt-4">
					<a href="' . base_url('') . '" class="btn btn-primary btn-lg px-4 me-2">
						Kembali ke Beranda
					</a>
				</div>
			</div>
		';
		$this->render('errors/error_page', $data);
	}

	public function render($content_page, $data = [])
	{
		$this->load->view('template_page/header_css');
		$this->load->view('template_page/header');
		$this->load->view($content_page, $data);
		$this->load->view('template_page/footer');
		$this->load->view('template_page/footer_js');
	}
}
