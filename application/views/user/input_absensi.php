<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Input Kehadiran Pegawai
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

                <button type="submit" name="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate </button>

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

    <?php

    $hitung = count($input_absensi);
    if ($hitung > 0) { ?>

        <div class="alert alert-info mt-2">Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan; ?></span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span></div>

        <form method="POST">
            <button class="btn btn-primary mb-3" type="submit" name="submit" value="submit">Simpan</button>
            <table class="table table-bordered table-striped table-responsive" style="margin-bottom: 100px;">
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Nip</td>
                    <td class="text-center">Nama Pegawai</td>
                    <td class="text-center" width=8%>TMK</td>
                    <td class="text-center" width=8%>TBTT</td>
                    <td class="text-center" width=8%>TL 1</td>
                    <td class="text-center" width=8%>TL 2</td>
                    <td class="text-center" width=8%>TL 3</td>
                    <td class="text-center" width=8%>TL 4</td>
                    <td class="text-center" width=8%>PSW 1</td>
                    <td class="text-center" width=8%>PSW 2</td>
                    <td class="text-center" width=8%>PSW 3</td>
                    <td class="text-center" width=8%>PSW 4</td>

                </tr>

                <?php $no = 1;
                foreach ($input_absensi as $a) : ?>
                    <tr>

                        <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulantahun; ?>">
                        <input type="hidden" name="nip[]" class="form-control" value="<?= $a->nip; ?>">
                        <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?= $a->nama_pegawai; ?>">


                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $a->nip; ?></td>
                        <td><?= $a->nama_pegawai; ?></td>
                        <td><input type="number" name="tmk[]" class="form-control" value="0"></td>
                        <td><input type="number" name="tbtt[]" class="form-control" value="0"></td>
                        <td><input type="number" name="tl_1[]" class="form-control" value="0"></td>
                        <td><input type="number" name="tl_2[]" class="form-control" value="0"></td>
                        <td><input type="number" name="tl_3[]" class="form-control" value="0"></td>
                        <td><input type="number" name="tl_4[]" class="form-control" value="0"></td>
                        <td><input type="number" name="psw_1[]" class="form-control" value="0"></td>
                        <td><input type="number" name="psw_2[]" class="form-control" value="0"></td>
                        <td><input type="number" name="psw_3[]" class="form-control" value="0"></td>
                        <td><input type="number" name="psw_4[]" class="form-control" value="0"></td>

                    </tr>
                <?php endforeach; ?>

            <?php } else { ?>
                <div class="alert alert-danger mt-2">Data Perhitungan Tukin Pegawai Bulan <span class="font-weight-bold"><?= $bulan; ?></span> Tahun <span class="font-weight-bold"><?= $tahun; ?></span> sudah diinput</div>
            <?php } ?>
            </table>
        </form>
</div>