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
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="penjualan" class="col-sm-3 col-form-label"> No.Inv </label>
                                            <div class="col-sm-6">
                                                <input size="30" value="<?php echo $detail[0]->no_invoice_penj ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="penjualan" class="col-sm-3 col-form-label"> Di pesan oleh </label>
                                            <div class="col-sm-6">
                                                <input size="30" value="<?php echo $detail[0]->nama_klien ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="penjualan" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="alamat-klien" value="<?php echo $detail[0]->alamat_klien ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="penjualan" class="col-sm-4 col-form-label">Tgl.Inv</label>
                                            <div class="col-sm-6">
                                                <input size="30" value="<?php echo $detail[0]->tgl_invoice_penj ?>" readonly>
                                            </div>
                                        </div>
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
                                                <input type="text" class="form-control" value="<?php echo $detail[0]->nip_karyawan ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr align="center">
                                    <!-- <th rowspan="2" class="align-middle"> No.Inv </th> -->
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
                            <tbody>
                                <?php $grandtotal = 0; ?>
                                <?php foreach ($detail as $tampil) : ?>
                                    <?php $grandtotal = $grandtotal + $tampil->nett ?>
                                    <tr>
                                        <!-- <td> <?php //echo $tampil->no_invoice_penj 
                                                    ?></td> -->
                                        <td> <?php echo $tampil->no_so2 ?></td>
                                        <td> <?php echo $tampil->nama_media ?></td>
                                        <td> <?php echo $tampil->mmk ?></td>
                                        <td> <?php echo $tampil->kol ?></td>
                                        <td> <?php $this->load->helper('rupiah_helper');
                                                echo rupiah($tampil->price) ?>
                                        </td>
                                        <td> <?php $this->load->helper('rupiah_helper');
                                                echo rupiah($tampil->gross) ?>
                                        </td>
                                        <td> <?php $this->load->helper('diskon_helper');
                                                echo diskon($tampil->disc) ?>
                                        </td>
                                        <td> <?php $this->load->helper('rupiah_helper');
                                                echo rupiah($tampil->nett) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="table-secondary"> Total </td>
                                    <td class="table-secondary">
                                        <?php $this->load->helper('rupiah_helper');
                                        echo rupiah($grandtotal)   ?>
                                    </td>
                                </tr>
                            </tfoot>
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
                                    <!-- <label for="penjualan" class="col-sm-5 col-form-label "> Metode Pembayaran </label> -->
                                    <div class="col-sm-7">
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
                                        <input type="text" value="<?php $this->load->helper('rupiah_helper');
                                                                    echo rupiah($tampil->uang_muka) ?>" class="form-control method-pembayaran" readonly>
                                    </div>

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
                                    <input type="text" value="<?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->sisa_bayar) ?>" class="form-control" name="sisa_bayar" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="penjualan" class="col-sm-5 col-form-label"> Bayar</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="no_invoice_penj">
                                    <input type="text" name="input_bayar" class="form-control" value="<?php $this->load->helper('rupiah_helper');
                                                                                                        echo rupiah($tampil->bayar) ?>" placeholder="masukkan pembayaran">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="button" value="Edit">
                    <input class="btn btn-primary" type="submit" value="pelunasan" id="lunas">
                    <input class="btn btn-primary" type="submit" value="Kembali">


                </div>
                <!-- /.container-fluid -->


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


<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#no_so').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
        });

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
    </script>
</footer>

</html>