<div class="form-group">
    <div class='input-group date' id='dtp_jam_masuk' r>
        <input type="text" class="form-control " id="input_dtp_jam_masuk" name="jam_pelajaran" required oninvalid="this.setCustomValidity('Disamain sama di jadwal yah . . ')" oninput="setCustomValidity('')">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
        <div class="validation"></div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('#dtp_jam_masuk').datetimepicker({
            format: 'HH:mm'
        });

        $('#dtp_jam_keluar').datetimepicker({
            format: 'HH:mm'
        });


    });
</script>