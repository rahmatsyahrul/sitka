<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataPegawai/tambah_data/'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-responsive table-bordered table-striped mt-2" style="margin-bottom:100px">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Pangkat/ Golongan</th>
            <th class="text-center">NIP</th>
            <th class="text-center">NPWP</th>
            <th class="text-center">Status</th>
            <th class="text-center">Status Wajib Pajak</th>
            <th class="text-center">Nomor SK</th>
            <th class="text-center">Tanggal SK</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Kelas Jabatan</th>
            <th class="text-center">Nama Bank</th>
            <th class="text-center">Nomor Rekening</th>
            <th class="text-center">Gaji Bersih</th>
            <th class="text-center">Tunjangan Pajak Gaji</th>
            <th class="text-center">Action</th>

        </tr>

        <?php
        $no = 1;
        foreach ($jabatan as $jb) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $jb->nama_pegawai; ?></td>
                <td><?= $jb->pangkat ?></td>
                <td><?= $jb->nip ?></td>
                <td><?= $jb->npwp ?></td>
                <td><?= $jb->status ?></td>
                <td><?= $jb->statuswp ?></td>
                <td><?= $jb->no_sk ?></td>
                <td><?= $jb->tgl_sk ?></td>
                <td><?= $jb->nama_jabatan ?></td>
                <td><?= $jb->kelas_jabatan ?></td>
                <td><?= $jb->bank ?></td>
                <td><?= $jb->rekening ?></td>
                <td>Rp.<?= number_format($jb->gaji, 0, ',', '.') ?></td>
                <td>Rp.<?= number_format($jb->tpg, 0, ',', '.') ?></td>

                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/update_data/' . $jb->id); ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('yakin hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/delete_data/' . $jb->id); ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>

            </tr>

        <?php endforeach; ?>
    </table>

</div>