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

        <?php echo form_open('dosen/edit_dosen/' . $buku->id_buku) ?>
        <div class="form-group">
            <label for="">Judul</label>
            <input name="judul" value="<?= $buku->judul ?>" class="form-control" placeholder="Judul Buku">
        </div>

        <div class="form-group">
            <label for="">Penulis</label>
            <input name="penulis" value="<?= $buku->penulis ?>" class="form-control" placeholder="Nama Penulis">
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input name="kategori" value="<?= $buku->kategori ?>" class="form-control" placeholder="Kategori">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Tahun Terbit</label>
                    <input name="tahun_terbit" value="<?= $buku->tahun_terbit ?>" class="form-control" type="date">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('buku/index') ?>" class="btn btn-success">Kembali</a>
        </div>
        <?php echo form_open() ?>
    </div>
</div>