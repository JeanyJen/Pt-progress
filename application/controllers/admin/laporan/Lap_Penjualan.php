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



    function print_laporan_penj()
    {
        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 

        $pdf->Cell(190, 7, 'PT Progress Advertising', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'JL.Tanah Seratus RT.001/001 No.23, Kel.Sudimara Jaya, Kec.Ciledug', 0, 1, 'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(9, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(80, 6, 'Tanggal Invoice', 1, 0);
        $pdf->Cell(25, 6, 'No.Inv', 1, 0);
        $pdf->Cell(27, 6, 'Nama Klien', 1, 0);
        $pdf->Cell(25, 6, 'Marketing', 1, 0);
        $pdf->Cell(25, 6, 'Nama Media', 1, 0);
        $pdf->Cell(25, 6, 'Sisa Bayar', 1, 0);
        $pdf->Cell(25, 6, 'Total', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $laporan_penjualan = $this->db->get('transaksi_pemesanan')->result();
        foreach ($laporan_penjualan as $row) {

            $pdf->Cell(80, 6, $row->tgl_invoice_penj, 1, 0);
            $pdf->Cell(25, 6, $row->no_invoice_penj, 1, 0);
            $pdf->Cell(27, 6, $row->id_klien, 1, 0);
            $pdf->Cell(25, 6, $row->nip_karyawan, 1, 0);
            $pdf->Cell(25, 6, $row->id_media, 1, 0);
            $pdf->Cell(25, 6, $row->sisa_bayar, 1, 0);
            $pdf->Cell(25, 6, $row->bayar, 1, 1);
        }
        $pdf->Output();
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
