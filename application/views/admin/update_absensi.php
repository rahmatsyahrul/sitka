<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card">

        <div class="card-header bg-primary text-white">
            Ubah Absensi Pegawai bulan <?= substr($bulantahun, 0, 2); ?> Tahun <?= substr($bulantahun, 2, 4); ?>
        </div>

        <form method="POST" action="<?= base_url('admin/dataAbsensi/update_data_aksi'); ?>">

            <table class="table table-bordered table-striped mt-4">
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nip</td>
                    <td class="text-center">Nama Pegawai</td>
                    <td class="text-center" width="8%">TL 1</td>
                    <td class="text-center" width="8%">TL 2</td>
                    <td class="text-center" width="8%">TL 3</td>
                    <td class="text-center" width="8%">TL 4</td>
                    <td class="text-center" width="8%">PSW 1</td>
                    <td class="text-center" width="8%">PSW 2</td>
                    <td class="text-center" width="8%">PSW 3</td>
                    <td class="text-center" width="8%">PSW 4</td>

                </tr>

                <?php $no = 1;
                foreach ($absensi as $ab) : ?>
                    <tr>

                        <input type="hidden" name="id[]" class="form-control" value="<?= $ab->id; ?>">
                        <input type="hidden" name="bulan[]" class="form-control" value="<?= $ab->bulan; ?>">
                        <input type="hidden" name="nip[]" class="form-control" value="<?= $ab->nip; ?>">
                        <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?= $ab->nama_pegawai; ?>">

                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $ab->nip; ?></td>
                        <td><?= $ab->nama_pegawai; ?></td>
                        <td><input type="number" name="tl_1[]" class="form-control" value="<?= $ab->tl_1; ?>"></td>
                        <td><input type="number" name="tl_2[]" class="form-control" value="<?= $ab->tl_2; ?>"></td>
                        <td><input type="number" name="tl_3[]" class="form-control" value="<?= $ab->tl_3; ?>"></td>
                        <td><input type="number" name="tl_4[]" class="form-control" value="<?= $ab->tl_4; ?>"></td>
                        <td><input type="number" name="psw_1[]" class="form-control" value="<?= $ab->psw_1; ?>"></td>
                        <td><input type="number" name="psw_2[]" class="form-control" value="<?= $ab->psw_2; ?>"></td>
                        <td><input type="number" name="psw_3[]" class="form-control" value="<?= $ab->psw_3; ?>"></td>
                        <td><input type="number" name="psw_4[]" class="form-control" value="<?= $ab->psw_4; ?>"></td>

                    </tr>
                <?php endforeach; ?>

            </table>
            <button class="btn btn-primary ml-3" type="submit" name="submit" value="submit" style="margin-bottom: 100px;">Simpan</button>
            <a href="<?= base_url('admin/dataAbsensi'); ?>" class="btn btn-danger ml-3" style="margin-bottom: 100px;">Kembali</a>

        </form>
    </div>