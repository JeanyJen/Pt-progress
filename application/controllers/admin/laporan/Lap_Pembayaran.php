<?php
class Lap_Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Laporan_model");
        $this->load->helper('url'); //untuk manggil url
    }
    public function index()
    {
        $data['title'] = "ambil_laphutang";
        $this->load->model('Laporan_model');
        $data["ambil_laphutang"] = $this->Laporan_model->get_hutang();
        $this->load->view('admin/laporan/Vlap_pembayaran', $data);
    }

    public function ambil_laphutang()
    {
        // $data['title'] = "ambil_laphutang";
        // $this->load->model('Laporan_model');
        // $data["ambil_laphutang"] = $this->Laporan_model->get_hutang();
        // $this->load->view('admin/transaksi/Vlap_pembayaran', $data);
    }
}
