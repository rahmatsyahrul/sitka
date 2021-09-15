<?php $this->load->view('admin/fungsi.php') ?>

<!DOCTYPE html>

<html>

<head>
    <title></title>
    <style>
        @page {
            margin: 40px 20px 40px 20px !important;
            padding: 0px 0px 0px 0px !important;
            font-size: 8px !important;
            text-align: center !important;
        }
    </style>
</head>

<body>

    <h1 style="text-align: left !important;">DAFTAR NOMINATIF PEMBAYARAN TUNJANGAN KINERJA PEGAWAI PER BULAN</h1>
    <table style="text-align: left !important;">
        <tr>

            <?php foreach ($konfigurasi as $k) { ?>
                <td>SATKER/ UNIT KERJA</td>
                <td>:</td>
                <td colspan="10"><?= $k->satker; ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td>BULAN</td>
            <td>:</td>

            <?php
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');

            switch ($bulan) {
                case '01': ?>
                    <td>JANUARI</td>
                <?php break;
                case '02': ?>
                    <td>FEBRUARI</td>
                <?php break;
                case '03': ?>
                    <td>MARET</td>
                <?php break;
                case '04': ?>
                    <td>APRIL</td>
                <?php break;
                case '05': ?>
                    <td>MEI</td>
                <?php break;
                case '06': ?>
                    <td>JUNI</td>
                <?php break;
                case '07': ?>
                    <td>JULI</td>
                <?php break;
                case '08': ?>
                    <td>AGUSTUS</td>
                <?php break;
                case '09': ?>
                    <td>SEPTEMBER</td>
                <?php break;
                case '10': ?>
                    <td>OKTOBER</td>
                <?php break;
                case '11': ?>
                    <td>NOVEMBER</td>
                <?php break;
                case '12': ?>
                    <td>DESEMBER</td>
            <?php break;

                default:
                    break;
            }
            ?>


            <td><?= $tahun; ?></td>
        </tr>
    </table>




    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pangkat/ Gol</th>
            <th>NIP</th>
            <th>NPWP</th>
            <th>Status Pegawai</th>
            <th>Status Wajib Pajak</th>
            <th>Nama Jabatan</th>
            <th>Kelas Jabatan</th>
            <th>Gaji Bersih (Rp)</th>
            <th>Tunjangan Pajak Gaji (Rp)</th>
            <th>Tunjangan Kinerja (Rp)</th>
            <th>PTKP per Tahun (Rp)</th>
            <th>PKP per Tahun (Rp)</th>
            <th>Tunjangan Pajak Tukin (%)</th>
            <th>Tunjangan Pajak Tukin (Rp)</th>
            <th>Pengurangan Tukin (%)</th>
            <th>Pengurangan Tukin (Rp)</th>
            <th>Tunjangan Kinerja Bruto</th>
            <th>Tunjangan Kinerja Netto</th>
            <th>Jumlah Tukin diterima (Rp)</th>
            <th>No Rekening</th>
        </tr>

        <?php

        foreach ($cetak as $key => $ct) :
        ?>
            <?php $totalpengurangan =   $ct->tmk +
                $ct->tbtt +
                $ct->tl_1 +
                $ct->tl_2 +
                $ct->tl_3 +
                $ct->tl_4 +
                $ct->psw_1 +
                $ct->psw_2 +
                $ct->psw_3 +
                $ct->psw_4
            ?>

            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $ct->nama_pegawai; ?></td>
                <td><?= $ct->pangkat; ?></td>
                <td><?= $ct->nip; ?></td>
                <td><?= $ct->npwp; ?></td>
                <td><?= $ct->status; ?></td>
                <td><?= $ct->statuswp; ?></td>
                <td><?= $ct->nama_jabatan; ?></td>
                <td><?= $ct->kelas_jabatan; ?></td>
                <td><?= number_format($ct->gaji, 0, ',', '.'); ?></td>
                <td><?= number_format($ct->tpg, 0, ',', '.'); ?></td>
                <td><?= number_format($ct->tukin, 0, ',', '.'); ?></td>
                <td><?= number_format($ct->tarif, 0, ',', '.'); ?></td>

                <?php
                $pkp = ($ct->gaji * 12) + ($ct->tukin * 12) - ($ct->tarif);
                ?>

                <td><?= number_format($pkp, 0, ',', '.'); ?></td>

                <?php

                $pajaktukin = pajak($pkp);

                ?>

                <td><?= $pajaktukin; ?> %</td>
                <td>
                    <?php
                    $pajaktukinrp =  $pkp * ($pajaktukin / 100) / 12;
                    echo number_format($pajaktukinrp, 0, ',', '.');
                    ?>
                </td>

                <!-- Pengurangan Tukin -->
                <?php

                $tmk_persen = $ct->tmk * 2;
                $tbtt_persen = $ct->tbtt * 2;
                $tl_1_persen = $ct->tl_1 * 0.5;
                $tl_2_persen = $ct->tl_2 * 1;
                $tl_3_persen = $ct->tl_3 * 1.25;
                $tl_4_persen = $ct->tl_4 * 1.50;
                $psw_1_persen = $ct->psw_1 * 0.5;
                $psw_2_persen = $ct->psw_2 * 1;
                $psw_3_persen = $ct->psw_3 * 1.25;
                $psw_4_persen = $ct->psw_4 * 1.50;

                $totalpengurangan =   $tmk_persen +
                    $tbtt_persen +
                    $tl_1_persen +
                    $tl_2_persen +
                    $tl_3_persen +
                    $tl_4_persen +
                    $psw_1_persen +
                    $psw_2_persen +
                    $psw_3_persen +
                    $psw_4_persen

                ?>

                <td><?= $totalpengurangan; ?> %</td>
                <td>
                    <?php
                    $totalpenguranganrp = $totalpengurangan / 100 * $ct->tukin;
                    echo number_format($totalpenguranganrp, 0, ',', '.');
                    ?>


                </td>
                <td><?= number_format($ct->tukin + $pajaktukinrp, 0, ',', '.'); ?></td>
                <td><?= number_format($ct->tukin, 0, ',', '.'); ?></td>
                <td><?= number_format($ct->tukin - $totalpenguranganrp, 0, ',', '.'); ?></td>
                <td><?= $ct->rekening; ?></td>
            </tr>


        <?php endforeach; ?>

    </table>

    <?php foreach ($jabatan as $jb) : ?>

        <table style="float:right! important; ">
            <tr>
                <td style="font-size: 12px !important; text-align:left !important">

                    <?php foreach ($konfigurasi as $k) { ?>


                        <p><?= $k->alamat; ?>, <?= date('d-m-Y'); ?><br>
                            Pejabat Pembuat Komitmen< </p> <?php } ?> <br>
                                <br>
                                <br>


                                <p><?= $jb->nama_pegawai; ?><br>NIP. <?= $jb->nip; ?></p>
                </td>
            </tr>
        </table>

    <?php endforeach; ?>


</body>

</html>