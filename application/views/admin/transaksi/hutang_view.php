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
                                        <h4 align="center"><strong>Pembayaran Media </strong></h4>
                                    </div>

                                    <div class="card-body">
                                        <!-- TABEL UNTUK MENAMPILKAN DATA ADA-->
                                        <table class="table table-striped table-bordered" id="tblPenjualan">
                                            <!--id ini untuk manggil jquery-->
                                            <thead>
                                                <?php $no = 1 ?>
                                                <tr align="center">
                                                    <th> No.invoice </th>
                                                    <th> Tanggal </th>
                                                    <th> Nama Media </th>
                                                    <th> Total Terhutang </th>
                                                    <th> Aksi </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> InvByr/2001/001 </td>

                                                    <td> <a class="btn btn-info" href="#" data-toggle="modal" data-target=".modal-detail">Detail</a></td>
                                                </tr>

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
                                    <table class="table table-striped">
                                        <div class="input-group">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="align-middle">No</th>
                                                    <th rowspan="2" class="align-middle">No.So</th>
                                                    <!-- <th rowspan="2" class="align-middle">No.Inv Iklan</th> -->
                                                    <th rowspan="2" class="align-middle">Nama Klien </th>
                                                    <th colspan="2"> Size </th>
                                                    <th rowspan="2" class="align-middle"> Terhutang </th>

                                                </tr>
                                                <tr>
                                                    <th> Mmk </th>
                                                    <th> Kol </th>
                                                </tr>
                                            </thead>
                                            <tbody id="DataHutang">
                                                <?php $grandtotal = 0; ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                                                <label for="penjualan" class="col-sm-5 col-form-label">Total Bayar </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="terhutang" class="form-control" required='' autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">Proposed</div>
                                        <div class="col-sm-3"> Approved </div>
                                        <div class="col-sm-3"> Approved </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">Admin </div>
                                        <div class="col-sm-3"> Pak Santo </div>
                                        <div class="col-sm-3"> Pak Erwin </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>
                                    <button type="submit" class="hide" id="button_simpan"></button>
                                    <button type="button" class="btn btn-primary btn-save">Save </button>
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
                                                    <input type="text" name="terhutang" class="form-control" required='' autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">Proposed</div>
                                        <div class="col-sm-3"> Approved </div>
                                        <div class="col-sm-3"> Approved </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">Admin </div>
                                        <div class="col-sm-3"> Pak Santo </div>
                                        <div class="col-sm-3"> Pak Erwin </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary" onclick="$('#tambah_hutang').submit()">Simpan </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/hutang') ?>">Back</button>

                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php // echo site_url('admin/transaksi/hutang') 
                                                                                                                    ?>">Back</button>
                                    <button type="button" class="btn btn-primary btn-save">Save </button> -->
                                </div>
                        </div> <!-- AKHIR ROW-->
                    </div> <!-- AKHIR CONTAINER-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Akhir Modal Detail  -->

<!-- Modal Search dalam modal-->
<!-- <div class="modal fade ModalFaktur " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Faktur Belum Lunas</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col-sm-2"> </th>
                            <th scope="col">No.Po </th>
                            <th scope="col">Tgl Invoice</th>
                            <th scope="col">No Invoice</th>
                            <th scope="col">Jatuh Tempo </th>
                            <th scope="col">Terhutang</th>
                            <th scope="col">Sisa Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input scope="row" type="checkbox" name="language[]" value=""></th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            </form>
                        </tr>
                        <tr>
                            <th><input scope="row" type="checkbox" name="language[]" value=""></th>
                            <td>Jacob</td>
                            <td>Mark</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th><input scope="row" type="checkbox" name="language[]" value=""></th>s
                            <td>Larry</td>
                            <td>Mark</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Lanjut</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Akhir Modal Search dalam modal-->



<script type="text/javascript">
    $(document).ready(function() {
        $('#livesearch').hide();
        $('#tblPenjualan').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
        $('.readonly-class').attr("readonly", true); // form-control readonly-class yg dipanggil salah satunya aja gpp, biar modal atas ga kepanggil 
        $('.disabled').prop('disabled', true);
        $('#hide-input').hide()
        $('.method-pembayaran').attr("readonly", true);

    });

    // $('input[name="sisa_bayar"]').focusin(function() {
    //     if ($('input[name="uang_muka"]').val() != "") {
    //         var sisaBayar = $('input[name="total"]').val() - $('input[name="uang_muka"]').val()
    //         $('input[name="sisa_bayar"]').val(sisaBayar)
    //     }
    // })

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
</script>

</html>