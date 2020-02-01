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
                                <div class="card o-hidden border-0 shadow-lg my-auto col-lg-auto mx-auto">
                                    <div class="card header">
                                        <!-- HEADER TABLE -->
                                        <h4 align="center"><strong>Pembuatan SO </strong></h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- TABEL UNTUK MENAMPILKAN DATA ADA-->
                                        <a class="btn btn-info col-sm-1" href="#" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>
                                        <table class="table table-striped table-bordered" id="tblSo">
                                            <!--id ini untuk manggil jquery-->
                                            <thead>
                                                <tr align="center">
                                                    <th width="2"> No </th>
                                                    <th> Name Klien </th>
                                                    <th width="200"> Total Gross </th>
                                                    <th width="5"> % </th>
                                                    <th width="200"> Total Nett </th>
                                                    <th width="2"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($ambil_so as $tampil) { ?>
                                                    <tr>
                                                        <td> <?php echo $no++ ?> </td>
                                                        <td> <?php echo $tampil->nama_klien ?> </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->gross) ?>
                                                        </td>
                                                        <td> <?php $this->load->helper('diskon');
                                                                echo diskon($tampil->disc) ?>
                                                        </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->nett)  ?>
                                                        </td>
                                                        <td><a class=" btn btn-info btn-sm " href="<?php echo site_url('admin/transaksi/So/detail/') . $tampil->id_klien ?>"><i class="fa fa-file-alt"></i></a>

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



                    <!-- Sticky Footer -->
                    <?php $this->load->view("admin/_partials/footer.php") ?>

                </div> <!-- /.content-wrapper -->
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
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/transaksi/So/simpan') ?>" method="POST" id="tambah_so">
                    <!-- karyawan/simpan ini diambil dari kelas yang ada di controller, action ini artinya jika diklik tombol submit ntar diarahin kemana? -->

                    <label for="basic-url">Number So</label>
                    <div class="input-group mb-3">
                        <input type="text" name="no_so" class="form-control" placeholder="" required='' autocomplete="off">
                    </div>

                    <label for="basic-url">Name Klien </label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="id_klien">
                            <?php foreach ($so_klien as $tampil) { ?>
                                <option value="<?= $tampil->id_klien ?>"> <?= $tampil->nama_klien ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="basic-url">Name Media </label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="id_media">
                            <?php foreach ($so_media as $tampil) { ?>
                                <option value="<?= $tampil->id_media ?>"> <?= $tampil->nama_media ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Column</th>
                                <th scope="col">MMK</th>
                                <th scope="col">Price</th>
                                <!-- <th scope="col">Gross</th> -->
                                <th scope="col">Disc</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="kol" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                <td><input type="text" name="mmk" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                <td><input type="text" name="price" class="form-control" placeholder="" required='' autocomplete="off"></td>
                                <!-- <td><input type="text" value="" name="gross" class="form-control" placeholder="" required='' autocomplete="off"></td> -->
                                <td><input type="text" name="disc" class="form-control" placeholder="" required='' autocomplete="off"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="hide" id="button_simpan"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/So') ?>">Back</button>
                <button type="button" class="btn btn-primary btn-save">Save </button>
                <!-- $ itu jquery, # itu id, tambah_so itu nama id, submit itu simpan sesuai id-->
            </div>
        </div>
    </div>
</div>
<!--  Akhir Modal Tambah  -->



<script type="text/javascript">
    $(document).ready(function() {
        $('#tblSo').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });

    $('.btn-save').click(function() {
        $('#button_simpan').click();
    })



    //$ adalah jquery, # adalah id, . titik adalah nama class,  () adalah isi function yang mau yg mau dieksekusi 
    // ready ini untuk pertama kali halaman dibuka, ready itu untuk panggil 
    // prop itu sama kaya atr atau atribut
</script>

</html>