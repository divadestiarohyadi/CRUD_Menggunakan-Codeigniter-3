<a href="<?= base_url('fakultas/input_fakultas')?>" class="btn btn-primary btn-sm">Tambah Data</a>
<?php

if($this->session->flashdata('pesan'))
{
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<table class="table table-bordered" id="dataTable">
    <thead>
        <th>No</th>
        <th>Nama Fakultas</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        $no=1; foreach ($fklts as $key => $value){ ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $value->nama_fakultas?></td>
            <td>
                <a href="<?= base_url('fakultas/edit_fakultas/'.$value->id_fakultas)?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('fakultas/delete_fakultas/'.$value->id_fakultas)?>" onclick="return confirm('Yakin mau dihapus datanya ?')" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    
   <?php } ?>
       
    </tbody>
</table>