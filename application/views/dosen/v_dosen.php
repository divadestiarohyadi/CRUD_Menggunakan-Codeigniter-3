<a href="<?= base_url('dosen/input_dosen')?>" class="btn btn-primary btn-sm"> Tambah Data</a>
<?php
if($this->session->flashdata('pesan'))
{
    echo'<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>
<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Tempat, tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1; foreach ($dosen as $key => $value) { ?>
            <tr>
                <td><?= $no++?></td>
                <td> <?= $value->nidn ?></td>
                <td><?= $value->nama_dosen?></td>
                <td> <?= $value->tempat_lahir?>,<?= date('d M Y', strtotime($value->tanggal_lahir))?></td>
                <td><?= $value->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' ?></td>
                <td>
                    <a href=" <?= base_url('dosen/edit_dosen/'.$value->id_dosen)?>" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="<?= base_url('dosen/delete_dosen/'.$value->id_dosen)?>" class="btn btn-danger btn-sm"> Delete</a>
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>