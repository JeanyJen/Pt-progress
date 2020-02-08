
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

    // public function ambil_data()
    // {
    //     $query = $this->db->query("SELECT *,date_format (tgl_inv_penjualan,'%d-%m-%Y') as tgl_inv_penjualan from transaksi_pemesanan");
    //     return $query->result();
    // }


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
    }

    public function get_detail($id_media)
    {
        $this->db->select(
            'no_invoice_pemb,
            tabel_media.id_media, 
            tabel_media.nama_media,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            kol,
            mmk,
            price,
            terhutang'
        );
        $this->db->from('transaksi_pembayaran');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=transaksi_pembayaran.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=transaksi_pembayaran.id_media');
        $this->db->where('tabel_media.id_media', $id_media);
        $this->db->group_by("tabel_media.id_media, transaksi_pembayaran.no_invoice_pemb");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
    }

    public function ambil_data_edit($id)
    {
        // $this->db->where('no_so', $id);
        // $query = $this->db->get('tabel_so');
        // return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_media DIMANA ID_media =$ID

        $this->db->select(
            'no_invoice_pemb,
            tabel_media.id_media, 
            tabel_media.nama_media,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            kol,
            mmk,
            price,
            terhutang'
        );
        $this->db->from('transaksi_pembayaran');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=transaksi_pembayaran.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=transaksi_pembayaran.id_media');
        $this->db->where('transaksi_pembayaran.no_invoice_pemb', $id);

        $this->db->group_by("tabel_media.id_media, transaksi_pembayaran.no_invoice_pemb");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
        //untuk ngambil data edit yg hasil join ngambilnya kudu di join lagi
    }

    public function ambil_data()
    {
        //artinya SELECT * FROM tabel_media kemudian return hasilnya 
        return $this->db->get('transaksi_pembayaran')->result();
    }

    public function update_data($data, $no_invoice_pemb)
    {
        $this->db->where('no_invoice_pemb', $no_invoice_pemb);
        $this->db->update('transaksi_pembayaran', $data);
    }


    public function delete_data($id)
    {
        $this->db->where('no_invoice_pemb', $id); // jadi nanti kita select field yang ada id
        $this->db->delete('transaksi_pembayaran'); // dari tabel tabel_so

    }
}
?>