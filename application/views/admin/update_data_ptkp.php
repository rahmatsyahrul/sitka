<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <?php foreach ($ptkp as $p) : ?>
                <form method="POST" action="<?= base_url('admin/dataPtkp/update_data_aksi'); ?>">
                    <div class="form-group">
                        <label for="">Golongan</label>
                        <input type="hidden" name="id" class="form-control" value="<?= $p->id; ?>">
                        <input type="text" name="golongan" class="form-control" value="<?= $p->golongan; ?>">
                        <?= form_error('golongan'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah golongan Tukin</label>
                        <input type="text" name="tarif" class="form-control" value="<?= $p->tarif; ?>">
                        <?= form_error('tarif'); ?>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('admin/dataPtkp'); ?>" class="btn btn-danger ml-3">Kembali</a>

                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>