<?php

class Hutang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //untuk manggil url

        $this->load->model("Hutang_model");
        $this->load->model("klien_model"); //manggil media model
        $this->load->model("media_model"); //manggil media model
        $this->load->library('session');
    }
    public function index()
    {
        $data["hutang_klien"] = $this->klien_model->ambil_data(); //relasi id media ambil data 
        $data["hutang_media"] = $this->media_model->ambil_data(); //relasi id media ambil data 
        $data["ambil_hutang"] = $this->Hutang_model->get_hutang();

        $this->load->view('admin/transaksi/hutang_view', $data);
    }

    public function ambil_hutang()
    {
        $data['title'] = "ambil_hutang";
        $this->load->model('hutang_model');
        $data["ambil_hutang"] = $this->Hutang_model->get_hutang();
        $this->load->view('admin/transaksi/hutang_view', $data);
    }

    public function detail()
    {
        $data['title'] = "ambil_hutang";
        $this->load->model('Hutang_model');
        $id = $this->uri->segment(5);
        $data["detail"] = $this->Hutang_model->get_detail($id);
        $this->load->view('admin/transaksi/hutang_detail', $data);
    }

    public function simpan()
    {
        $no_invoice_pemb = $this->input->post('no_invoice_pemb');
        $id_klien = $this->input->post('id_klien');
        $id_media = $this->input->post('id_media2');
        $kol = $this->input->post('kol');
        $mmk = $this->input->post('mmk');
        $price = $this->input->post('price');
        $terhutang = $this->input->post('terhutang');

        $data = array(
            // sebelah kiri yang ada kutip itu adalah nama field database
            // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
            'no_invoice_pemb' => $no_invoice_pemb,
            'id_klien' => $id_klien,
            'id_media' => $id_media,
            'kol' => $kol,
            'mmk' => $mmk,
            'price' => $price,
            'terhutang' => $terhutang,
        );

        $this->Hutang_model->simpan_data($data); //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
        );
        redirect('admin/transaksi/hutang'); //JIKA kita berhasil akan diaahkan ke tampil data
    }

    public function edit()
    {
        $id = $this->uri->segment(6); //deklarasikan variabel id yang isina diambil dari uri segment
        $data['data_edit'] = $this->Hutang_model->ambil_data_edit($id);
        $data['transaksi_pembayaran'] = $this->Hutang_model->ambil_data(); //tampilin list dari medianya 
        $id = $this->uri->segment(5);
        $data["detail"] = $this->Hutang_model->get_detail($id);
        //SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
        $this->load->view('admin/transaksi/hutang_detail', $data);
    }

    public function simpan_edit()
    {
        $no_invoice_pemb = $this->input->post('no_invoice_pemb');
        $id_klien = $this->input->post('id_klien');
        $id_media = $this->input->post('id_media');
        $kol = $this->input->post('kol');
        $mmk = $this->input->post('mmk');
        $price = $this->input->post('price');

        $data = array(
            // sebelah kiri yang ada kutip itu adalah nama field database
            // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
            'no_invoice_pemb' => $no_invoice_pemb,
            'id_klien' => $id_klien,
            'id_media' => $id_media,
            'kol' => $kol,
            'mmk' => $mmk,
            'price' => $price,
        );
        // Var_dump($data);
        // die;
        $this->Hutang_model->update_data($data, $no_invoice_pemb);


        //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
        );
        redirect('admin/transaksi/hutang/detail/' . $this->input->post('id_media')); //JIKA kita berhasil akan diaahkan ke tampil data kembali pada detail id_klien yang diubah 
    }

    public function hapus()
    {
        $id = $this->uri->segment(5);
        $this->Hutang_model->delete_data($id);
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-danger" role="alert">
												Data successfully deleted!
											   </div>'
        );
        redirect($_SERVER['HTTP_REFERER']); // untuk kembali ke halaman sebelumya
    }
}
