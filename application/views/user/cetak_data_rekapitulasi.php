<!DOCTYPE html>

<html>

<head>
    <title></title>
    <style>
        @page {
            margin: 40px 80px 40px 80px !important;
            padding: 0px 0px 0px 0px !important;
            font-size: 12px !important;
            text-align: center !important;
        }
    </style>
</head>

<body>

    <h1 style="text-align: left !important;">REKAPITULASI DAFTAR PEMBAYARAN TUNJANGAN KINERJA PEGAWAI</h1>
    <table style="text-align: left !important;">
        <tr>
            <td>KEMENTERIAN/LEMBAGA</td>
            <td>:</td>
            <td>KEMENTERIAN AGAMA</td>
        </tr>
        <tr>
            <?php foreach ($konfigurasi as $k) { ?>
                <td>SATKER/ UNIT KERJA</td>
                <td>:</td>
                <td><?= $k->satker; ?></td>
            <?php } ?>
        </tr>
    </table>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Uraian Kelas Jabatan</th>
            <th rowspan="3">Jumlah Penerima</th>
            <th rowspan="3">Tunjangan Kinerja per Kelas Jabatan</th>
            <th style="text-align: left !important;">1. Jumlah Tunjangan</th>
            <th style="text-align: left !important;">1. Potongan Pajak</th>
        </tr>
        <tr style="text-align: left !important;">
            <th>2. Pajak</th>
            <th>2. Jumlah Netto</th>
        </tr>
        <tr style="text-align: left !important;">
            <th>3. Jumlah Brutto</th>
            <th></th>
        </tr>
        <tr>
            <?php
            $no = 1;
            while ($no <= 6) :
            ?>
                <td style="font-size:8px !important"><?= $no++; ?></td>
            <?php endwhile; ?>
        </tr>


        <?php
        foreach ($cetak as $key => $ct) :
        ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $ct->kelas_jabatan; ?></td>
                <td><?= $ct->jumlah; ?></td>
                <td><?= number_format($tukin[$key], 0, ',', '.'); ?></td>
                <td style="vertical-align: top !important; text-align:left !important">
                    1) <?= number_format($jml_tunjangan[$key], 0, ',', '.'); ?> <br> 2) <?= number_format($pajak[$key], 0, ',', '.'); ?> <br>

                    <?php
                    $jumbruto = $jml_tunjangan[$key] + $pajak[$key];
                    ?>

                    3) <?= number_format($jumbruto, 0, ',', '.'); ?>
                </td>
                <td style="vertical-align: top !important; text-align:left !important">
                    1) <?= number_format($pajak[$key], 0, ',', '.'); ?> <br> 2) <?= number_format($jml_tunjangan[$key], 0, ',', '.'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2">Jumlah</td>
            <td><?= $tot_jml_penerima; ?></td>
            <td><?= number_format($tot_tukin, 0, ',', '.'); ?></td>
            <td style="vertical-align: top !important; text-align:left !important">
                1) <?= number_format($tot_tunjangan, 0, ',', '.'); ?><br> 2) <?= number_format($tot_pajak, 0, ',', '.'); ?> <br>3) <?= number_format($tot_bruto, 0, ',', '.'); ?>
            </td>
            <td style="vertical-align: top !important; text-align:left !important">
                1) <?= number_format($tot_pajak, 0, ',', '.'); ?> <br> 2) <?= number_format($tot_tunjangan, 0, ',', '.'); ?>
            </td>
        </tr>


    </table>

    <?php foreach ($jabatan as $jb) : ?>
        <table style="float:right! important; ">
            <tr>
                <td style="font-size: 12px !important; text-align:left !important">

                    <?php foreach ($konfigurasi as $k) { ?>
                        <p><?= $k->alamat; ?>, <?= date('d-m-Y'); ?><br>
                            Bendahara Pengeluaran< </p> <?php } ?> <br>
                                <br>
                                <br>
                                <p><?= $jb->nama_pegawai; ?><br>NIP. <?= $jb->nip; ?></p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>

    <?php foreach ($jabatan2 as $jb) : ?>

        <table style="float:left! important; ">
            <tr>
                <td style="font-size: 12px !important; text-align:left !important">
                    <p> <br>Pejabat Pembuat Komitmen< </p> <br>
                            <br>
                            <br>
                            <p><?= $jb->nama_pegawai; ?><br>NIP. <?= $jb->nip; ?></p>
                </td>
            </tr>
        </table>


    <?php endforeach; ?>


</body>

</html>