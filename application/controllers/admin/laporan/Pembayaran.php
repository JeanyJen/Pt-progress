<?php
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //untuk manggil url
    }
    public function index()
    {
        $this->load->view('admin/laporan/pembayaran');
    }
}
