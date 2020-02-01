
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klien_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function ambil_data()
    {

        //artinya SELECT * FROM tabel_klien kemudian return hasilnya 
        return $this->db->get('tabel_klien')->result();
    }

    public function simpan_data($data)
    {
        $this->db->insert('tabel_klien', $data);
    }

    public function ambil_data_edit($id)
    {
        $this->db->where('id_klien', $id);
        $query = $this->db->get('tabel_klien');
        return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_klien DIMANA ID_klien =$ID
    }

    public function ambil_nama_klien($id)
    {
        $this->db->like('nama_klien', $id);
        $query = $this->db->get('tabel_klien');
        return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_klien DIMANA ID_klien =$ID
    }

    public function update_data($data, $id_klien)
    {
        $this->db->where('id_klien', $id_klien);
        $this->db->update('tabel_klien', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id_klien', $id); // jadi nanti kita select field yang ada id
        $this->db->delete('tabel_klien'); // dari tabel tabel_klien
    }
}
?>