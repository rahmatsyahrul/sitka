<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/dataPtkp/tambah_data_aksi'); ?>">

                <div class="form-group">
                    <label for="">Golongan</label>
                    <input type="text" name="golongan" class="form-control">
                    <?= form_error('golongan'); ?>
                </div>

                <div class="form-group">
                    <label for="">Tarif PTKP</label>
                    <input type="number" name="tarif" class="form-control">
                    <?= form_error('tarif'); ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/dataPtkp'); ?>" class="btn btn-danger ml-3">Kembali</a>

            </form>
        </div>
    </div>


</div>