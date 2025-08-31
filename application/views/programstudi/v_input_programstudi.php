<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text primary"><?= $judul ?></h6>
    </div>
    <div class="card-body">
        <?php
        echo validation_errors('<div class="col-lg-12">
        <div class="card bg-danger text-white shadow"> <div class="card-body">','</div>
        </div></div>');
    ?>

    <?php echo form_open('programstudi/input_programstudi') ?>
<div class="form-group">
<label for="">Nama Program Studi</label>
<input name="nama_programstudi" class="form-control" placeholder="Nama Program Studi">
</div>

<div class="form-group">
    <label for="">Ketua Program Studi</label>
    <input name="ketua_programstudi" class="form-control" placeholder="Ketua Program Studi">
</div>


<div class="form-group">
<button class="btn btn-primary" type="submit">Simpan</button>
<a href="<?= base_url('programstudi/index')?>" class="btn btn-success">Kembali</a>
</div>
<?php echo form_open() ?>
            </div>
        </div>
