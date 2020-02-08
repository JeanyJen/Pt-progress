
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function get_penjualan()
    {
        $this->db->select(
            'transaksi_pemesanan.*,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien,
            sum(nett) nett'
        );
        $this->db->from('transaksi_pemesanan');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien = transaksi_pemesanan.id_klien');
        $this->db->join('tabel_so', 'tabel_so.no_invoice_penj = transaksi_pemesanan.no_invoice_penj');
        $this->db->join('tabel_media', 'tabel_media.id_media = transaksi_pemesanan.id_media');
        $this->db->group_by("tabel_klien.id_klien");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hutang()
    //untuk db kol bum diambil karna tidak tau cara mengambil yg berada pada colspan=2
    {
        $this->db->select(
            'no_invoice_pemb,
            tanggal_inv_pemb,
            tabel_media.id_media, 
            tabel_media.nama_media, 
        (sum(mmk * kol* price)) as terhutang'
        );
        $this->db->from('transaksi_pembayaran');
        $this->db->join('tabel_media', 'tabel_media.id_media=transaksi_pembayaran.id_media');
        $this->db->group_by("tabel_media.id_media");
        // $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get();
        return $query->result();

        // public function lap_penjualan($data)
        // {
        //     $this->db->from('transaksi_pemesanan');
        //     $this->db->where('tgl_invoice_penj >=', $this->input->post('tgl_awal'));
        //     $this->db->where('tgl_invoice_penj >=', $this->input->post('tgl_akhir'));
        //     $query = $this->db->get();
        //     return $query->result();
    }
}
