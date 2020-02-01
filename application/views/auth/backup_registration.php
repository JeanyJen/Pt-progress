<!-- <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto"> -->
<!-- mx-auto untuk margin center versi boostrap4-->
<!-- <div class="card-body p-0"> -->
<!-- Nested Row within Card Body -->
<!-- <div class="row"> -->
<!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
<!-- <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?php // echo base_url('auth/registration'); 
                                                                    ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php // echo base_url('auth'); 
                                                    ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> -->


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
                <div class="row">
                    <!-- TAMBAHKAN ROW-->
                    <div class="col-sm-12">
                        <!-- TAMBAHKAN COLOM -->
                        <br>
                        <div class="card">
                            <div class="card header bg-success">
                                <!-- HEADER TABLE -->
                                <h4 class="card-title text-light" align="center"> Data User </h4>
                            </div>

                            <div class="card-body">

                                <?php
                                if (!$this->session->flashdata('Info') == '') {
                                    echo $this->session->flashdata('Info');
                                }
                                ?>
                                <!-- TABEL UNTUK MENAMPILKAN DATA YANG SUDAH DIPANGGIL-->
                                <table class="table table-striped table-bordered" id="id_vendor">
                                    <thead>
                                        <tr align="center">
                                            <th> No </th>
                                            <th> ID </th>
                                            <th> NAMA </th>

                                            <th colspan='2'> Aksi </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1 ?>
                                        <!-- DIBUAT LOOPING DARI FOREACH -->
                                        <?php //foreach ($tabel_vendor as $tampil) : 
                                        ?>
                                        <!-- DATA DISINI ADALAH NAMA ARRAY-->
                                        <tr>
                                            <td> <?php // echo $no++ 
                                                    ?> </td> <!-- MENAMPILKAN NOMOR-->
                                            <td> <?php //echo $tampil->id_vendor 
                                                    ?> </td> <!-- MENAMPILKAN ID -->
                                            <td> <?php //echo $tampil->nama_vendor 
                                                    ?> </td> <!-- MENAMPILKAN FIELD NAMA VENDOR-->

                                            <!--  KITA BUTUH SEBUAH TOMBOL UNTUK MENGARAH KITA KE FORM EDIT  -->
                                            <!-- <td>
                                                    <a class="btn btn-info btn-sm" href="<?php //echo site_url('admin/vendor/edit/' . $tampil->id_vendor . '') 
                                                                                            ?>"> Edit </a>
                                                </td>
                                                KITA BUTUH SEBUAH TOMBOL UNTUK MENGARAHKAN KITA KE FORM EDIT -->
                                            <!-- <td>
                                                    <a class="btn btn-danger btn-sm" href="<?php //echo site_url('admin/vendor/hapus/' . $tampil->id_vendor . '') 
                                                                                            ?>"> Hapus </a>
                                                </td> -->
                                        </tr>
                                        <?php //endforeach 
                                        ?>
                                        <!-- akhir foreach -->
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </tfoot>

                                </table>
                                <a class="btn btn-info btn-flat" href="#" data-toggle="modal" data-target="#exampleModal"> Tambah Data </a> <!-- untuk button Tambah Data -->
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


        <!-- Sticky Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-20 mx-auto">
                            <!-- mx-auto untuk margin center versi boostrap4 -->
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                                    <div class="col-lg">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Menambah User Baru</h1>
                                            </div>
                                            <form class="user" method="post" action="<?php echo base_url('auth/registration'); ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" autocomplete="off" required>

                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" autocomplete="off">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" autocomplete="off">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password" autocomplete="off">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Daftar Akun
                                                </button>

                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="<?php echo base_url('auth'); ?>">Already have an account? Login!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>
<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->

    <!-- INI UNTUK INIALISASI DATA TABLES KITAKE TABLE KITA -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_vendor').DataTable(); //EXAMPLE ADALAH iD DARI TABLE (untuk tombol search)
        });
    </script>
</footer>

</html>