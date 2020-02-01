<?php

class Klien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); //Fungsi helper ini adalah untuk mengaktifkan fungsi site_url dan base_url
		$this->load->library('session'); //untuk flash data dari data simpan edit
		$this->load->model('Klien_model'); //LOAD model Klien_model
	}
	public function index()
	{
		// $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		// if (!$data_cache_user = $this->cache->get('nama_file_cachce')) {
		// 	$this->cache->save('tabel_user, $data_user', 15);
		// }
		//BUAT SEBUAH ARRAY tabel_klien dari method ambil_data yang ada di model Klien_model
		$data['tabel_klien'] = $this->Klien_model->ambil_data();
		//MENAMPILKAN VIEW klien_view untuk menampilkan data dari database ke sebuah table
		$this->load->view('admin/file/klien_view', $data); //jangan lupa kirim variabel data tadi ke klien_vie
	}
	public function tambah()
	{
		$this->load->view('admin/file/klien_tambah'); // untuk me LOAD tambah_klien
	}
	public function simpan()
	{
		//sekarang kita ambil semua data pada variabel
		//deklarasi variabelnya dlu ya gaes

		$query = $this->db->query("SELECT max(SUBSTRING(id_klien,4, 3))+1 as newId from tabel_klien where SUBSTRING(id_klien,2, 2)='" . date("y") . "'");
		$nama_klien = $this->input->post('nama_klien');
		$alamat_klien = $this->input->post('alamat_klien');
		$tlp_klien = $this->input->post('tlp_klien');
		$email_klien = $this->input->post('email_klien');

		$data = array(
			'id_klien' => 'C' . date("y") . sprintf("%03d", $query->result()[0]->newId),
			'nama_klien' => $nama_klien, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'alamat_klien' => $alamat_klien,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'tlp_klien' => $tlp_klien,
			'email_klien' => $email_klien,
		);
		$this->Klien_model->simpan_data($data); //kita load model Klien_model kemudian arahkan ke function simpan_data sambil ngirim $data
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
		);
		redirect('admin/klien'); //JIKA kita berhasil akan diaahkan ke tampil data
	}
	//sekarang kita buat sebuag function untuk ambil id yang tadi trus di filter didatabase
	public function edit()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$data['data_edit'] = $this->Klien_model->ambil_data_edit($id);
		$data['tabel_klien'] = $this->Klien_model->ambil_data();
		//SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
		$this->load->view('admin/file/klien_view', $data);
	}
	public function simpan_edit()
	{
		$id_klien = $this->input->post('id_klien'); // id yang di hidden tadi 
		$nama_klien = $this->input->post('nama_klien');
		$alamat_klien = $this->input->post('alamat_klien');
		$tlp_klien = $this->input->post('tlp_klien');
		$email_klien = $this->input->post('email_klien');
		$data = array(
			'nama_klien' => $nama_klien, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'alamat_klien' => $alamat_klien,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'tlp_klien' => $tlp_klien,
			'email_klien' => $email_klien,
		);
		$this->Klien_model->update_data($data, $id_klien);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-primary" role="alert">
												Data successfully update!
										  	 </div>'
		);
		redirect('admin/klien');
	}
	public function hapus()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$this->Klien_model->delete_data($id);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-danger" role="alert">
												Data successfully deleted!
											   </div>'
		);
		redirect('admin/klien'); // mengarahkan kembali 
	}

	public function getAlamatKlien()
	{
		$id = $this->uri->segment(4);
		$data['data_klien'] = $this->Klien_model->ambil_data_edit($id);
		//$this->load->view('admin/ajax/alamat_klien', $data);
		echo $data['data_klien'][0]->alamat_klien;
	}

	public function getNamaKlien()
	{
		$id = $this->input->post('filter');
		$data['data_klien'] = $this->Klien_model->ambil_nama_klien($id);
		//$this->load->view('admin/ajax/alamat_klien', $data);
		$html = "";
		$i = 1;
		foreach ($data['data_klien'] as $data) {
			$html .= "<a href='#' class='clientResult' data-id='" . $data->id_klien . "' >" . $i++ . ". " . $data->nama_klien . "</a></br>";
		}
		echo $html;
	}
}
