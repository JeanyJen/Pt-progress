<?php
class So extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //fungsi pertama kali dipanggil 
        $this->load->helper('url'); //untuk manggil url
        $this->load->model("So_model"); //manggil po model 
        $this->load->model("media_model"); //manggil media model
        $this->load->model("klien_model"); //manggil media model
        $this->load->library('session');
    }

    public function index()
    {
        // $data["tabel_so"] = $this->So_model->get_relasi(); //relasi id media
        $data["so_media"] = $this->media_model->ambil_data(); //relasi id media ambil data 
        $data["so_klien"] = $this->klien_model->ambil_data(); //relasi id media ambil data 
        $data["ambil_so"] = $this->So_model->get_so();
        $this->load->view('admin/transaksi/so_view', $data);
    }

    public function ambil_so()
    {
        $data['title'] = "ambil_so";
        $this->load->model('So_model');
        $data["ambil_so"] = $this->So_model->get_so();
        $this->load->view('admin/transaksi/so_view', $data);
    }

    public function simpan()
    {

        //sekarang kita ambil semua data pada variabel
        //deklarasi variabelnya dlu ya gaes
        $no_so = $this->input->post('no_so');
        $id_klien = $this->input->post('id_klien');
        $id_media = $this->input->post('id_media');
        $nip_karyawan = $this->input->post('nip_karyawan');
        $kol = $this->input->post('kol');
        $mmk = $this->input->post('mmk');
        $price = $this->input->post('price');
        $gross = $mmk * $kol * $price;
        $disc = $this->input->post('disc');
        $nett = $gross - ($gross * ($disc / 100));
        // (mmk * kol* price) - (sum(((mmk * kol* price) * (disc/100)))) as nett,

        $data = array(
            // sebelah kiri yang ada kutip itu adalah nama field database
            // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
            'no_so' => $no_so,
            'id_klien' => $id_klien,
            'id_media' => $id_media,
            'nip_karyawan' => $_SESSION['username'],
            'kol' => $kol,
            'mmk' => $mmk,
            'price' => $price,
            'gross' => $gross,
            'disc' => $disc,
            'nett' => $nett,

        );

        // var_dump($data);
        // die;

        $this->So_model->simpan_data($data); //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
        );
        redirect('admin/transaksi/so'); //JIKA kita berhasil akan diaahkan ke tampil data
    }


    public function GetDataSo()
    {
        $id = $this->uri->segment(5);
        $data['data_so'] = $this->So_model->get_detail_cek($id);
        $this->load->view('admin/ajax/tabel_so', $data);
    }

    public function GetDataSoPemb()
    {
        $id = $this->uri->segment(5);
        $data['data_hutang'] = $this->So_model->get_detail_cek1($id);
        $this->load->view('admin/ajax/tabel_hutang', $data);
    }

    public function hapus()
    {
        $id = $this->uri->segment(5);
        $this->So_model->delete_data($id);
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-danger" role="alert">
												Data successfully deleted!
											   </div>'
        );
        redirect($_SERVER['HTTP_REFERER']); // untuk kembali ke halaman sebelumya
    }

    public function approve()
    {
        $id = $this->uri->segment(5);
        $query = $this->db->query("SELECT status from tabel_so WHERE no_so = '$id'");
        $data = [
            "status" => $query->result()[0]->status ? 0 : 1 // 
        ];
        $this->So_model->approve_so($id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit()
    {
        $id = $this->uri->segment(6); //deklarasikan variabel id yang isina diambil dari uri segment
        $data['data_edit'] = $this->So_model->ambil_data_edit($id);
        $data['tabel_so'] = $this->So_model->ambil_data(); //tampilin list dari medianya 
        $id = $this->uri->segment(5);
        $data["detail"] = $this->So_model->get_detail($id);

        //SETELAH DATANYA DAPAT LALU DITAMPILKAN KE FORM EDIT YANG BARU
        $this->load->view('admin/transaksi/so_detail', $data);
    }

    public function detail()
    {
        $data['title'] = "ambil_so";
        $this->load->model('So_model');
        $id = $this->uri->segment(5);
        $data["detail"] = $this->So_model->get_detail($id);
        $this->load->view('admin/transaksi/so_detail', $data);
    }

    public function simpan_edit()
    {
        //sekarang kita ambil semua data pada variabel
        //deklarasi variabelnya dlu ya gaes
        $no_so = $this->input->post('no_so');
        $kol = $this->input->post('kol');
        $mmk = $this->input->post('mmk');
        $price = $this->input->post('price');
        $gross = $mmk * $kol * $price;
        $disc = $this->input->post('disc');
        $nett = $gross - ($gross * ($disc / 100));

        // (mmk * kol* price) - (sum(((mmk * kol* price) * (disc/100)))) as nett,

        $data = array(
            // sebelah kiri yang ada kutip itu adalah nama field database
            // sedangkan yang sebelah kanan itu adalah variabel yang akan kita insert
            'kol' => $kol,
            'mmk' => $mmk,
            'price' => $price,
            'gross' => $gross,
            'disc' => $disc,
            'nett' => $nett

        );
        $this->So_model->update_data($data, $no_so);
        //kita load model Karyawan_model kemudian arahkan ke function simpan_data sambil ngirim $data
        $this->session->set_flashdata(
            'Info',
            '<div class="alert alert-info" role="alert">
												Data berhasil di tambah!
											   </div>'
        );
        redirect('admin/transaksi/so/detail/' . $this->input->post('id_klien')); //JIKA kita berhasil akan diaahkan ke tampil data kembali pada detail id_klien yang diubah 
    }
}
