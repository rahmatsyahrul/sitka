<body>

    <?php
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    ?>

    <center>
        <h2>Perhitungan Tukin Pegawai</h2>
        <h5>Bulan <?= $bulan; ?>, Tahun <?= $tahun; ?></h5>
        <hr style="width:50%; border-width:5px; color:black">
    </center>

    <a href="<?= base_url('admin/cetakTukin'); ?>" class="btn btn-secondary mb-3 ml-3"><i class="fas fa-print"></i> Cetak</a>

    <div class="cetaktukin">
        <table class="table table-responsive table-bordered" style="margin-bottom: 100px;">
            <tr class="text-center bg-secondary text-white" style="align-items:center">
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
            <tr class="text-center bg-secondary text-white">
                <th colspan="2">thk Masuk Kerja</th>
                <th colspan="2">thk Berada Di Tempat Tugas</th>
                <th colspan="2">TL 1</th>
                <th colspan="2">TL 2</th>
                <th colspan="2">TL 3</th>
                <th colspan="2">TL 4</th>
                <th colspan="2">PSW 1</th>
                <th colspan="2">PSW 2</th>
                <th colspan="2">PSW 3</th>
                <th colspan="2">PSW 4</th>
            </tr>
            <tr class="text-center bg-secondary text-white">
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

            $no = 1;
            foreach ($cetak as $ct) :
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

                <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td><?= $ct->nama_pegawai; ?></td>
                    <td><?= $ct->pangkat; ?></td>
                    <td><?= $ct->nip; ?></td>
                    <td><?= $ct->npwp; ?></td>
                    <td><?= $ct->status; ?></td>
                    <td><?= $ct->statuswp; ?></td>
                    <td><?= $ct->no_sk; ?></td>
                    <td><?= $ct->tgl_sk; ?></td>
                    <td><?= $ct->nama_jabatan; ?></td>
                    <td><?= $ct->kelas_jabatan; ?></td>
                    <td><?= number_format($ct->tukin, 0, ',', '.'); ?></td>
                    <td><?= $ct->tmk; ?></td>
                    <td><?= number_format($ct->tmk * $ct->tukin * 2 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->tbtt; ?></td>
                    <td><?= number_format($ct->tbtt * $ct->tukin * 2 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->tl_1; ?></td>
                    <td><?= number_format($ct->tl_1 * $ct->tukin * 0.5 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->tl_2; ?></td>
                    <td><?= number_format($ct->tl_2 * $ct->tukin * 1 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->tl_3; ?></td>
                    <td><?= number_format($ct->tl_3 * $ct->tukin * 1.25 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->tl_4; ?></td>
                    <td><?= number_format($ct->tl_4 * $ct->tukin * 1.50 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->psw_1; ?></td>
                    <td><?= number_format($ct->tl_3 * $ct->tukin * 0.5 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->psw_2; ?></td>
                    <td><?= number_format($ct->tl_3 * $ct->tukin * 1 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->psw_3; ?></td>
                    <td><?= number_format($ct->tl_3 * $ct->tukin * 1.25 / 100, 0, ',', '.'); ?></td>
                    <td><?= $ct->psw_4; ?></td>
                    <td><?= number_format($ct->tl_3 * $ct->tukin * 1.50 / 100, 0, ',', '.'); ?></td>
                    <td><?= $totalpengurangan; ?></td>

                    <?php
                    $penguranganrp = $ct->tmk * $ct->tukin * 2 / 100 +
                        $ct->tbtt * $ct->tukin * 2 / 100 +
                        $ct->tl_1 * $ct->tukin * 2 / 100 +
                        $ct->tl_2 * $ct->tukin * 2 / 100 +
                        $ct->tl_3 * $ct->tukin * 2 / 100 +
                        $ct->tl_4 * $ct->tukin * 2 / 100 +
                        $ct->psw_1 * $ct->tukin * 2 / 100 +
                        $ct->psw_2 * $ct->tukin * 2 / 100 +
                        $ct->psw_3 * $ct->tukin * 2 / 100 +
                        $ct->psw_4 * $ct->tukin * 2 / 100
                    ?>

                    <td><?= number_format($penguranganrp, 0, ',', '.'); ?></td>
                    <td><?= number_format($ct->tukin - $penguranganrp, 0, ',', '.'); ?></td>
                    <td><?= $ct->rekening; ?></td>

                </tr>

            <?php endforeach; ?>

        </table>
    </div>



</body>





</html>