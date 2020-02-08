<!-- akan menjadi template  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- INI DALAH FILE CSS YANG DI BUAT DATATABLES BOOSTRAP -->
    <link type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- INI CSS BOOSTRAP 4-->
    <link type="text/css" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> <!-- INI DATA TABLES BOOSTRAP 4-->
    <script src="development-bundle/jquery-1.6.2.js">
    </script>
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
                                        <h4 align="center"><strong>Pembayaran Media </strong></h4>
                                    </div>

                                    <div class="card-body">
                                        <!-- TABEL UNTUK MENAMPILKAN DATA ADA-->
                                        <table class="table table-striped table-bordered" id="tblPenjualan">
                                            <!--id ini untuk manggil jquery-->
                                            <thead>

                                                <tr align="center">
                                                    <th width="2"> No </th>
                                                    <th width="100"> No.invoice </th>
                                                    <th> Nama Media </th>
                                                    <th width="200"> Total Terbayar </th>
                                                    <th width="2"> Aksi </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($ambil_hutang as $tampil) { ?>
                                                    <tr>
                                                        <td> <?php echo $no++ ?> </td>
                                                        <td> <?php echo $tampil->no_invoice_pemb ?> </td>
                                                        <td> <?php echo $tampil->nama_media ?> </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->terhutang)  ?>
                                                        </td>
                                                        <td><a class=" btn btn-info btn-sm " href="<?php echo site_url('admin/transaksi/Hutang/detail/') . $tampil->id_media ?>"><i class="fa fa-file-alt"></i></a></td>
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


                    <a class="btn btn-info" href="#" data-toggle="modal" data-target=".modal-tambah">Tambah</a>
                    <!-- Sticky Footer -->
                    <?php $this->load->view("admin/_partials/footer.php") ?>

                </div>
                <!-- /.content-wrapper -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>
                <?php $this->load->view("admin/_partials/scrolltop.php") ?>
                <?php $this->load->view("admin/_partials/modal.php") ?>
                <?php $this->load->view("admin/_partials/js.php") ?>
</body>


<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->
</footer>

<!--  Modal Tambah -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-md-6 big-box">

            <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                <!--fade itu kaya biar ada efek efek pas muncul -->
                <div class="modal-dialog modal-xl">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h3><strong>Pembayaran Iklan </strong></h3>

                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('admin/transaksi/Hutang/simpan') ?>" method="POST" id="tambah_hutang">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"> Pembayaran untuk</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" size="30" name="liveSearch" class="form-control" autocomplete="off">
                                                            <div id="livesearch">
                                                            </div>
                                                            <input type="hidden" name="id_media2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label for="penjualan" class="col-sm-3 col-form-label"> Account Bank</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="bank-media" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="col-sm-6"> </div>
                                                <div class="col-sm-6">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <table class="table table-striped" id="rowTable"> -->
                                    <table class="table table-striped" id="tabelku">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle">Inv Pembayaran </th>
                                                <th rowspan="2" class="align-middle">Nama Klien </th>
                                                <th colspan="2"> Size </th>
                                                <th rowspan="2" class="align-middle"> Price </th>
                                                <th rowspan="2" class="align-middle"> Terhutang </th>
                                            </tr>
                                            <tr>
                                                <th> Mmk </th>
                                                <th> Kol </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr class="TambahBaris"> -->
                                            <tr>
                                                <td><input type="text" name="no_invoice_pemb" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                                <td><select class="form-control" name="id_klien">
                                                        <?php foreach ($hutang_klien as $tampil) { ?>
                                                            <option value="<?= $tampil->id_klien ?>"> <?= $tampil->nama_klien ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="kol" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                                <td><input type="text" name="mmk" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                                <td><input type="text" name="price" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                                <td><input type="text" name="terhutang" class="form-control terhutang" placeholder="" required='' autocomplete="off" readonly></td>
                                            </tr>
                                        </tbody>
                                        <!-- <input id="addRow" type="button" value="Tambah Baris (+)" />
                                        <input id="deleteRow" type="button" value="Hapus Baris (-)" /> -->
                                        <tfoot>
                                            <td colspan="3"><input type="button" value="Tambah Baris" onclick="tambah_baris()" /></td>
                                        </tfoot>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label for="penjualan" class="col-sm-5 col-form-label">Total Bayar </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="totalBayar" readonly class="form-control" required='' autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <button type="submit" class="hide" id="button_simpan"></button> -->
                                    <button type="submit" class="btn btn-primary btn-save" id="button_simpan">Save </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/hutang') ?>">Back</button>
                                </div>
                            </form>
                        </div> <!-- AKHIR ROW-->
                    </div> <!-- AKHIR CONTAINER-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Akhir Modal Tambah  -->

<!--  Modal Detail -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-md-6 big-box">

            <div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
                <!--fade itu kaya biar ada efek efek pas muncul -->
                <div class="modal-dialog modal-xl">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h3><strong>Pembayaran Iklan </strong></h3>

                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('admin/transaksi/hutang/simpan') ?>" method="POST" id="tambah_hutang">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"> Pembayaran untuk</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" size="30" name="liveSearch" class="form-control" autocomplete="off">
                                                            <div id="livesearch">
                                                            </div>
                                                            <input type="hidden" name="id_media2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label for="penjualan" class="col-sm-3 col-form-label"> Account Bank</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="bank-media" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="col-sm-6"> </div>
                                                <div class="col-sm-6">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped">
                                        <div class="input-group">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">No.SO</th>
                                                    <th scope="col">Tgl.So</th>
                                                    <th scope="col">Nama Klien </th>
                                                    <th scope="col">Terhutang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>Otto</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>Otto</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>Otto</td>
                                                </tr>
                                                <tr class="table-active">
                                                    <th scope="row" colspan="3"> Total </th>
                                                    <td>Otto</td>
                                                    <td>Otto</td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3"> </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <label for="basic-url" class="col-sm-5 col-form-label">Total Bayar </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" required='' autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="$('#tambah_hutang').submit()">Simpan </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/hutang') ?>">Back</button>
                    </div>
                </div> <!-- AKHIR ROW-->
            </div> <!-- AKHIR CONTAINER-->
        </div>
    </div>
</div>
</div>
</div>
<!--  Akhir Modal Detail  -->





<script type="text/javascript">
    $(document).ready(function() {
        $('#livesearch').hide();
        $('#tblPenjualan').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
        $('.readonly-class').attr("readonly", true); // form-control readonly-class yg dipanggil salah satunya aja gpp, biar modal atas ga kepanggil 
        $('.disabled').prop('disabled', true);
        $('#hide-input').hide()
        $('.method-pembayaran').attr("readonly", true);

    });


    $('input[name="nett"]').focusin(function() {
        if ($('input[name="price"]').val() != "") {
            var hasilNett = $('input[name="price"]').val() * $('input[name="disc"]').val()
            $('input[name="nett"]').val(hasilNett)
        }
    })

    $('.btn-save').click(function() {
        $('#button_simpan').click();
    })

    $('input[name="liveSearch"]').keypress(function() {
        $('#livesearch').show();
        $.ajax({
            type: "POST",
            url: '/pt-progress/admin/media/getNamaMedia/',
            data: {
                filter: $(this).val()
            },
            success: function(data) {
                console.log(data)
                $('#livesearch').html(data).promise().done(function() {
                    $('.mediaResult').click(function() {
                        $.get('/pt-progress/admin/media/getBankMedia/' + $(this).data('id'), function(data) {
                            console.log(data)
                            $('#bank-media').val(data)
                        });

                        $.get('/pt-progress/admin/transaksi/So/GetDataSoPemb/' + $(this).data('id'), function(data) {
                            console.log(data)
                            $('#DataHutang').html(data)

                        });
                        $('input[name="liveSearch"]').val($(this).text().substring(2, 50))
                        $('#livesearch').hide();
                        $('input[name="id_media2"]').val($(this).data('id'))

                    })
                })

            }
        });
    })
    $('input[name="totalBayar"]').focus(function() {
        var totalBayar = 0;
        $('input[name="terhutang"]').each(function() {
            console.log($(this).val())
            totalBayar += $(this).val() * 1; //<==== a catch  in here !! read below
        });
        console.log(totalBayar)
        $('#totalSo').text(totalBayar)
        $(this).val(totalBayar)
    })

    $('.terhutang').focusin(function() {
        if ($('input[name="price"]').val() != "") {
            var sisaBayar = $('input[name="price"]').val() * $('input[name="kol"]').val() * $('input[name="mmk"]').val()
            $(this).val(sisaBayar)
        }
    })
    //$ adalah jquery, # adalah id, . titik adalah nama class,  () adalah isi function yang mau yg mau dieksekusi 
    // ready ini untuk pertama kali halaman dibuka, ready itu untuk panggil 
    // prop itu sama kaya atr atau atribut
</script>


</html>