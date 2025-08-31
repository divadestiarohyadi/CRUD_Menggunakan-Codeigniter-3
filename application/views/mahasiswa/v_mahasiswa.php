<?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>
<div class="form-group">
    <a href=" <?= base_url('mahasiswa/input_mahasiswa') ?>" class="btn btn-primary btn-sm"> Tambah Data</a><br>
</div>
<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tempat, tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nama Fakultas</th>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($mhs as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td> <?= $value->nim ?></td>
                <td><?= $value->nama_mahasiswa ?></td>
                <td> <?= $value->tempat_lahir ?>,<?= date('d M Y', strtotime($value->tgl_lahir)) ?></td>
                <td><?= $value->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' ?></td>
                <td><?= $value->nama_fakultas ?></td>
                <td><?= $value->nama_prodi ?></td>
                <td>
                    <a href="<?= base_url('mahasiswa/edit_mahasiswa/' . $value->id_mahasiswa) ?>" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="<?= base_url('mahasiswa/delete_mahasiswa/' . $value->id_mahasiswa) ?>" onclick="return confirm('Yakin hapus data ?')" class="btn btn-danger  fa-trash"> Delete</a>
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>