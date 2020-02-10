<?php
class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //untuk manggil url
        $this->load->model("Penjualan_model"); //manggil po model 
        $this->load->model("klien_model"); //manggil media model
        $this->load->model("So_model"); //manggil media model
    }

    public function index()
    {
        $data['title'] = "ambil_penjualan";
        $this->load->model('penjualan_model');
        $data["ambil_penjualan"] = $this->penjualan_model->get_penjualan();
        $this->load->view('admin/transaksi/penjualan_view', $data);
    }

    public function simpan()
    {
        //sekarang kita ambil semua data pada variabel
        //deklarasi variabelnya dlu ya gaes

        $query = $this->db->query("SELECT max(SUBSTRING(no_invoice_penj,10, 3))+1 as newId from transaksi_pemesanan where SUBSTRING(no_invoice_penj,5,4)='" . date("ym") . "'");
        $id_klien = $this->input->post('id_klien2');
        $no_so = $this->input->post('no_so');
        $nip_karyawan = $this->input->post('nip_karyawan');
        $id_media = $this->input->post('id_media');
        $sisa_bayar = $this->input->post('sisa_bayar');
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $uang_muka = $this->input->post('uang_muka');
        $bayar = $this->input->post('bayar');
        $no_invoice_penj = 'Inv' . '/' . date("y") . date("m") . '/' . sprintf("%03d", $query->result()[0]->newId);


        //sesuaikan dengan name yang ada di karyawan_tambah
        $data = array(
            'no_invoice_penj' => $no_invoice_penj, //ii 
            'id_klien' => $id_klien,
            'no_so' => 0,
            'nip_karyawan' => $nip_karyawan,
            'id_media' => $id_media,
            'sisa_bayar' => $sisa_bayar,
            'metode_pemb' => $metode_pembayaran,
            'uang_muka' => $uang_muka,
            'bayar' => $bayar
        );
        $this->Penjualan_model->simpan_data($data);

        // foreach ($this->input->post('no_so') as $value) {
        //     $dataUpdate = [
        //         "no_invoice_penj" => $no_invoice_penj
        //     ];
        //     $this->So_model->update_data($dataUpdate, $value);
        // }

        //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
                                                    Data berhasil di tambah!
                                                </div>'
        );

        redirect('admin/transaksi/penjualan'); //JIKA kita berhasil akan diaahkan ke tampil data
    }

    public function detail()
    {
        $data['title'] = "detail";
        $this->load->model('Penjualan_model');
        $id = $this->uri->segment(5);
        $data["detail"] = $this->Penjualan_model->get_detail($id);
        $this->load->view('admin/transaksi/penjualan_detail', $data);
    }


    public function ambil_penjualan()
    {
        $data['title'] = "ambil_penjualan";
        $this->load->model('penjualan_model');
        $data["ambil_penjualan"] = $this->penjualan_model->get_penjualan();
        $this->load->view('admin/transaksi/penjualan_view', $data);
    }

    public function updateSisaBayar()
    {

        $no_invoice_penj = $this->input->post('no_invoice_penj');
        $sisa_bayar = $this->input->post('input_bayar');
        $dataUpdate = [
            "input_bayar" => $sisa_bayar
        ];
        $this->penjualan_model->update_data($dataUpdate, $no_invoice_penj);
    }
}
