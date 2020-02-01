<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct(); //Meload library database agar bisa terhubung
    }

    public function new_data($username, $password)
    {
        $query = $this->db->query("SELECT * from user where username='$username' and  password='$password' ");
        return $query->result();
    }
}
