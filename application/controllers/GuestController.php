<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuestController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai');
		$this->load->model('Dokumen');
	}

	public function index()
	{
		$data['video_yt'] = $this->scrapping_yt_bnpb();
		$data['dokumen'] = $this->Dokumen->get_dokumen_all();
		// echo json_encode($data['video_yt']);die;
		$this->render('guest_page/homepage', $data);
	}

	public function galeri()
	{
		$this->render('guest_page/homepage');
	}

	public function struktur_organisasi()
	{
		$this->render('guest_page/struktur-organisasi');
	}

	public function render($content_page, $data = [])
	{
		$this->load->view('template_page/header_css');
		$this->load->view('template_page/header');
		$this->load->view($content_page, $data);
		$this->load->view('template_page/footer');
		$this->load->view('template_page/footer_js');
	}

	public function scrapping_yt_bnpb()
	{
		$url = "https://www.youtube.com/@bnpb_indonesia/videos";

		// Ambil HTML
		$html = $this->curl_get_contents($url);

		if (!$html) {
			die("Gagal ambil data.");
		}

		// Cari JSON ytInitialData
		if (preg_match('/var ytInitialData = (.*?);<\/script>/', $html, $matches)) {
			$json = json_decode($matches[1], true);

			if (!$json) {
				die("Gagal decode JSON.");
			}

			$videos = [];

			// Ambil konten video
			$contents = $json['contents']['twoColumnBrowseResultsRenderer']['tabs'][1]['tabRenderer']['content']['richGridRenderer']['contents'] ?? [];

			foreach ($contents as $item) {
				// Pastikan ini video
				if (isset($item['richItemRenderer']['content']['videoRenderer'])) {
					$video = $item['richItemRenderer']['content']['videoRenderer'];

					$videoId   = $video['videoId'] ?? '';
					$title     = $video['title']['runs'][0]['text'] ?? '';
					$thumbnail = $video['thumbnail']['thumbnails'][3]['url'] ?? '';
					$link      = "https://www.youtube.com/watch?v=" . $videoId;

					$videos[] = [
						'id'        => $videoId,
						'title'     => $title,
						'thumbnail' => $thumbnail,
						'url'       => $link
					];

					if (count($videos) >= 6) break; // ambil 6 video
				}
			}

			// Output JSON
			return $videos;
		} else {
			die("Tidak menemukan ytInitialData.");
		}
	}

	private function curl_get_contents($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}
