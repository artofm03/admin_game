<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Edit Level</h3><br>
<form action="<?= base_url('/admin/levels/update/'.($level['id'] ?? ''))?>" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama Level</label>
            <input type="text" name="level_name" class="form-control" value="<?= old('level_name', $level['level_name']) ?>"  required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Deskripsi</label>
            <input type="text" name="description" class="form-control" value="<?= old('description', $level['description']) ?>" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Level</button>
</form>
<?= $this->endSection() ?>