<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <table class="table table-bordered table-striped mt-2 text-center" style="margin-bottom:100px">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Satker/Unit Kerja</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($konf as $k) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $k->satker; ?></td>
                <td><?= $k->alamat; ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/konfigurasi/update_data/' . $k->id); ?>"><i class="fas fa-edit"></i></a>
                    </center>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>