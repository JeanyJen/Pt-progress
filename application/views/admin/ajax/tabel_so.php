<?php
$i = 1;
$total = 0;
//var_dump($data_so);
foreach ($data_so as $tampil) {
    $no_so = $tampil->no_so;
    $id_media = $tampil->id_media;
    $id_klien = $tampil->id_klien;
    $namaMarketing = $tampil->nip_karyawan;
    $total = $total + $tampil->nett; ?>

    <tr>
        <input type="hidden" value="<?= (isset($no_so) ? $no_so : '') ?>" name="no_so[<?= ($i - 1) ?>]">
        <th> <?= $i++ ?> </th>
        <td> <?= $tampil->no_so ?></td>
        <!-- <td> <?php // echo $tampil->nama_klien  
                    ?></td>-->
        <td> <?= $tampil->nama_media ?></td>
        <td> <?= $tampil->mmk ?></td>
        <td> <?= $tampil->kol ?></td>
        <td>
            <?php $this->load->helper('rupiah_helper');
            echo rupiah($tampil->price) ?>
        </td>
        <td>
            <?php $this->load->helper('rupiah_helper');
            echo rupiah($tampil->gross) ?>
        </td>
        <td>
            <?php $this->load->helper('diskon_helper');
            echo diskon($tampil->disc) ?>
        </td>
        <td>
            <?php $this->load->helper('rupiah_helper');
            echo rupiah($tampil->nett) ?>
        </td>

    </tr>

<?php } ?>

<input type="hidden" value="<?= (isset($no_so) ? $no_so : '') ?>" name="id_klien">
<input type="hidden" value="<?= (isset($id_media) ? $id_media : '') ?>" name="id_media">
<input type="hidden" value="<?= (isset($total) ? $total : '') ?>" name="total">
<tr>
    <td colspan="8" class="table-secondary"> Total </td>
    <td class="table-secondary">
        <?php $this->load->helper('rupiah_helper');
        echo rupiah($total)   ?>
    </td>
</tr>
<script>
    var namaMarketing = '<?= $namaMarketing ?>';
    $('input[name="nip_karyawan"]').val(namaMarketing)
</script>