<?php
class Laporanpdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index()
    {
    }
    // http://localhost/pt-progress/index.php/laporanpdf/print_lap_penj

    function print_lap_penj()
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
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(70, 6, 'Tanggal Invoice', 1, 0);
        $pdf->Cell(25, 6, 'No.Inv', 1, 0);
        $pdf->Cell(27, 6, 'Nama Klien', 1, 0);
        $pdf->Cell(25, 6, 'Marketing', 1, 0);
        $pdf->Cell(25, 6, 'Nama Media', 1, 0);
        $pdf->Cell(25, 6, 'Sisa Bayar', 1, 0);
        $pdf->Cell(25, 6, 'Total', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $laporan_penjualan = $this->db->get('transaksi_pemesanan')->result();
        foreach ($laporan_penjualan as $row) {

            $pdf->Cell(70, 6, $row->tgl_invoice_penj, 1, 0);
            $pdf->Cell(25, 6, $row->no_invoice_penj, 1, 0);
            $pdf->Cell(27, 6, $row->id_klien, 1, 0);
            $pdf->Cell(25, 6, $row->nip_karyawan, 1, 0);
            $pdf->Cell(25, 6, $row->id_media, 1, 0);
            $pdf->Cell(25, 6, $row->sisa_bayar, 1, 0);
            $pdf->Cell(25, 6, $row->bayar, 1, 1);
        }
        $pdf->Output();
    }

    function print_lap_pemb()
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
        $pdf->Cell(7, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, 'Tanggal Invoice', 1, 0);
        $pdf->Cell(25, 6, 'No.Inv', 1, 0);
        $pdf->Cell(27, 6, 'Nama Klien', 1, 0);
        $pdf->Cell(25, 6, 'Marketing', 1, 0);
        $pdf->Cell(25, 6, 'Nama Media', 1, 0);
        $pdf->Cell(25, 6, 'Sisa Bayar', 1, 0);
        $pdf->Cell(25, 6, 'Total', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $laporan_penjualan = $this->db->get('transaksi_pemesanan')->result();
        foreach ($laporan_penjualan as $row) {

            $pdf->Cell(50, 6, $row->tgl_invoice_penj, 1, 0);
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
