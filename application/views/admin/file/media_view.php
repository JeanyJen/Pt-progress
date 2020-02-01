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
                                <h4 class="card-title text-light" align="center"> Data Media </h4>
                            </div>

                            <div class="card-body">

                                <?php
                                if (!$this->session->flashdata('Info') == '') {
                                    echo $this->session->flashdata('Info');
                                }
                                ?>
                                <!-- TABEL UNTUK MENAMPILKAN DATA YANG SUDAH DIPANGGIL-->
                                <table class="table table-striped table-bordered" id="id_media">
                                    <thead>
                                        <tr align="center">
                                            <th width="2"> No </th>
                                            <th> Id </th>
                                            <th> Nama </th>
                                            <th> Alamat </th>
                                            <th> Telephone </th>
                                            <th> Email </th>
                                            <th> Nama Rekening </th>
                                            <th> Nomor Rekening </th>
                                            <th> Bank </th>
                                            <th> Cabang </th>
                                            <th width="50"> Aksi </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1 ?>
                                        <!-- DIBUAT LOOPING DARI FOREACH -->
                                        <?php foreach ($tabel_media as $tampil) : ?>
                                            <!-- DATA DISINI ADALAH NAMA ARRAY-->
                                            <tr>
                                                <td> <?php echo $no++ ?> </td> <!-- MENAMPILKAN NOMOR-->
                                                <td> <?php echo $tampil->id_media ?> </td> <!-- MENAMPILKAN ID -->
                                                <td> <?php echo $tampil->nama_media ?> </td> <!-- MENAMPILKAN FIELD NAMA media-->
                                                <td> <?php echo $tampil->alamat_media ?> </td> <!-- MENAMPILKAN FIELD ALAMAT media-->
                                                <td> <?php echo $tampil->tlp_media ?> </td> <!-- MENAMPILKAN FIELD TELP media-->
                                                <td> <?php echo $tampil->email_media ?> </td> <!-- MENAMPILKAN FIELD EMAIL media-->
                                                <td> <?php echo $tampil->nama_rekening_media ?> </td> <!-- MENAMPILKAN FIELD NAMA REKENING media-->
                                                <td> <?php echo $tampil->account_media ?> </td> <!-- MENAMPILKAN FIELD ACCOUNT media-->
                                                <td> <?php echo $tampil->bank_media ?> </td> <!-- MENAMPILKAN FIELD BANK media-->
                                                <td> <?php echo $tampil->cabang_media ?> </td> <!-- MENAMPILKAN FIELD CABANG media-->
                                                <!--  KITA BUTUH SEBUAH TOMBOL UNTUK MENGARAH KITA KE FORM EDIT  -->
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/media/edit/' . $tampil->id_media . '') ?>"> <i class="fa fa-pencil-alt"></i> </a>
                                                    <button <?= ($this->session->role_id != 'manager' ? "disabled" : "") ?> class="btn btn-danger btn-sm" href="#" onclick="hapus_id('<?= $tampil->id_media ?>')"> <i class="fa fa-trash-alt"></i> </button>
                                                </td>
                                                <!-- KITA BUTUH SEBUAH TOMBOL UNTUK MENGARAHKAN KITA KE FORM EDIT -->

                                            </tr>
                                        <?php endforeach ?>
                                        <!-- akhir foreach -->
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </tfoot>

                                </table>
                                <?php if ($this->session->role_id != 'marketing') { ?>
                                    <a class="btn btn-info btn-flat" href="#" data-toggle="modal" data-target="#exampleModalLong"> Tambah Data </a> <!-- untuk button Tambah Data -->
                                <?php } ?>

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

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/media/simpan') ?>" method="POST" id="tambah_media">
                    <!-- media/simpan ini diambil dari kelas yang ada di controller, action ini artinya jika diklik tombol submit ntar diarahin kemana? -->
                    <!-- <form action="" method="POST"> -->
                    <label for="basic-url">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_media" class="form-control" placeholder="" autocomplete="off" required>
                    </div>

                    <label for="basic-url">Alamat </label>
                    <div class="input-group mb-3">
                        <input type="text" name="alamat_media" class="form-control" placeholder="" required autocomplete="off">
                    </div>

                    <label for="basic-url">Telphone </label>
                    <div class="input-group mb-3">
                        <input type="text" name="tlp_media" class="form-control" required autocomplete="off">
                    </div>

                    <label for="basic-url">Email </label>
                    <div class="input-group mb-3">
                        <input type="text" name="email_media" class="form-control" required autocomplete="off">
                    </div>


                    <label for="basic-url">Nama Rekening </label>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_rekening_media" class="form-control" required autocomplete="off">
                    </div>

                    <label for="basic-url">No.Rekening </label>
                    <div class="input-group mb-3">
                        <input type="text" name="account_media" class="form-control" required autocomplete="off">
                    </div>

                    <label for="basic-url">Bank </label>
                    <div class="input-group mb-3">
                        <input type="text" name="bank_media" class="form-control" required autocomplete="off">
                    </div>

                    <label for="basic-url">Cabang </label>
                    <div class="input-group mb-3">
                        <input type="text" name="cabang_media" class="form-control" placeholder="kpp/kcu/kcp" required autocomplete="off">
                    </div>
                    <!-- </form> -->
                    <button type="submit" class="hide" id="button_simpan"></button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/media') ?>">Back</button>
                <button type="button" class="btn btn-primary btn-save">Save </button>
                <!-- $ itu jquery, # itu id, tambah_karyawan itu nama id, submit itu simpan sesuai id-->
            </div>
        </div>
    </div>
</div> <!-- akhir Modal Tambah -->

<?php if (isset($data_edit)) { ?>
    <!-- buat ngecek variabel itu ada isinya atau engga -->
    <!-- Modal Edit-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <!-- id disini harus sama dengan script-->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Media </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/media/simpan_edit') ?>" method="POST" id="edit_media">
                        <!-- diubah ke simpan edit -->
                        <?php foreach ($data_edit as $data_edit) : ?>
                            <!-- JANGAN LUPA TAMBAHKAN INPUT HIDDEN UNTUK  id_media | ini fungsinya untuk memberi tahu kedatabase nantinya id mana yang akan di update-->
                            <input type="text" name="id_media" hidden value="<?php echo $data_edit->id_media ?>">

                            <label for="basic-url">Nama </label>
                            <div class="input-group mb-3">
                                <!-- SEKARANG KITA AMBIL DATANYA DAN INPUTKAN KE DALAM INPUT -->
                                <input type="text" name="nama_media" class="form-control" placeholder="Nama media" required='' autocomplete="off" value="<?php echo $data_edit->nama_media ?>">
                            </div>

                            <label for="basic-url">Alamat </label>
                            <div class="input-group mb-3">
                                <input type="text" name="alamat_media" class="form-control" placeholder="Alamat media" required='' autocomplete="off" value="<?php echo $data_edit->alamat_media ?>">
                            </div>


                            <label for="basic-url">Telephone </label>
                            <div class="input-group mb-3">
                                <input type="text" name="tlp_media" class="form-control" placeholder="No Telp" required='' autocomplete="off" value="<?php echo $data_edit->tlp_media ?>">
                            </div>

                            <label for="basic-url">Email </label>
                            <div class="input-group mb-3">
                                <input type="text" name="email_media" class="form-control" placeholder="Email" required='' autocomplete="off" value="<?php echo $data_edit->email_media ?>">
                            </div>

                            <label for="basic-url">Nama Rekening </label>
                            <div class="input-group mb-3">
                                <input type="text" name="nama_rekening_media" class="form-control" placeholder="Nama Rekening media" required='' autocomplete="off" value="<?php echo $data_edit->nama_rekening_media ?>">
                            </div>

                            <label for="basic-url">No.Rekening </label>
                            <div class="input-group mb-3">
                                <input type="text" name="account_media" class="form-control" placeholder="Nomor Account" required='' autocomplete="off" value="<?php echo $data_edit->account_media ?>">
                            </div>

                            <label for="basic-url"> Bank </label>
                            <div class="input-group mb-3">
                                <input type="text" name="bank_media" class="form-control" placeholder="Bank" required='' autocomplete="off" value="<?php echo $data_edit->bank_media ?>">
                            </div>

                            <label for="basic-url">Cabang </label>
                            <div class="input-group mb-3">
                                <input type="text" name="cabang_media" class="form-control" placeholder="kpp/kcu/kcp" required='' autocomplete="off" value="<?php echo $data_edit->cabang_media ?>">
                            </div>
                        <?php endforeach ?>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/klien') ?>">Back</button>
                    <button type="button" class="btn btn-primary" onclick="$('#edit_media').submit()">Save </button>
                    <!-- $ itu jquery, # itu id, tambah_karyawan itu nama id, submit itu simpan sesuai id-->
                </div>
            </div>
        </div>
    </div>

    <script>
        //alert('aaa')
        $('#edit').modal('show'); // buat tampilim modal 
    </script>
    <!-- akhir Modal Edit -->
<?php
}
?>



<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('#id_media').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });

    function hapus_id(id_media) {
        if (confirm("yakin hapus?")) {
            window.location.href = 'media/hapus/' + id_media
        }
    }

    $('.btn-save').click(function() {
        $('#button_simpan').click();
    })
</script>

</html>