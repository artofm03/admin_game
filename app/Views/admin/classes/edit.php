<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Edit Nama Kelas</h3><br>
<form action="<?= base_url('admin/classes/update/'.($class['id'] ?? '' )) ?>" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Kelas</label>
            <input type="text" name="class_name" class="form-control" value="<?= old('class_name', $class['class_name']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nama Guru</label>
            <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $class['full_name']) ?>" disabled required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan level</button>
</form>
<?= $this->endSection() ?>