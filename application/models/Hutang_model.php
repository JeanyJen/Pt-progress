
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function simpan_data($data)
    {
        $this->db->insert('transaksi_pembayaran', $data);
    }
}
