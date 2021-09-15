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

    <h1 style="text-align: left !important;">PERHITUNGAN TUNJANGAN KINERJA PEGAWAI PER BULAN</h1>
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
            <th rowspan="3">No</th>
            <th rowspan="3">Nama</th>
            <th rowspan="3">Pangkat/ Gol</th>
            <th rowspan="3">NIP</th>
            <th rowspan="3">NPWP</th>
            <th rowspan="3">Status Pegawai</th>
            <th rowspan="3">Status Wajib Pajak</th>
            <th rowspan="2" colspan="2">SK Penetapan</th>
            <th rowspan="3">Nama Jabatan</th>
            <th rowspan="3">Kelas Jabatan</th>
            <th rowspan="3">Nilai Tunjangan Kinerja</th>
            <th colspan="4">Pengurangan</th>
            <th colspan="8">Pengurangan Karena Terlambat</th>
            <th colspan="8">Pengurangan Karena Pulang Sebelum Waktunya</th>
            <th rowspan="2" colspan="2">Total Pengurangan</th>
            <th rowspan="3">Tunjangan Kinerja Diterima</th>
            <th rowspan="3">Nomor Rekening Pegawai</th>
        </tr>
        <tr>
            <th colspan="2">Tdk Masuk Kerja</th>
            <th colspan="2">tdk Berada Di Tempat Tugas</th>
            <th colspan="2">TL 1</th>
            <th colspan="2">TL 2</th>
            <th colspan="2">TL 3</th>
            <th colspan="2">TL 4</th>
            <th colspan="2">PSW 1</th>
            <th colspan="2">PSW 2</th>
            <th colspan="2">PSW 3</th>
            <th colspan="2">PSW 4</th>
        </tr>
        <tr>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Jml Hr</th>
            <th>2%</th>
            <th>Jml Hr</th>
            <th>2%</th>
            <th>Jml Hr</th>
            <th>0,50%</th>
            <th>Jml Hr</th>
            <th>1%</th>
            <th>Jml Hr</th>
            <th>1,25%</th>
            <th>Jml Hr</th>
            <th>1,50%</th>
            <th>Jml Hr</th>
            <th>0,50%</th>
            <th>Jml Hr</th>
            <th>1%</th>
            <th>Jml Hr</th>
            <th>1,25%</th>
            <th>Jml Hr</th>
            <th>1,50%</th>
            <th>%</th>
            <th>Rupiah</th>
        </tr>
        <tr>
            <?php
            $no = 1;
            while ($no <= 36) :
            ?>
                <td class="font-italic text-center"><?= $no++; ?></td>
            <?php endwhile; ?>
        </tr>


        <?php

        $jumlah_tukin = 0;
        $jml = array_fill(0, 24, 0);

        foreach ($cetak as $key => $ct) :
        ?>

            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $ct->nama_pegawai; ?></td>
                <td><?= $ct->pangkat; ?></td>
                <td><?= $ct->nip; ?></td>
                <td><?= $ct->npwp; ?></td>
                <td><?= $ct->status; ?></td>
                <td><?= $ct->statuswp; ?></td>
                <td><?= $ct->no_sk; ?></td>
                <td><?= date('d-m-Y', strtotime($ct->tgl_sk)); ?></td>
                <td><?= $ct->nama_jabatan; ?></td>
                <td><?= $ct->kelas_jabatan; ?></td>
                <td><?= number_format($ct->tukin, 0, ',', '.'); ?></td>
                <td><?= $ct->tmk; ?></td>
                <td>
                    <?php
                    $tmk_persen = $ct->tmk * 2;
                    echo $tmk_persen;
                    ?>
                </td>
                <td><?= $ct->tbtt; ?></td>
                <td>
                    <?php
                    $tbtt_persen = $ct->tbtt * 2;
                    echo $tbtt_persen;
                    ?>
                </td>
                <td><?= $ct->tl_1; ?></td>
                <td>
                    <?php
                    $tl_1_persen = $ct->tl_1 * 0.5;
                    echo $tl_1_persen;
                    ?>
                </td>
                <td><?= $ct->tl_2; ?></td>
                <td>
                    <?php
                    $tl_2_persen = $ct->tl_2 * 1;
                    echo $tl_2_persen;
                    ?>
                </td>
                <td><?= $ct->tl_3; ?></td>
                <td>
                    <?php
                    $tl_3_persen = $ct->tl_3 * 1.25;
                    echo $tl_3_persen;
                    ?>
                </td>
                <td><?= $ct->tl_4; ?></td>
                <td>
                    <?php
                    $tl_4_persen = $ct->tl_4 * 1.50;
                    echo $tl_4_persen;
                    ?>
                </td>
                <td><?= $ct->psw_1; ?></td>
                <td>
                    <?php
                    $psw_1_persen = $ct->psw_1 * 0.5;
                    echo $psw_1_persen;
                    ?>
                </td>
                <td><?= $ct->psw_2; ?></td>
                <td>
                    <?php
                    $psw_2_persen = $ct->psw_2 * 1;
                    echo $psw_2_persen;
                    ?>
                </td>
                <td><?= $ct->psw_3; ?></td>
                <td>
                    <?php
                    $psw_3_persen = $ct->psw_3 * 1.25;
                    echo $psw_3_persen;
                    ?>
                </td>
                <td><?= $ct->psw_4; ?></td>
                <td>
                    <?php
                    $psw_4_persen = $ct->psw_4 * 1.50;
                    echo $psw_4_persen;
                    ?>
                </td>

                <?php $totalpengurangan =   $tmk_persen +
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

                <td><?= $totalpengurangan; ?></td>

                <?php
                $penguranganrp = $totalpengurangan / 100 * $ct->tukin
                ?>

                <td><?= number_format($penguranganrp, 0, ',', '.'); ?></td>
                <td>
                    <?php $totaltukin = $ct->tukin - $penguranganrp;
                    echo number_format($totaltukin, 0, ',', '.'); ?>
                </td>
                <td><?= $ct->rekening; ?></td>

            </tr>

            <?php
            $jml[0] += $ct->tukin;
            $jml[1] += $ct->tmk;
            $jml[2] += $tmk_persen;
            $jml[3] += $ct->tbtt;
            $jml[4] += $tbtt_persen;
            $jml[5] += $ct->tl_1;
            $jml[6] += $tl_1_persen;
            $jml[7] += $ct->tl_2;
            $jml[8] += $tl_2_persen;
            $jml[9] += $ct->tl_3;
            $jml[10] += $tl_3_persen;
            $jml[11] += $ct->tl_4;
            $jml[12] += $tl_4_persen;
            $jml[13] += $ct->psw_1;
            $jml[14] += $psw_1_persen;
            $jml[15] += $ct->psw_2;
            $jml[16] += $psw_2_persen;
            $jml[17] += $ct->psw_3;
            $jml[18] += $psw_3_persen;
            $jml[19] += $ct->psw_4;
            $jml[20] += $psw_4_persen;
            $jml[21] += $totalpengurangan;
            $jml[22] += $penguranganrp;
            $jml[23] += $totaltukin;
            ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="11">Total</td>
            <?php foreach ($jml as $key => $jm) : ?>
                <td>
                    <?php
                    if ($key == 0 | $key >= 22) {
                        echo number_format($jm, 0, ',', '.');
                    } else {
                        echo $jm;
                    }
                    ?>
                </td>
            <?php endforeach; ?>
            <td></td>
        </tr>

    </table>

    <?php foreach ($jabatan as $jb) : ?>

        <table style="float:right! important; ">
            <tr>
                <td style="font-size: 12px !important; text-align:left !important">

                    <?php foreach ($konfigurasi as $k) { ?>


                        <p><?= $k->alamat; ?>, <?= date('d-m-Y'); ?><br>
                            Pelaksana Perhitungan<br>
                            Tunjangan Kinerja
                        </p>
                    <?php } ?>
                    <br>
                    <br>
                    <br>


                    <p><?= $jb->nama_pegawai; ?><br>NIP. <?= $jb->nip; ?></p>
                </td>
            </tr>
        </table>

    <?php endforeach; ?>


</body>

</html>