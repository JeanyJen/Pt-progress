<?php

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		// load view admin/overview.php
		$this->load->view("admin/overview");
	}

	// public function overview_media()
	// {
	// 	//BUAT SEBUAH ARRAY tabel_media dari method ambil_data yang ada di model Media_model
	// 	$data['tabel_media'] = $this->overview_m->jumlah_media();
	// 	//MENAMPILKAN VIEW media_view untuk menampilkan data dari database ke sebuah table
	// 	$this->load->view('admin/overview', $data); //jangan lupa kirim variabel data tadi ke media_view
	// }
}
