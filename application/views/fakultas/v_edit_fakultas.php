<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
            </div>
                <div class="card-body">
                         
                <?php 
//notifikasi validasi

echo validation_errors('<div class="col-lg-12">
<div class="card bg-danger text-white shadow"> <div class="card-body">',' </div>
</div></div>');
?>


<?php echo form_open('fakultas/edit_fakultas/'.$fklts->id_fakultas) ?>
<div class="form-group">
<label for="">Nama Fakultas</label>
<input name="nama_fakultas" value="<?= $fklts->nama_fakultas?>" class="form-control" placeholder="NIM">
</div>

<div class="form-group">
<button class="btn btn-primary" type="submit">Simpan</button>
<a href="<?= base_url('fakultas/index')?>" class="btn btn-success">Kembali</a>
</div>
<?php echo form_open() ?>
            </div>
        </div>
