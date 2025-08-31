<a href="<?= base_url('programstudi/input_programstudi')?>" class="btn btn-primary btn-sm">Tambah Data</a>

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
        <th>Nama Program Studi</th>
        <th>Ketua Program Studi</th>
        <td>Aksi</td>
    </thead>
    <tbody>
    <?php
      $no=1; foreach ($prog as $key => $value){?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->nama_programstudi?></td>
            <td><?= $value->ketua_programstudi?></td>
            <td>
                <a href="<?= base_url('programstudi/edit_programstudi/'.$value->id_programstudi)?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('programstudi/delete_programstudi/'.$value->id_programstudi)?>" onclick="return confirm('Yakin mau dihapus datanya ?')" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php } ?>
    </tbody>
 </table>