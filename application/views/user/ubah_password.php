<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 50%;">
        <div class="card-body">
            <form method="POST" action="<?= base_url('user/ubahPassword/upa'); ?>">

                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="passBaru" class="form-control" required>

                </div>

                <div class="form-group">
                    <label for="">Ulangi Password Baru</label>
                    <input type="password" name="ulangPass" class="form-control" required>

                </div>

                <?= $this->session->flashdata('pesan'); ?>

                <button type="submit" class="btn btn-success">Simpan</button>

            </form>
        </div>

    </div>

</div>