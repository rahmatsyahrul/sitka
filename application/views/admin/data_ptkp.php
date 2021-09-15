<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataPtkp/tambah_data/'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped mt-2 text-center" style="margin-bottom:100px">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Golongan</th>
            <th class="text-center">Tarif PTKP</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($ptkp as $p) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->golongan; ?></td>
                <td>Rp. <?= number_format($p->tarif, 0, ',', '.'); ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPtkp/update_data/' . $p->id); ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPtkp/delete_data/' . $p->id); ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>