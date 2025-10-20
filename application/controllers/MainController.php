<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends AccessController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['pending_user'] = $this->Auth->get_pending_user();

		$this->render('user_page/main/index', $data);
	}

	public function render($content_page, $data = [])
	{
		$data['akses'] = $this->akses;
		$this->load->view('template_page_user/header', $data);
		$this->load->view($content_page, $data);
		$this->load->view('template_page_user/footer', $data);
	}
}
