<?php
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>
<div class="container-fluid">
    <a href="<?= base_url('buku/input_buku') ?>" class="btn btn-primary btn-sm"> Tambah Data</a>
    <p></p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center align-middle">
                            <tr>
                                <th>NO</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Tahun Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center align-middle">
                            <?php
                            $no = 1;
                            foreach ($buku as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td> <?= $value->judul ?></td>
                                    <td><?= $value->penulis ?></td>
                                    <td> <?= $value->kategori ?></td>
                                    <td><?= $value->tahun_terbit ?></td>

                                    <td>
                                        <a href=" <?= base_url('buku/edit_buku/' . $value->id_buku) ?>" class="btn btn-warning btn-sm"><i class="fas fa-"></i> Edit</a>
                                        <a href="<?= base_url('buku/delete_buku/' . $value->id_buku) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash" alt="Delete"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>