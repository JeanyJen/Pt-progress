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
                        <div class="card o-hidden border-0 shadow-lg my-auto col-lg-auto mx-auto">
                            <div class="card header bg-dark">
                                <!-- HEADER TABLE -->
                                <h4 class="card-title text-light" align="center"> Data Employee </h4>
                            </div>

                            <div class="card-body">

                                <?php
                                if (!$this->session->flashdata('Info') == '') {
                                    echo $this->session->flashdata('Info');
                                }
                                ?>
                                <!-- TABEL UNTUK MENAMPILKAN DATA YANG SUDAH DIPANGGIL-->
                                <table class="table table-striped table-bordered" id="nip_karyawan">
                                    <thead>
                                        <tr align="center">
                                            <th width="2"> No </th>
                                            <th width="10"> Nip </th>
                                            <th> Name </th>
                                            <th width="200"> Department </th>
                                            <th width="100"> Posisi </th>
                                            <th width="100"> Join Date </th>
                                            <th width="10"> Aksi </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1 ?>
                                        <!-- DIBUAT LOOPING DARI FOREACH -->
                                        <?php foreach ($tabel_karyawan as $tampil) : ?>
                                            <!-- DATA DISINI ADALAH NAMA ARRAY-->
                                            <tr>
                                                <td> <?php echo $no++ ?> </td> <!-- MENAMPILKAN NOMOR-->
                                                <td> <?php echo $tampil->nip_karyawan ?> </td> <!-- MENAMPILKAN ID -->
                                                <td> <?php echo $tampil->nama_karyawan ?> </td> <!-- MENAMPILKAN FIELD NAMA karyawan-->
                                                <td> <?php echo $tampil->bagian_karyawan ?> </td> <!-- MENAMPILKAN FIELD ALAMAT karyawan-->
                                                <td> <?php echo $tampil->jabatan_karyawan ?> </td> <!-- MENAMPILKAN FIELD TELP karyawan-->
                                                <td> <?php echo $tampil->tgl_msk_karyawan ?> </td> <!-- MENAMPILKAN FIELD EMAIL karyawan-->
                                                <td>
                                                    <button <?= ($this->session->role_id != 'manager' ? "disabled" : "") ?> class="btn btn-info btn-sm" onclick="redirectto('<?php echo site_url('admin/karyawan/edit/' . $tampil->nip_karyawan . '') ?>')" href="#"> <i class="fa fa-pencil-alt"></i> </button>
                                                    <button <?= ($this->session->role_id != 'manager' ? "disabled" : "") ?> class="btn btn-danger btn-sm" href="#" onclick="hapus_nip('<?= $tampil->nip_karyawan ?>')"> <i class="fa fa-trash-alt"></i> </button>
                                                </td>
                                                <!-- KITA BUTUH SEBUAH TOMBOL UNTUK MENGARAHKAN KITA KE FORM EDIT -->
                                            </tr>
                                        <?php endforeach ?>
                                        <!-- akhir foreach -->
                                    </tbody>
                                </table>
                                <a class="btn btn-info btn-flat" href="#" data-toggle="modal" data-target="#exampleModal"> Add Data </a> <!-- untuk button Tambah Data -->
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


<!--  Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/karyawan/simpan') ?>" method="POST" id="tambah_karyawan">
                    <!-- karyawan/simpan ini diambil dari kelas yang ada di controller, action ini artinya jika diklik tombol submit ntar diarahin kemana? -->
                    <h3 align="center"> Tambah Data</h3>

                    <form action="" method="POST">
                        <label for="basic-url">Nama</label>
                        <div class="input-group mb-3">
                            <input type="text" name="nama_karyawan" class="form-control" placeholder="" required='' autocomplete="off">
                        </div>

                        <label for="basic-url">Department </label>
                        <div class="input-group mb-3">
                            <input type="text" name="bagian_karyawan" class="form-control" placeholder="" required='' autocomplete="off">
                        </div>

                        <label for="basic-url">Posisi </label>
                        <div class="input-group mb-3">
                            <input type="text" name="jabatan_karyawan" class="form-control" placeholder="" required='' autocomplete="off">
                        </div>

                        <label for="basic-url">Join Date </label>
                        <div class="input-group mb-3">
                            <input type="text" name="tgl_msk_karyawan" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off">
                        </div>
                        <button type="submit" class="hide" id="button_simpan"></button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/karyawan') ?>">Back</button>
                <button type="button" class="btn btn-primary btn-save">Save </button>
                <!-- $ itu jquery, # itu id, tambah_karyawan itu nama id, submit itu simpan sesuai id-->
            </div>
        </div>
    </div>
</div>

<!--  Akhir Modal Tambah  -->


<?php if (isset($data_edit)) { ?>
    <!-- Modal Edit-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- id disini harus sama dengan apa yg dipanggil di script js-->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/karyawan/simpan_edit') ?>" method="POST" id="edit_karyawan">
                        <!-- diubah ke simpan edit -->

                        <?php foreach ($data_edit as $data_edit) : ?>
                            <!-- JANGAN LUPA TAMBAHKAN INPUT HIDDEN UNTUK  id_karyawan | ini fungsinya untuk memberi tahu kedatabase nantinya id mana yang akan di update-->
                            <input type="text" name="nip_karyawan" hidden value="<?php echo $data_edit->nip_karyawan ?>">

                            <label for="basic-url">Nama </label>
                            <div class="input-group mb-3">
                                <!-- SEKARANG KITA AMBIL DATANYA DAN INPUTKAN KE DALAM INPUT -->
                                <input type="text" name="nama_karyawan" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->nama_karyawan ?>">
                            </div>

                            <label for="basic-url">Division </label>
                            <div class="input-group mb-3">
                                <input type="text" name="bagian_karyawan" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->bagian_karyawan ?>">
                            </div>

                            <label for="basic-url">Department </label>
                            <div class="input-group mb-3">
                                <input type="text" name="jabatan_karyawan" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->jabatan_karyawan ?>">
                            </div>

                            <label for="basic-url">Join Date </label>
                            <div class="input-group mb-3">
                                <input type="text" name="tgl_msk_karyawan" class="form-control" placeholder="yyyy-mm-dd" required='' autocomplete="off" value="<?php echo $data_edit->tgl_msk_karyawan ?>">
                            </div>
                        <?php endforeach ?>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/karyawan') ?>">Back</button>
                    <button type="button" class="btn btn-primary" onclick="$('#edit_karyawan').submit()">Save </button>
                    <!-- $ itu jquery, # itu id, tambah_karyawan itu nama id, submit itu simpan sesuai id-->
                </div>
            </div>
        </div>
    </div>
    <script>
        //alert('aaa')
        $('#edit').modal('show'); // buat tampilim 
        // modal titik itu artinya nyambung 
    </script>
<?php } ?>
<!-- Akhir Modal Edit -->

<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nip_karyawan').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });

    function hapus_nip(nip_karyawan) {
        if (confirm("yakin hapus?")) {
            window.location.href = 'karyawan/hapus/' + nip_karyawan
        }
    }

    function redirectto(url) { // pindahkan halaman ke
        window.location.href = url; //
    }

    $('.btn-save').click(function() {
        $('#button_simpan').click();
    })
</script>