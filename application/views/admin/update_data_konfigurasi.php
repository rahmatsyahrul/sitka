<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 80%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($konf as $pj) : ?>

                <form method="POST" action="<?= base_url('admin/konfigurasi/ubah_data_aksi'); ?>">

                    <div class="form-group">
                        <label for="">Satket/Unit Kerja</label>
                        <input type="hidden" name="id" class="form-control" value="<?= $pj->id; ?>">
                        <input type=" number" name="satker" class="form-control" value="<?= $pj->satker; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text-area" name="alamat" class="form-control" value="<?= $pj->alamat; ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('admin/konfigurasi'); ?>" class="btn btn-danger ml-3">Kembali</a>
                </form>

            <?php endforeach; ?>

        </div>
    </div>


</div>