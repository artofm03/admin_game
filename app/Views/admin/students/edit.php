<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Edit Data Siswa</h3><br>
<form action="<?= base_url('admin/students/update/'.($student['id'] ?? '' )) ?>" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" value="<?= old('nisn', $student['nisn']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $student['full_name']) ?>" required>
        </div>
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <select name="class_id" class="form-select" required>
            <option value="">Pilih Kelas</option>

            <?php foreach ($classes as $c): ?>
                <option
                    value="<?= $c['id'] ?>"
                    <?= old('class_id', $student['class_id']) == $c['id'] ? 'selected' : '' ?>
                >
                    <?= esc($c['class_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?= old('password', $student['password']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Siswa</button>
</form>
<?= $this->endSection() ?>