<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Tambah Kelas</h3><br>
<form action="/admin/classes" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Kelas</label>
            <input type="text" name="class_name" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Level</button>
</form>
<?= $this->endSection() ?>