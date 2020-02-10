
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria extends CI_Model
{
    function jumlah_media()
    {
        $query = $this->db->query("SELECT * FROM data_media");
        $total = $query->num_rows();
        return $total;
    }
}
