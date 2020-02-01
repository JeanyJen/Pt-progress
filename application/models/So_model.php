
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class So_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function get_so()
    //untuk db kol bum diambil karna tidak tau cara mengambil yg berada pada colspan=2
    {
        $this->db->select('no_so,tabel_klien.id_klien, tabel_klien.nama_klien, disc, 
        (sum(mmk * kol* price)) as gross, 
        (sum(mmk * kol* price)) - (sum(((mmk * kol* price) * (disc/100)))) as nett');
        $this->db->from('tabel_so');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=tabel_so.id_klien');
        $this->db->group_by("tabel_klien.id_klien");
        // $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_data($data)
    {
        $this->db->insert('tabel_so', $data);
    }

    public function get_detail($id_klien)
    {
        $this->db->select(
            'no_so,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            tabel_media.id_media, 
            tabel_media.nama_media,
            disc, 
            kol,
            mmk,
            price,
            gross,
            nett,
            tabel_so.status'
        );
        $this->db->from('tabel_so');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=tabel_so.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=tabel_so.id_media');
        $this->db->where('tabel_klien.id_klien', $id_klien);
        $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
    }

    public function get_detail_cek($id_klien)
    {
        $this->db->select(
            'no_so,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            tabel_media.id_media, 
            tabel_media.nama_media,
            disc, 
            kol,
            mmk,
            price,
            gross,
            nett,
            tabel_so.status,
            tabel_so.nip_karyawan',
        );
        $this->db->from('tabel_so');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=tabel_so.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=tabel_so.id_media');
        $this->db->where('tabel_klien.id_klien', $id_klien);
        $this->db->where('tabel_so.status', 0); //ini untuk nambah angka yang hanya ada statusnya 
        $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
    }

    public function get_detail_cek1($id_media)
    {
        $this->db->select(
            'no_so,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            tabel_media.id_media, 
            tabel_media.nama_media, 
            kol,
            mmk,
            price,
            nett'
        );
        $this->db->from('tabel_so');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=tabel_so.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=tabel_so.id_media');
        $this->db->where('tabel_media.id_media', $id_media);
        $this->db->where('tabel_so.status', 0); //ini untuk nambah angka yang hanya ada statusnya 
        $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
    }



    public function delete_data($id)
    {
        $this->db->where('no_so', $id); // jadi nanti kita select field yang ada id
        $this->db->delete('tabel_so'); // dari tabel tabel_so

    }

    public function approve_so($id, $data)
    {
        $this->db->where('no_so', $id); // jadi nanti kita select field yang ada id
        $this->db->update('tabel_so', $data);
    }

    // public function ambil_data_so($id)
    // {
    //     $this->db->where('no_so', $id);
    //     $query = $this->db->get('tabel_so');
    //     return $query->result();
    //     //INTINYA KITA FILTER DATA PADA TABLE tabel_media DIMANA ID_media =$ID
    // }

    public function ambil_data_edit($id)
    {
        // $this->db->where('no_so', $id);
        // $query = $this->db->get('tabel_so');
        // return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_media DIMANA ID_media =$ID

        $this->db->select(
            'no_so,
            tabel_klien.id_klien, 
            tabel_klien.nama_klien, 
            tabel_media.id_media, 
            tabel_media.nama_media,
            disc, 
            kol,
            mmk,
            price,
            gross,
            nett,
            tabel_so.status'
        );
        $this->db->from('tabel_so');
        $this->db->join('tabel_klien', 'tabel_klien.id_klien=tabel_so.id_klien');
        $this->db->join('tabel_media', 'tabel_media.id_media=tabel_so.id_media');
        $this->db->where('tabel_so.no_so', $id);
        $this->db->group_by("tabel_klien.id_klien, tabel_so.no_so");
        $query = $this->db->get('');
        return $query->result();
        // return $this->db->get('tabel_so')->result(); bisa juga pakai satu ini 
        //untuk ngambil data edit yg hasil join ngambilnya kudu di join lagi
    }

    public function ambil_data()
    {
        //artinya SELECT * FROM tabel_media kemudian return hasilnya 
        return $this->db->get('tabel_so')->result();
    }

    public function update_data($data, $no_so)
    {
        $this->db->where('no_so', $no_so);
        $this->db->update('tabel_so', $data);
    }
}
