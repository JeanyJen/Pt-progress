
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Meload library database agar bisa terhubung
        $this->load->database();
    }

    public function ambil_data()
    {
        $query = $this->db->query("SELECT *,date_format (tgl_msk_karyawan,'%d-%m-%Y') as tgl_msk_karyawan from tabel_karyawan");

        //artinya SELECT * FROM tabel_karyawan kemudian return hasilnya 
        return $query->result();
    }


    public function simpan_data($data)
    {
        $this->db->insert('tabel_karyawan', $data);
    }


    public function ambil_data_edit($id)
    {
        $this->db->where('nip_karyawan', $id);
        $query = $this->db->get('tabel_karyawan');
        return $query->result();
        //INTINYA KITA FILTER DATA PADA TABLE tabel_karyawan DIMANA nip_karyawan =$ID
    }


    public function update_data($data, $nip_karyawan)
    {
        $this->db->where('nip_karyawan', $nip_karyawan);
        $this->db->update('tabel_karyawan', $data);
    }



    public function delete_data($id)
    {
        $this->db->where('nip_karyawan', $id); // jadi nanti kita select field yang ada id
        $this->db->delete('tabel_karyawan'); // dari tabel tabel_karyawan
    }
}
?>