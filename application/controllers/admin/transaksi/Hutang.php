<?php

class Hutang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //untuk manggil url
        $this->load->model("Klien_model");
        $this->load->model("Media_model");
        $this->load->model("So_model");
        $this->load->model("Hutang_model");
    }
    public function index()
    {
        $this->load->view('admin/transaksi/hutang_view');
        $this->load->model('penjualan_model');
    }

    public function simpan()
    {
        //sekarang kita ambil semua data pada variabel
        //deklarasi variabelnya dlu ya gaes


        $query = $this->db->query("SELECT max(SUBSTRING(no_invoice_pemb,10, 3))+1 as newId from transaksi_pembayaran where SUBSTRING(no_invoice_penj,5,4)='" . date("ym") . "'");

        $id_media = $this->input->post('id_media2');
        $id_klien = $this->input->post('id_klien');
        $no_so = $this->input->post('no_so');
        $terhutang = $this->input->post('terhutang');
        $no_invoice_pemb = 'Faktur'  . '/' . date("y") . date("m") . '/' . sprintf("%03d", $query->result()[0]->newId);



        //sesuaikan dengan name yang ada di karyawan_tambah
        $data = array(
            'no_invoice_pemb' => $no_invoice_pemb, //ii 
            'id_media' => $id_media,
            'id_klien' => $id_klien, // ini ga mau muncul id kliennya 
            'no_so' => 0,
            'terhutang' => $terhutang,


        );
        $this->Hutang_model->simpan_data($data);

        // foreach ($this->input->post('no_so') as $value) {
        //     $dataUpdate = [
        //         "no_invoice_penj" => $no_invoice_penj
        //     ];
        //     $this->So_model->update_data($dataUpdate, $value);
        // }
        // kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data

        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
                                                    Data berhasil di tambah!
                                                </div>'
        );

        redirect('admin/transaksi/hutang'); //JIKA kita berhasil akan diaahkan ke tampil data
    }
}
