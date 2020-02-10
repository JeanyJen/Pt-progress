<?php
defined('BASEPATH') or exit('No direct script access allowed');

class trans_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('inv_pdf');
        $this->load->model('penjualan_model');
    }

    public function index()
    {
        $data = $this->penjualan_model->get_detail('$id_klien');
        $this->load->view('admin/transaksi/inv_Vpenjualan', ['data' => $data]);
    }

    // {
    //     $data = $this->penjualan_model->get_detail('$id_klien');
    //     $this->load->view('admin/transaksi/inv_Vpenjualan', ['data' => $data]);
    // }

    // public function detail()
    // {
    //     $data['title'] = "detail";
    //     $this->load->model('Penjualan_model');
    //     $id = $this->uri->segment(5);
    //     $data["detail"] = $this->Penjualan_model->get_detail($id);
    //     $this->load->view('admin/transaksi/inv_Vpenjualan', $data);
    // }

    public function ambil_data()
    {
        $query = $this->db->query("SELECT *,date_format (tgl_inv_penjualan,'%d-%m-%Y') as tgl_inv_penjualan from transaksi_pemesanan");

        //artinya SELECT * FROM tabel_karyawan kemudian return hasilnya 
        return $query->result();
    }
}
