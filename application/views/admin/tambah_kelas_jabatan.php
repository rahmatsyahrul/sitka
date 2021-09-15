<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/kelasJabatan/tambah_data_aksi'); ?>">

                <div class="form-group">
                    <label for="">Kelas Jabatan</label>
                    <input type="number" name="kelas" class="form-control">
                    <?= form_error('kelas'); ?>
                </div>

                <div class="form-group">
                    <label for="">Tukin/Jabatan</label>
                    <input type="number" name="tukin" class="form-control">
                    <?= form_error('tukin'); ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/kelasJabatan'); ?>" class="btn btn-danger ml-3">Kembali</a>
            </form>
        </div>
    </div>


</div>