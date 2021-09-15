<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/kelasJabatan/tambah_data/'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped mt-2 text-center" style="margin-bottom:100px">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kelas Jabatan</th>
            <th class="text-center">Tukin/Jabatan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($jabatan as $jb) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $jb->kelas; ?></td>
                <td>Rp. <?= number_format($jb->tukin, 0, ',', '.') ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/kelasJabatan/update_data/' . $jb->id); ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/kelasJabatan/delete_data/' . $jb->id); ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>

            </tr>

        <?php endforeach; ?>
    </table>

</div>