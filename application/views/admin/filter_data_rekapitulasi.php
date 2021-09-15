<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mx-auto" style="width:40%">
        <div class="card-header bg-primary text-white">
            Filter Data Rekapitulasi
        </div>

        <form action="<?= base_url('admin/cetakRekapitulasi'); ?>" method="POST" name="submit">

            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="bulan">
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
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="tahun">
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
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Bank</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="bank">
                            <option value="">-- Pilih Bank --</option>
                            <option value="Bank Aceh Syariah">Bank Aceh Syariah</option>
                            <option value="Bank Syariah Indonesia">Bank Syariah Indonesia</option>
                        </select>
                    </div>
                </div>

                <?= $this->session->flashdata('pesan'); ?>

                <button class="btn btn-primary" type="submit" name="submit" style="width: 100%;"><i class="fas fa-print"></i> Cetak Rekapitulasi</button>
            </div>
        </form>
    </div>

</div>