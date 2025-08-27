<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Daftar Karyawan</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($karyawan as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td> <?= $k['nama']; ?></td>
                            <td> <?= $k['jabatan']; ?></td>
                            <td> <?= $k['tanggal_masuk']; ?></td>
                            <td><?= $k['status']; ?></td>
                            <td><a href="/karyawan/<?= $k['id']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>