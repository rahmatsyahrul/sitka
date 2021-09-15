<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($pejabat as $pj) : ?>

                <form method="POST" action="<?= base_url('admin/dataPegawai/update_data_aksi'); ?>">

                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="hidden" name="id" class="form-control" value="<?= $pj->id; ?>">
                        <input type="text" name="nama_pegawai" class="form-control" value="<?= $pj->nama_pegawai; ?>">
                        <?= form_error('nama_pegawai'); ?>
                    </div>

                    <div class=" form-group">
                        <label for="">Pangkat/Golongan</label>
                        <input type="text" name="pangkat" class="form-control" value="<?= $pj->pangkat; ?>">
                        <?= form_error('pangkat'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="number" name="nip" class="form-control" value="<?= $pj->nip; ?>">
                        <?= form_error('nip'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">NPWP</label>
                        <input type="text" name="npwp" class="form-control" value="<?= $pj->npwp; ?>">
                        <?= form_error('npwp'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="<?= $pj->status; ?>"><?= $pj->status; ?></option>
                            <option value="PNS">PNS</option>
                            <option value="CPNS">CPNS</option>
                        </select>
                        <?= form_error('status'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Status Wajib Pajak</label>
                        <select name="statuswp" id="" class="form-control">
                            <option value="<?= $pj->statuswp; ?>"><?= $pj->statuswp; ?></option>
                            <option value="TK/0">TK/0</option>
                            <option value="TK/1">TK/1</option>
                            <option value="TK/2">TK/2</option>
                            <option value="TK/3">TK/3</option>
                            <option value="K/0">K/0</option>
                            <option value="K/1">K/1</option>
                            <option value="K/2">K/2</option>
                            <option value="K/3">K/3</option>
                            <option value="K/1/0">K/1/0</option>
                            <option value="K/1/1">K/1/1</option>
                            <option value="K/1/2">K/1/2</option>
                            <option value="K/1/3">K/1/3</option>
                        </select>
                        <?= form_error('statuswp'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor SK</label>
                        <input type="text" name="no_sk" class="form-control" value="<?= $pj->no_sk; ?>">
                        <?= form_error('no_sk'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal SK</label>
                        <input type="text" name="tgl_sk" class="form-control" value="<?= $pj->tgl_sk; ?>">
                        <?= form_error('tgl_sk'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" value="<?= $pj->nama_jabatan; ?>">
                        <?= form_error('nama_jabatan'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Kelas Jabatan</label>
                        <select name="kelas_jabatan" id="" class="form-control">
                            <option value="<?= $pj->kelas_jabatan; ?>"><?= $pj->kelas_jabatan; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                        </select>
                        <?= form_error('kelas_jabatan'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Bank</label>
                        <select name="bank" id="" class="form-control">
                            <option value="<?= $pj->bank; ?>"><?= $pj->bank; ?></option>
                            <option value="Bank Aceh Syariah">Bank Aceh Syariah</option>
                            <option value="Bank Syariah Indonesia">Bank Syariah Indonesia</option>
                        </select>
                        <?= form_error('bank'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Rekening</label>
                        <input type="number" name="rekening" class="form-control" value="<?= $pj->rekening; ?>">
                        <?= form_error('rekening'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Gaji Bersih</label>
                        <input type="number" name="gaji" class="form-control" value="<?= $pj->gaji; ?>">
                        <?= form_error('gaji'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Tunjangan Pajak Gaji</label>
                        <input type="number" name="tpg" class="form-control" value="<?= $pj->tpg; ?>">

                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('admin/dataPegawai'); ?>" class="btn btn-danger ml-3">Kembali</a>
        </div>

        </form>

    <?php endforeach; ?>
    </div>
</div>


</div>