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
                        <div class="container">

                            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
                                <!-- mx-auto untuk margin center versi boostrap4-->
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col-lg">
                                            <div class="p-12">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                                </div>
                                                <form class="user" method="post" action="<?php echo base_url('auth/registration');
                                                                                            ?>">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                                    <a class="small" href="<?php echo base_url('auth');
                                                                            ?>">Already have an account? Login!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div> <!-- AKHIR COLOM -->
                </div> <!-- AKHIR ROW -->
            </div> <!-- AKHIR CONTAINER -->
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div> <!-- /.content-wrapper -->



        <?php $this->load->view("admin/_partials/footer.php") ?>
        <!-- sticky footer-->

    </div><!-- /.content-wrapper -->

    </div><!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>
<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->



</footer>

</html>