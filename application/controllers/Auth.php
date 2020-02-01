<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); // untuk memanggil method construct yang ada di ci auth 
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model'); //LOAD model Karyawan_model
    }

    public function index()
    {
        // $this->load->view('auth/partials/auth_header');
        $this->load->view('auth/login');
        //$this->load->view('auth/partials/auth_footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim'); // urutanyya set_rules($field, $label='', $rules=array())
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]'); //trim itu agar spasi sebelum atau sesudah data tidak di save ke dalam db 
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            //$this->load->view('auth/partials/auth_header');
            $this->load->view('auth/registration');
            //$this->load->view('auth/partials/auth_footer');
        } else {
            echo 'data berhasil ditambahkan!';
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->query("SELECT * FROM user where username='$username' and  password='$password' ");
        $rowcount = $query->num_rows();

        if ($rowcount > 0) {
            $data['user'] = $this->User_model->new_data($username, $password);

            foreach ($data['user'] as $tampil) {
                $newdata = array(
                    'username'  => $tampil->username,
                    'role_id'     => $tampil->role_id,
                );
            }

            $this->session->set_userdata($newdata);
            redirect('admin/overview');
        } else {
            $this->session->set_flashdata(
                'Info',
                '<div class="alert alert-danger" role="alert">
                                                    Data berhasil di hapus!
                                                   </div>'
            );
            $this->load->view('auth/login');;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
