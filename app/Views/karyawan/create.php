<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <form action="/karyawan/store" method="post">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input name="nama" type="text" class="form-control" value="<?= old('nama'); ?>" autofocus>
                </div>
                
                <div class="mb-3">
                    <label for="jabatan" class="form-label">jabatan</label>
                    <select name="jabatan" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Jabatan</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">tanggal masuk</label>
                    <input name="tanggal_masuk" type="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="status">status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="radioDefault1" value="1" checked>
                        <label class="form-check-label" for="radioDefault1">
                            Aktif
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="radioDefault2" value="0">
                        <label class="form-check-label" for="radioDefault2">
                            Tidak Aktif
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>