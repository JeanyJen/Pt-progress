<?php

class Media extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); //Fungsi helper ini adalah untuk mengaktifkan fungsi site_url dan base_url
		$this->load->library('session'); //untuk flash data dari data simpan edit
		$this->load->model('Media_model'); //LOAD model Media_model
	}

	public function index()
	{
		//BUAT SEBUAH ARRAY tabel_media dari method ambil_data yang ada di model Media_model
		$data['tabel_media'] = $this->Media_model->ambil_data();
		//MENAMPILKAN VIEW media_view untuk menampilkan data dari database ke sebuah table
		$this->load->view('admin/file/media_view', $data); //jangan lupa kirim variabel data tadi ke media_view
	}




	public function terserah()
	{
		//BUAT SEBUAH ARRAY tabel_media dari method ambil_data yang ada di model Media_model
		$data['tabel_media'] = $this->Media_model->ambil_data();
		//MENAMPILKAN VIEW media_view untuk menampilkan data dari database ke sebuah table
		$this->load->view('admin/file/media_view', $data); //jangan lupa kirim variabel data tadi ke media_view
	}

	public function tambah()
	{
		$this->load->view('admin/file/media_tambah'); // untuk me LOAD tambah_media
	}

	public function simpan()
	{
		//sekarang kita ambil semua data pada variabel
		//deklarasi variabelnya dlu ya gaes
		$query = $this->db->query("SELECT max(SUBSTRING(id_media,4, 3))+1 as newId from tabel_media where SUBSTRING(id_media,2, 2)='" . date("y") . "'");
		$nama_media = $this->input->post('nama_media');
		$alamat_media = $this->input->post('alamat_media');
		$tlp_media = $this->input->post('tlp_media');
		$nama_rekening_media = $this->input->post('nama_rekening_media');
		$account_media = $this->input->post('account_media');
		$bank_media = $this->input->post('bank_media');
		$cabang_media = $this->input->post('cabang_media');
		$email_media = $this->input->post('email_media');
		//sesuaikan dengan name yang ada di media_tambah

		$data = array(
			'id_media' => 'M' . date("y") . sprintf("%03d", $query->result()[0]->newId),
			'nama_media' => $nama_media, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'alamat_media' => $alamat_media,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'tlp_media' => $tlp_media,
			'email_media' => $email_media,
			'nama_rekening_media' => $nama_rekening_media,
			'account_media' => $account_media,
			'bank_media' => $bank_media,
			'cabang_media' => $cabang_media
		);

		$this->Media_model->simpan_data($data); //kita load model Media_model kemudian arahkan ke function simpan_data sambil ngirim $data
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
		);
		redirect('admin/media'); //JIKA kita berhasil akan diaahkan ke tampil data
	}

	function aksi()
	{
		$this->form_validation->set_rules('nama_media', 'nama media', 'required');
		$this->form_validation->set_rules('alamat_media', 'alamat media', 'required');
		$this->form_validation->set_rules('telp_media', 'telephone', 'required');
		$this->form_validation->set_rules('email_media', 'email', 'required');
		$this->form_validation->set_rules('nama_rekening_media', 'nama rekening', 'required');
		$this->form_validation->set_rules('account_media', 'nomor rekening', 'required');
		$this->form_validation->set_rules('bank_media', 'bank', 'required');
		$this->form_validation->set_rules('cabang_media', 'cabang', 'required');

		if ($this->form_validation->run() != false) {
			echo "Form validation oke";
		} else {
			$this->load->view('admin/file/media_view');
		}

		// $id = $this->uri->segment(6);
		// $data['tabel_media'] = $this->Media_model->ambil_data();
		// $this->load->view('admin/file/media_view', $data);


		// $id = $this->uri->segment(6); //deklarasikan variabel id yang isina diambil dari uri segment
		// $data['data_edit'] = $this->So_model->ambil_data_edit($id);
		// $data['tabel_so'] = $this->So_model->ambil_data(); //tampilin list dari medianya 
		// $id = $this->uri->segment(5);
		// $data["detail"] = $this->So_model->get_detail($id);

		// //SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
		// $this->load->view('admin/transaksi/so_detail', $data);
	}

	//sekarang kita buat sebuag function untuk ambil id yang tadi trus di filter didatabase
	public function edit()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$data['data_edit'] = $this->Media_model->ambil_data_edit($id);
		$data['tabel_media'] = $this->Media_model->ambil_data(); //tampilin list dari medianya 

		//SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
		$this->load->view('admin/file/media_view', $data);
	}

	public function simpan_edit()
	{
		$id_media = $this->input->post('id_media'); // id yang di hidden tadi 
		$nama_media = $this->input->post('nama_media');
		$alamat_media = $this->input->post('alamat_media');
		$tlp_media = $this->input->post('tlp_media');
		$email_media = $this->input->post('email_media');
		$nama_rekening_media = $this->input->post('nama_rekening_media');
		$account_media = $this->input->post('account_media');
		$bank_media = $this->input->post('bank_media');
		$cabang_media = $this->input->post('cabang_media');

		$data = array(
			'nama_media' => $nama_media, 		// sebelah kiri yang ada kutip itu adalah nama field database
			'alamat_media' => $alamat_media,  // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
			'tlp_media' => $tlp_media,
			'email_media' => $email_media,
			'nama_rekening_media' => $nama_rekening_media,
			'account_media' => $account_media,
			'bank_media' => $bank_media,
			'cabang_media' => $cabang_media
		);

		$this->Media_model->update_data($data, $id_media);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-primary" role="alert">
												Data berhasil di update!
										  	 </div>'
		);
		redirect('admin/media');
	}

	public function hapus()
	{
		$id = $this->uri->segment(4); //deklarasikan variabel id yang isina diambil dari uri segment
		$this->Media_model->delete_data($id);
		$this->session->set_flashdata(
			'Info',
			'<div class="alert alert-danger" role="alert">
												Data berhasil di hapus!
											   </div>'
		);
		redirect('admin/media'); // mengarahkan kembali 
	}

	public function getNamaMedia()
	{
		$id = $this->input->post('filter');
		$data['data_media'] = $this->Media_model->ambil_nama_media($id);
		//$this->load->view('admin/ajax/alamat_klien', $data);
		$html = "";
		$i = 1;
		foreach ($data['data_media'] as $data) {
			$html .= "<a href='#' class='mediaResult' data-id='" . $data->id_media . "' >" . $i++ . ". " . $data->nama_media . "</a></br>";
		}
		echo $html;
	}
	public function getBankMedia()
	{
		$id = $this->uri->segment(4);
		$data['data_media'] = $this->Media_model->ambil_data_edit($id);
		//$this->load->view('admin/ajax/alamat_klien', $data);
		echo $data['data_media'][0]->account_media;
	}
}
