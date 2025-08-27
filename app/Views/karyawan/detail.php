<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Biodata <?= $karyawan['nama']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $karyawan['nama']; ?></h5>
                    <p class="card-text">Jabatan : <?= $karyawan['jabatan']; ?></p>
                    <p class="card-text">Tanggal Masuk : <?= $karyawan['tanggal_masuk']; ?></p>
                    <a href="/karyawan/edit/<?= $karyawan['id']; ?>" class="btn btn-warning">Edit</a>

                    <form action="/karyawan/del/<?= $karyawan['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <!-- hidden method -->
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>