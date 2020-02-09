<?php
class Lap_Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper('url'); //untuk manggil url

    }

    public function index()
    {
        $data['title'] = "laporan_penjualan";
        $this->load->model('Laporan_model');
        $data["laporan_penjualan"] = $this->Laporan_model->get_penjualan();
        $this->load->view('admin/laporan/Vlap_penjualan', $data);
    }

    public function laporan_penjualan()
    {
        // $data['title'] = "laporan_penjualan";
        // $this->load->model('laporan_model');
        // $data["laporan_penjualan"] = $this->laporan_model->get_penjualan();
        // $this->load->view('admin/laporan/Vlap_penjualan', $data);
    }
}
    
















// =lama=
// class Penjualan extends CI_Controller
// {
//     public function index()
//     {
//         $this->load->view('admin/laporan/penjualan');
//     }

    //     public function cetak()
    //     {
    //         ob_start();
    //         $data['data'] = $this->model_medical->caripasien();
    //         $this->load->view('admin/laporan/penjualan', $data);
    //         $html = ob_get_contents();
    //         ob_end_clean();

    //         require_once('./assets/html2pdf/html2pdf.class.php');
    //         $pdf = new HTML2PDF('P', 'A4', 'en');
    //         $pdf->WriteHTML($html);
    //         $pdf->Output('Laporan Penjualan.pdf', 'R');
    //     }
// }
