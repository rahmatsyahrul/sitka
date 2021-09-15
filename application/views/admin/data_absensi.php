<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Filter Data Perhitungan Tukin
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2 ">Bulan : </label>
                    <select class="form-control ml-3" name="bulan">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2 ">Tahun : </label>
                    <select class="form-control ml-3" name="tahun">
                        <option value="">-- Pilih Tahun --</option>
                        <<?php $tahun = date('Y');
                            for (
                                $i = 2021;
                                $i < $tahun + 5;
                                $i++
                            ) : ?> <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <a href="<?= base_url('admin/dataAbsensi/inputAbsensi'); ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>
            </form>
        </div>
    </div>

    <?php

    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }

    ?>

    <?= $this->session->flashdata('pesan'); ?>

    <div class="alert alert-info mt-2">Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan; ?></span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span></div>

    <?php
    $jumlahData = count($absensi);
    if ($jumlahData > 0) {
    ?>

        <table class="table table-bordered table-striped text-center">
            <tr>
                <td class="text-center">No</td>
                <td class="text-center">Nip</td>
                <td class="text-center">Nama Pegawai</td>
                <td class="text-center" width="8%">TMK</td>
                <td class="text-center" width="8%">TBTT</td>
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
            foreach ($absensi as $a) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a->nip; ?></td>
                    <td><?= $a->nama_pegawai; ?></td>
                    <td><?= $a->tmk; ?></td>
                    <td><?= $a->tbtt; ?></td>
                    <td><?= $a->tl_1; ?></td>
                    <td><?= $a->tl_2; ?></td>
                    <td><?= $a->tl_3; ?></td>
                    <td><?= $a->tl_4; ?></td>
                    <td><?= $a->psw_1; ?></td>
                    <td><?= $a->psw_2; ?></td>
                    <td><?= $a->psw_3; ?></td>
                    <td><?= $a->psw_4; ?></td>

                </tr>
            <?php endforeach; ?>

        </table>

        <a onclick="return confirm ('yakin hapus data yang sudah ada?')" href="<?= base_url('admin/dataAbsensi/delete_data/' . $bulantahun); ?>" class="btn btn-danger" style="margin-bottom: 100px;">Hapus Data</a>

    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data kosong, anda belum menginput data bulan: <?= $bulan; ?> tahun: <?= $tahun; ?></span>
    <?php } ?>

</div>