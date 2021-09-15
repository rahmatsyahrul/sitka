<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/dataPejabat/tambah_data_aksi'); ?>">

                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="number" name="nip" class="form-control">
                    <?= form_error('nip'); ?>
                </div>

                <div class="form-group">
                    <label for="">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control">
                    <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control">
                    <?= form_error('jabatan'); ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/dataPejabat'); ?>" class="btn btn-danger ml-3">Kembali</a>

            </form>
        </div>
    </div>


</div>