<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/dataUser/tambah_data_aksi'); ?>">

                <div class="form-group">
                    <label for="">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="user" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select name="hak_akses" id="" class="form-control">
                        <option value="2">--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('admin/dataUser'); ?>" class="btn btn-danger ml-3">Kembali</a>
        </div>

        </form>
    </div>
</div>


</div>