<?php
class trans_report extends CI_Controller
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



    function inv_trans()
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
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(190, 7, 'No.Inv', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        //=======================
        $pdf->Cell(30, 5, 'No Inv', 0, 0, 'L');
        $pdf->Cell(50, 5, 'Isi', 1, 0, 'L');
        $pdf->Cell(80, 5, 'Tgl Inv :', 0, 0, 'R');
        $pdf->Cell(50, 5, 'Isi', 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(30, 5, 'Pemesan', 0, 0, 'L');
        $pdf->Cell(50, 5, 'Isi', 1, 0, 'L');
        $pdf->Cell(80, 5, 'Marketing :', 0, 0, 'R');
        $pdf->Cell(50, 5, 'Isi', 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(30, 5, 'Alamat', 0, 0, 'L');
        $pdf->Cell(50, 5, 'Isi', 1, 0, 'L');
        $pdf->Cell(50, 5, '', 0, 0, 'R');
        $pdf->Cell(30, 5, '', 0, 0, 'C');
        $pdf->Ln(8);

        //=======================
        $pdf->Cell(7, 6, 'No', 1, 0, "L");
        $pdf->Cell(25, 6, 'No So', 1, 0, "L");
        $pdf->Cell(80, 6, 'Nama Media', 1, 0, "L");
        $pdf->Cell(30, 6, 'Kol', 1, 0, "L");
        $pdf->Cell(25, 6, 'MMK', 1, 0, "L");
        $pdf->Cell(25, 6, 'Price', 1, 0, "L");
        $pdf->Cell(25, 6, 'Gross', 1, 0, "L");
        $pdf->Cell(25, 6, 'Disc %', 1, 0, "L");
        $pdf->Cell(25, 6, 'Nett', 1, 0, "L");
        $pdf->Ln(6);
        //=======================
        // $inv_penjualan = $this->db->get('tabel_so')->result();
        $inv_penjualan = $this->db->query(
            "SELECT a.no_so, d.nama_media, b.mmk,b.kol,b.price,b.gross,b.disc,b.nett,e.nama_klien,a.no_invoice_penj,
                        a.tgl_invoice_penj,f.jabatan_karyawan,e.alamat_klien
                    FROM transaksi_pemesanan a
                    LEFT JOIN tabel_so b
                    ON a.no_so = b.no_so
                    LEFT JOIN tabel_media d
                    ON a.id_media=d.id_media
                    LEFT JOIN tabel_klien e
                    ON a.id_klien=e.id_klien
                    LEFT JOIN tabel_karyawan f
                    ON a.nip_karyawan=f.nip_karyawan"
        )->result();
        $no = 1;
        foreach ($inv_penjualan as $key => $value) {
            $a[] = $value;
            // $pdf->Cell(25, 6, $value->no_invoice_penj, 1, 1);
            $pdf->Cell(7, 5, $no++, 1, 0, "L");
            $pdf->Cell(25, 5, $value->no_so, 1, 0, "L");
            $pdf->Cell(80, 5, $value->nama_media, 1, 0, "L");
            $pdf->Cell(30, 5, $value->mmk, 1, 0, "L");
            $pdf->Cell(25, 5, $value->kol, 1, 0, "L");
            $pdf->Cell(25, 5, $value->price, 1, 0, "L");
            $pdf->Cell(25, 5, $value->gross, 1, 0, "L");
            $pdf->Cell(25, 5, $value->disc, 1, 0, "L");
            $pdf->Cell(25, 5, $value->nett, 1, 0, "L");
            $pdf->Ln(5);
        }
        $pdf->Ln(10);
        $pdf->Cell(180, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Uang Muka :', 0, 0, 'R');
        $pdf->Cell(50, 6, '', 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(180, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Sisa Bayar :', 0, 0, 'R');
        $pdf->Cell(50, 6, '', 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(180, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Bayar :', 0, 0, 'R');
        $pdf->Cell(50, 6, '', 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Output();
    }
}
