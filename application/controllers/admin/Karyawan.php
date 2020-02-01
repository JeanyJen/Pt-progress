<?php

class Karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); //Fungsi helper ini adalah untuk mengaktifkan fungsi site_url dan base_url
		$this->load->library('session'); //untuk flash data dari data simpan edit
		$this->load->model('Karyawan_model'); //LOAD model Karyawan_model
	}

	public function index()
	{
		//BUAT SEBUAH ARRAY tabel_karyawan dari method ambil_data yang ada di model Karyawan_model
		$data['tabel_karyawan'] = $this->Karyawan_model->ambil_data();
		//MENAMPILKAN VIEW karyawan_view untuk menampilkan data dari database ke sebuah table

		$this->load->view('admin/file/karyawan_view', $data); //jangan lupa kirim variabel data tadi ke karyawan_view

	}

	// public function tambah()
	// {
	// 	$this->load->view('admin/file/karyawan_tambah'); // untuk me LOAD tambah_karyawan
	// }

	public function simpan()
	{
		//sekarang kita ambil semua data pada variabel
		//deklarasi variabelnya dlu ya gaes
		$query = $this->db->query("SELECT max(SUBSTRING(nip_karyawan,6, 3))+1 as newId from tabel_karyawan where SUBSTRING(nip_karyawan,2, 4)='" . date("ym") . "'");

		$nama_karyawan = $this->input->post('nama_karyawan');
		$bagian_karyawan = $this->input->post('bagian_karyawan');
		$jabatan_karyawan = $this->input->post('jabatan_karyawan');
		$tgl_msk_karyawan = $this->input->post('tgl_msk_karyawan');

		//sesuaikan dengan name yang ada di karyawan_tambah

		$data = array(
			'nip_karyawan' => 'N' . date("ym") . sprintf("%03d", $query->result()[0]->newId),
			'nama_karyawan' => $nama_karyawan, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'bagian_karyawan' => $bagian_karyawan,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'jabatan_karyawan' => $jabatan_karyawan,
			'tgl_msk_karyawan' => $tgl_msk_karyawan,

		);
		$this->Karyawan_model->simpan_data($data); //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
		);
		redirect('admin/karyawan'); //JIKA kita berhasil akan diaahkan ke tampil data
	}

	//sekarang kita buat sebuag function untuk ambil id yang tadi trus di filter didatabase
	public function edit()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$data['data_edit'] = $this->Karyawan_model->ambil_data_edit($id);
		$data['tabel_karyawan'] = $this->Karyawan_model->ambil_data();


		//SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
		$this->load->view('admin/file/karyawan_view', $data);
	}

	public function simpan_edit()
	{
		$nip_karyawan = $this->input->post('nip_karyawan'); // id yang di hidden tadi 
		$nama_karyawan = $this->input->post('nama_karyawan');
		$bagian_karyawan = $this->input->post('bagian_karyawan');
		$jabatan_karyawan = $this->input->post('jabatan_karyawan');
		$tgl_msk_karyawan = $this->input->post('tgl_msk_karyawan');


		$data = array(
			'nama_karyawan' => $nama_karyawan, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'bagian_karyawan' => $bagian_karyawan,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'jabatan_karyawan' => $jabatan_karyawan,
			'tgl_msk_karyawan' => $tgl_msk_karyawan,
		);

		$this->Karyawan_model->update_data($data, $nip_karyawan);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-primary" role="alert">
												Data successfully update!
										  	 </div>'
		);
		redirect('admin/karyawan');
	}

	public function hapus()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$this->Karyawan_model->delete_data($id);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-danger" role="alert">
												Data successfully deleted!
											   </div>'
		);
		redirect('admin/karyawan'); // mengarahkan kembali 
	}
}
