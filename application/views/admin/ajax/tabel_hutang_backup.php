<?php
$i = 1;
$total = 0;
//var_dump($data_so);
foreach ($data_hutang as $tampil) {
    $no_so = $tampil->no_so;
    $id_media = $tampil->id_media;
    $id_klien = $tampil->id_klien;
    $total = $total + $tampil->nett; ?>

    <tr>
        <input type="hidden" value="<?= (isset($no_so) ? $no_so : '') ?>" name="no_so[<?= ($i - 1) ?>]">
        <th> <?= $i++ ?> </th>
        <td> <?= $tampil->no_so ?></td>
        <td> <?= $tampil->nama_klien ?></td>
        <td> <?= $tampil->mmk ?></td>
        <td> <?= $tampil->kol ?></td>
        <td>
            <?php // $this->load->helper('rupiah_helper');
            //echo rupiah($tsampil->price) 
            ?>

            <input type="text" name="terhutang" class="col-sm-5 col-form-label" placeholder="" required='' autocomplete="off">
        </td>
        <!-- <td>
            <?php // $this->load->helper('rupiah_helper');
            //echo rupiah($tampil->nett)
            ?>

        </!-->

    </tr>

<?php } ?>

<input type="hidden" value="<?= (isset($no_so) ? $no_so : '') ?>" name="id_klien">
<!-- <input type="hidden" value="<?php // echo (isset($id_media) ? $id_media : '') 
                                    ?>" name="id_media"> -->
<input type="hidden" value="<?= (isset($id_klien) ? $id_klien : '') ?>" name="id_klien">
<input type="hidden" value="<?= (isset($total) ? $total : '') ?>" name="total">
<tr>
    <td colspan="5" class="table-secondary"> Total </td>
    <!-- <td class="table-secondary" id="totalSo"> -->

    </td>
</tr>
<script type="text/javascript">
    var namaMarketing = '<?= $namaMarketing ?>';
    $('input[name="nip_karyawan"]').val(namaMarketing)

    $('.btn-save').click(function() {
        $('#button_simpan').click();
    })
</script>