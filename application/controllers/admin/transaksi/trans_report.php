<?php
defined('BASEPATH') or exit('No direct script access allowed');

class trans_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('inv_pdf');
    }

    public function index()
    {
        $this->load->view('admin/transaksi/inv_Vpenjualan');
    }
}
