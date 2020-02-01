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
                                        <h4 align="center"><strong>Laporan Pembayaran </strong></h4>
                                    </div>

                                    <div class="card-body">

                                        <!-- TABEL UNTUK MENAMPILKAN DATA ADA-->
                                        <table class="table table-striped table-bordered" id="tblPenjualan">
                                            <thead>
                                                <tr align="center">
                                                    <th> No </th>
                                                    <th> Tanggal Inv </th>
                                                    <th> No.Inv </th>
                                                    <th> Nama Media </th>
                                                    <th> Jumlah Iklan </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1</td>
                                                    <td> 2 -Januari-2020 </td>
                                                    <td> InvByr/2001/001 </td>
                                                    <td> Bisnis Indonesia (PT. Jurnalindo Aksara Grafika) </td>
                                                    <td> Rp 75.000.000</td>
                                                </tr>
                                                <tr>
                                                    <td> 2</td>
                                                    <td> 12-Januari-2020</td>
                                                    <td> InvByr/2001/001 </td>
                                                    <td> PT. Fajar National Network </td>
                                                    <td> Rp 125.000.000 </td>
                                                </tr>
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
        $('#tblPenjualan').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });
</script>