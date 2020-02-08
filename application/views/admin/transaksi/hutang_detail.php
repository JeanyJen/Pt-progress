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
                                        <h4 align="center"><strong>Detail</strong></h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered" id="no_so">
                                            <thead>
                                                <tr align="center">
                                                    <th rowspan="2" class="align-middle"> No.Inv </th>
                                                    <th rowspan="2" class="align-middle"> Nama Media </th>
                                                    <th rowspan="2" class="align-middle"> Nama Klien </th>
                                                    <th colspan="2"> Size </th>
                                                    <th rowspan="2" class="align-middle"> Price </th>
                                                    <th rowspan="2" class="align-middle"> Terbayar </th>
                                                    <th width="30" rowspan="2" class="align-middle" width="100"> Action </th>
                                                    <!-- <th width="10" rowspan="2" class="align-middle"> status </th> -->
                                                </tr>
                                                <tr>
                                                    <th> Mmk </th>
                                                    <th> Kol </th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php $grandtotal = 0; ?>
                                                <?php foreach ($detail as $tampil) : ?>
                                                    <?php $grandtotal = $grandtotal + $tampil->price ?>
                                                    <tr>
                                                        <td> <?php echo $tampil->no_invoice_pemb ?> </td>
                                                        <td> <?php echo $tampil->nama_media ?></td>
                                                        <td> <?php echo $tampil->nama_klien ?></td>
                                                        <td> <?php echo $tampil->kol ?></td>
                                                        <td> <?php echo $tampil->mmk ?></td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->price) ?>
                                                        </td>
                                                        <td> <?php $this->load->helper('rupiah_helper');
                                                                echo rupiah($tampil->terhutang) ?>
                                                        </td>
                                                        <td><a class="btn btn-info btn-sm" href="<?php echo site_url('admin/transaksi/hutang/edit/' . $tampil->id_media . '/' . $tampil->no_invoice_pemb) ?>"><i class="fa fa-pencil-alt"></i> </a>
                                                            <a class="btn btn-danger btn-sm" href="#" onclick="hapus_no('<?= $tampil->no_invoice_pemb ?>')"><i class="fa fa-trash-alt"></i> </a> </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="table-secondary"> Total </td>
                                                    <td class="table-secondary">
                                                        <?php $this->load->helper('rupiah_helper');
                                                        echo rupiah($grandtotal)   ?>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- AKHIR COLOM -->
                        </div> <!-- AKHIR ROW -->
                    </div> <!-- AKHIR CONTAINER -->
                    <!-- /.container-fluid -->
                    <?php $this->load->view("admin/_partials/footer.php") ?>

                </div> <!-- /.content-wrapper -->
                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>
                <?php $this->load->view("admin/_partials/scrolltop.php") ?>
                <?php $this->load->view("admin/_partials/modal.php") ?>
                <?php $this->load->view("admin/_partials/js.php") ?>
</body>

<footer>

</footer>


<?php if (isset($data_edit)) { ?>
    <!-- buat ngecek variabel itu ada isinya atau engga -->
    <!--  Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <!-- id disini harus sama dengan script-->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/transaksi/hutang/simpan_edit') ?>" method="POST" id="edit_hutang">
                        <!-- diubah ke simpan edit -->
                        <?php foreach ($data_edit as $data_edit) : ?>
                            <!-- JANGAN LUPA TAMBAHKAN INPUT HIDDEN UNTUK  id_media | ini fungsinya untuk memberi tahu kedatabase nantinya id mana yang akan di update-->
                            <input type="text" name="no_invoice_pemb" hidden value="<?php echo $data_edit->no_invoice_pemb ?>">
                            <input type="text" name="id_media" hidden value="<?php echo $data_edit->id_media ?>">
                            <input type="text" name="id_klien" hidden value="<?php echo $data_edit->id_klien ?>">

                            <label for="basic-url">No. Inv</label>
                            <div class="input-group mb-3">
                                <input type="text" name="no_invoice_pemb" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->no_invoice_pemb ?>" readonly>
                            </div>

                            <label for="basic-url">Name Media </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $data_edit->nama_media ?>" readonly>

                            </div>

                            <label for="basic-url">Name Klien </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $data_edit->nama_klien ?>" readonly>
                            </div>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Column</th>
                                        <th scope="col">MMK</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="kol" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->kol ?>"></td>
                                        <td><input type="text" name="mmk" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->mmk ?>"></td>
                                        <td><input type="text" name="price" class="form-control" placeholder="" required='' autocomplete="off" value="<?php echo $data_edit->price ?>"></td>

                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" href="<?php echo site_url('admin/transaksi/hutang') ?>">Back</button>
                    <button type="button" class="btn btn-primary" onclick="$('#edit_hutang').submit()">Save </button>
                    <!-- $ itu jquery, # itu id, tambah_so itu nama id, submit itu simpan sesuai id-->
                </div>
            </div>
        </div>
    </div>

    <script>
        // alert('aaa')
        $('#edit').modal('show'); // buat tampilim modal 
    </script>
    <!--  Akhir Modal Edit  -->
<?php
}
?>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> <!-- INI ADALAH JQUERY-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> <!-- INI ADALAH JQUERY DATATABLES-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> <!-- INI ADALAH SCRIPT DATATABLES BOOSTRAP-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#no_so').DataTable(); // gunanya untuk mencari data tabel yang ada pada modal
    });

    function hapus_no(no_invoice_pemb) {
        if (confirm("yakin hapus?")) {
            window.location.href = '/pt-progress/admin/transaksi/hutang/hapus/' + no_invoice_pemb
        }
    }

    function approve(no_invoice_pemb) {
        if (confirm("yakin approve?")) {
            window.location.href = '/pt-progress/admin/transaksi/so/approve/' + no_so
        }
    }
</script>

</html>