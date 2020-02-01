<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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

    public function ambil_data()
    {
        $query = $this->db->query("SELECT *,date_format (tgl_inv_penjualan,'%d-%m-%Y') as tgl_inv_penjualan from transaksi_pemesanan");

        //artinya SELECT * FROM tabel_karyawan kemudian return hasilnya 
        return $query->result();
    }

    public function simpan_data($data)
    {
        $this->db->insert('transaksi_pemesanan', $data);
    }

    public function update_data($data, $no_invoice_penj)
    {
        $this->db->where('no_invoice_penj', $no_invoice_penj);
        $this->db->update('transaksi_pemesanan', $data);
    }

    public function get_detail($id_klien)
    {
        $this->db->select(
            'transaksi_pemesanan.*,
            tabel_so.no_so no_so2,
            tabel_klien.alamat_klien,
            tabel_so.nip_karyawan,
            nama_klien,
            nama_media,
            disc, 
            kol,
            mmk,
            price,
            gross,
            nett,
            uang_muka,
            sisa_bayar,
            bayar'
        );
        $this->db->from('transaksi_pemesanan');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien = transaksi_pemesanan.id_klien');
        $this->db->join('tabel_so', 'tabel_so.no_invoice_penj = transaksi_pemesanan.no_invoice_penj');
        $this->db->join('tabel_media', 'tabel_media.id_media = transaksi_pemesanan.id_media');
        $this->db->where('tabel_klien.id_klien', $id_klien);
        $this->db->group_by("tabel_klien.id_klien");
        $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get();
        return $query->result();
    }

    public function update_sisabayar($data, $no_invoice_penj)
    {
        $this->db->where('no_invoice_penj', $no_invoice_penj);
        $this->db->update('tabel_pemesanan', $data);
    }
}
