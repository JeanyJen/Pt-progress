
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function ambil_data()
    {
        //artinya SELECT * FROM tabel_media kemudian return hasilnya 
        return $this->db->get('tabel_media')->result();
    }

    public function simpan_data($data)
    {
        $this->db->insert('tabel_media', $data);
    }

    public function ambil_data_edit($id)
    {
        $this->db->where('id_media', $id);
        $query = $this->db->get('tabel_media');
        return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_media DIMANA ID_media =$ID
    }

    public function ambil_nama_media($id)
    {
        $this->db->like('nama_media', $id);
        $query = $this->db->get('tabel_media');
        return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_klien DIMANA ID_klien =$ID
    }

    public function update_data($data, $id_media)
    {
        $this->db->where('id_media', $id_media);
        $this->db->update('tabel_media', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id_media', $id); // jadi nanti kita select field yang ada id
        $this->db->delete('tabel_media'); // dari tabel tabel_media
    }
}
?>