<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
    </div>
    <div class="card-body">

        <?php
        //notifikasi validasi

        echo validation_errors('<div class="col-lg-12">
<div class="card bg-danger text-white shadow"> <div class="card-body">', ' </div>
</div></div>');
        ?>

        <?php echo form_open('buku/input_buku') ?>
        <div class="form-group">
            <label for="">Judul</label>
            <input name="judul" class="form-control" placeholder="Judul Buku">
        </div>

        <div class="form-group">
            <label for="">Penulis</label>
            <input name="penulis" class="form-control" placeholder="Nama Dosen">
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input name="tanggal_lahir" class="form-control" type="date">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">--Jenis Kelamin--</option>
                <option value="L">Laki Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('dosen/index') ?>" class="btn btn-success">Kembali</a>
        </div>
        <?php echo form_open() ?>
    </div>
</div>