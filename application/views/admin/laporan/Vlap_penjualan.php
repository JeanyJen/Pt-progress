<!-- akan menjadi template  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- INI DALAH FILE CSS YANG DI BUAT DATATABLES BOOSTRAP -->
    <link type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- INI CSS BOOSTRAP 4-->
    <link type="text/css" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> <!-- INI DATA TABLES BOOSTRAP 4-->
    <?php $this->load->view("admin/_partials/head.php") ?>
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
                                        <h4 align="center"><strong>Laporan Penjualan </strong></h4>
                                    </div>

                                    <div class="card-body">
                                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('laporanpdf/print_lap_penj') ?>"> print </a>
                                        <!-- <form method="post" id="form1" action="<?php ?>">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-1"> Tanggal</label>
                                                    <input name="tgl-awal" type="date" style="width:auto;">
                                                    <label>s/d</label>
                                                    <input name="tgl-akhir" type="date" style="width:auto;">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-1"> </label>
                                                    <button class="bn btn-primary" type="submit" type="button"> <i class=glyphicon glyphicon-refresh></i> View Date Laporan </button>
                                                </div>
                                            </div>
                                        </form> -->
                                        <table class="table table-striped table-bordered" id="search-lap">
                                            <thead>
                                                <tr align="center">
                                                    <th> No.invoice </th>
                                                    <th> Tanggal </th>
                                                    <th> Dipesan Oleh </th>
                                                    <th> Total Nett </th>
                                                    <!-- <th> Marketing </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($laporan_penjualan as $tampil) { ?>

                                                    <tr>
                                                        <td> <?php echo $tampil->no_invoice_penj ?></td>
                                                        <td> <?php echo $tampil->tgl_invoice_penj ?></td>
                                                        <td> <?php echo $tampil->nama_klien ?></td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->nett) ?>
                                                        </td>
                                                        <!-- <td> <?php // echo $tampil->user 
                                                                    ?></td> -->
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
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search-lap').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });
</script>