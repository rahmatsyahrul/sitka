<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($user as $user) : ?>

                <form method="POST" action="<?= base_url('admin/dataUser/update_data_aksi'); ?>">

                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="hidden" name="id" class="form-control" value="<?= $user->id; ?>">
                        <input type="text" name="nama_pegawai" class="form-control" value="<?= $user->nama_pegawai; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" value="<?= $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Hak Akses</label>
                        <select name="hak_akses" id="" class="form-control">
                            <option value="<?= $user->hak_akses; ?>"><?php if ($user->hak_akses <= 1) {
                                                                            echo "admin";
                                                                        } else {
                                                                            echo "user";
                                                                        }; ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>

                    </div>



                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('admin/dataUser'); ?>" class="btn btn-danger ml-3">Kembali</a>
        </div>

        </form>

    <?php endforeach; ?>
    </div>
</div>


</div>