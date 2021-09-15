<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($pejabat as $pj) : ?>

                <form method="POST" action="<?= base_url('admin/dataPejabat/ubah_data_aksi'); ?>">

                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="hidden" name="id" class="form-control" value="<?= $pj->id; ?>">
                        <input type=" number" name="nip" class="form-control" value="<?= $pj->nip; ?>">
                        <?= form_error('nip'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" value="<?= $pj->nama_pegawai; ?>">
                        <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="hidden" name="jabatan" class="form-control" value="<?= $pj->jabatan; ?>">
                        <?= form_error('jabatan'); ?>

                        <div class="input-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text bg-white" style="padding-right:250px"><?= $pj->jabatan; ?></span>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('admin/dataPejabat'); ?>" class="btn btn-danger ml-3">Kembali</a>
                </form>

            <?php endforeach; ?>

        </div>
    </div>


</div>