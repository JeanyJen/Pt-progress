<!-- akan menjadi template  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- INI DALAH FILE CSS YANG DI BUAT DATATABLES BOOSTRAP -->
    <link type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- INI CSS BOOSTRAP 4-->
    <link type="text/css" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> <!-- INI DATA TABLES BOOSTRAP 4-->
    <?php $this->load->view("admin/_partials/head.php") ?>
    <style>
        #livesearch {
            position: absolute;
            background: #fff;
            width: 15vw;
            border: solid 1px;
            z-index: 99;
            max-height: 30vh;
            overflow: auto;
        }
    </style>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>



    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- TAMBAHKAN ROW-->
                            <div class="col-sm-12">
                                <!-- TAMBAHKAN COLOM -->
                                <br>
                                <div class="card">
                                    <div class="card header">
                                        <!-- HEADER TABLE -->
                                        <h4 align="center"><strong>Pemesanan Iklan </strong></h4>
                                    </div>

                                    <div class="card-body">

                                        <!-- TABEL UNTUK MENAMPILKAN DATA ADA-->
                                        <table class="table table-striped table-bordered" id="tblPenjualan">
                                            <!--id ini untuk manggil jquery-->
                                            <thead>
                                                <tr align="center">
                                                    <th> No.invoice </th>
                                                    <th> Tanggal </th>
                                                    <th> Dipesan Oleh </th>
                                                    <th> Uang Muka </th>
                                                    <th> Sisa Bayar </th>
                                                    <th> Total Nett </th>
                                                    <th> Aksi </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($ambil_penjualan as $tampil) { ?>

                                                    <tr>
                                                        <td> <?php echo $tampil->no_invoice_penj ?></td>
                                                        <td> <?php echo $tampil->tgl_invoice_penj ?></td>
                                                        <td> <?php echo $tampil->nama_klien ?></td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->uang_muka) ?>
                                                        </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->sisa_bayar) ?>
                                                        </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->nett) ?>
                                                        </td>

                                                        <td>
                                                            <a class="btn btn-info" href=" admin/transaksi/penjualan_detail">Cetak</a>
                                                            <a class=" btn btn-info btn-sm " href="<?php echo site_url('admin/transaksi/penjualan/detail/') . $tampil->id_klien ?>"><i class="fa fa-file-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div> <!-- AKHIR COLOM -->
                        </div> <!-- AKHIR ROW -->
                    </div> <!-- AKHIR CONTAINER -->
                    <!-- /.container-fluid -->

                    <a class="btn btn-info" href="#" data-toggle="modal" data-target=".tambah_penjualan">Tambah Data</a>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash-alt"></i> </a>
                    <!-- <a class="btn btn-danger btn-sm" href="#" onclick="hapus_nip('<?= $tampil->nip_karyawan ?>')"> <i class="fa fa-trash-alt"></i> </a> -->

                    <!-- Sticky Footer -->
                    <?php $this->load->view("admin/_partials/footer.php") ?>

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->
            <?php $this->load->view("admin/_partials/scrolltop.php") ?>
            <?php $this->load->view("admin/_partials/modal.php") ?>
            <?php $this->load->view("admin/_partials/js.php") ?>

</body>


<!--  Modal Tambah -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-md-6 big-box">
            <div class="modal fade tambah_penjualan" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><strong>Pemesanan Iklan </strong></h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> <!-- untuk tombol x close-->
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('admin/transaksi/penjualan/simpan') ?>" method="POST" id="tambah_penjualan">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label for="penjualan" class="col-sm-3 col-form-label"> Di pesan oleh </label>
                                                        <div class="col-sm-6">
                                                            <input type="text" size="30" name="liveSearch" class="form-control" autocomplete="off">
                                                            <div id="livesearch">
                                                            </div>
                                                            <input type="hidden" name="id_klien2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label for="penjualan" class="col-sm-3 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="alamat-klien" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!--<div class="form-group row">
                                                    <label for="penjualan" class="col-sm-4 col-form-label">Tgl.Inv</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                    </div>
                                                </div>-->
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <!-- <label for="penjualan" class="col-sm-5 col-form-label"> Tanggal Inv</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="penjualan" class="col-sm-5 col-form-label">Marketing</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="inputPassword" placeholder="" readonly name="nip_karyawan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr align="center">
                                                <th rowspan="2" class="align-middle"> No </th>
                                                <th rowspan="2" class="align-middle"> No.So </th>
                                                <th rowspan="2" class="align-middle"> Nama Media </th>
                                                <th colspan="2"> Size </th>
                                                <th rowspan="2" class="align-middle"> Price </th>
                                                <th rowspan="2" class="align-middle"> Gross </th>
                                                <th rowspan="2" width="1"> % </th>
                                                <th rowspan="2" class="align-middle"> Nett </th>
                                                <!-- <th rowspan="2" class="align-middle" width="100"> Action </th> -->
                                            </tr>
                                            <tr>
                                                <th> Mmk </th>
                                                <th> Kol </th>
                                            </tr>
                                        </thead>
                                        <tbody id="DataSo">
                                            <!-- manggil ajax/tabel so dari sini -->
                                            <?php $grandtotal = 0; ?>
                                            <?php // foreach ($detail as $tampil) : 
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php //endforeach 
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label for="penjualan" class="col-sm-5 col-form-label "> Metode Pembayaran </label>
                                                <div class="col-sm-7">
                                                    <select class="custom-select col-sm-12" name="metode_pembayaran" id="pilihpembayaran" class="method-pembayaran">
                                                        <option value="0">Cash</option>
                                                        <option value="1">Kredit</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label for="penjualan" class="col-sm-5 col-form-label">Uang Muka</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control method-pembayaran" name="uang_muka" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label for="penjualan" class="col-sm-5 col-form-label">Sisa Bayar</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="sisa_bayar" readonly placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <input class="btn btn-primary" type="button" value="Simpan"> -->
                                    <button type="button" class="btn btn-primary" onclick="$('#tambah_penjualan').submit()">Simpan </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/penjualan') ?>">Back</button>
                                </div>
                            </form>
                        </div> <!-- AKHIR ROW-->

                    </div> <!-- AKHIR modal content -->
                </div>
            </div>

        </div>
    </div>
</div>
<!--  Akhir Modal Tambah  -->



<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->

    <!-- INI UNTUK INIALISASI DATA TABLES KITAKE TABLE KITA -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#livesearch').hide();
            $('#tblPenjualan').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
            $('.readonly-class').attr("readonly", true); // form-control readonly-class yg dipanggil salah satunya aja gpp, biar modal atas ga kepanggil 
            $('.disabled').prop('disabled', true);
            $('#hide-input').hide()
            $('.method-pembayaran').attr("readonly", true);
        });


        $('#ubah').click(function() {
            $('.readonly-class').attr("readonly", false);
            // $('.disabled').prop('disabled', false);
        })

        $('#lunas').click(function() {
            $('.pelunasan-class').attr("readonly", false);
            $('.readonly-class').attr("readonly", true);
            $('#hide-input').show()
        })

        $('#pilihpembayaran').change(function() {
            if ($(this).val() == "1") {
                $('.method-pembayaran').attr("readonly", false);
            } else {
                $('.method-pembayaran').attr("readonly", true);

            }

        })
        $('input[name="sisa_bayar"]').focusin(function() {
            if ($('input[name="uang_muka"]').val() != "") {
                var sisaBayar = $('input[name="total"]').val() - $('input[name="uang_muka"]').val()
                $('input[name="sisa_bayar"]').val(sisaBayar)
            }
        })
        $('input[name="liveSearch"]').keypress(function() {
            $('#livesearch').show();
            $.ajax({
                type: "POST",
                url: '/pt-progress/admin/klien/getNamaKlien/',
                data: {
                    filter: $(this).val()
                },
                success: function(data) {
                    console.log(data)
                    $('#livesearch').html(data).promise().done(function() {
                        $('.clientResult').click(function() {
                            $.get('/pt-progress/admin/klien/getAlamatKlien/' + $(this).data('id'), function(data) {
                                console.log(data)
                                $('#alamat-klien').val(data)
                            });

                            $.get('/pt-progress/admin/transaksi/So/GetDataSo/' + $(this).data('id'), function(data) {
                                console.log(data)
                                $('#DataSo').html(data)
                            });
                            $('input[name="liveSearch"]').val($(this).text().substring(2, 50))
                            $('#livesearch').hide();
                            $('input[name="id_klien2"]').val($(this).data('id'))
                        })
                    })

                }
            });
        })
        //$ adalah jquery, # adalah id, . titik adalah nama class,  () adalah isi function yang mau yg mau dieksekusi 
        // ready ini untuk pertama kali halaman dibuka, ready itu untuk panggil 
        // prop itu sama kaya atr atau atribut
    </script>
</footer>

</html>