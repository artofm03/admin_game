<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Tambah Materi Baru</h3><br>
<form action="/admin/materials" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Level</label>
        <select name="level_id" class="form-select" required>
            <option value="">-Pilih Level-</option>
            <?php foreach ($levels as $l): ?>
                <option value="<?= $l['id'] ?>"><?= $l['level_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Text English</label>
        <input type="text" name="text_en" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Arti Bahasa Indonesia</label>
        <input type="text" name="text_id" class="form-control" required>
    </div>  
    <div class="mb-3">
        <label>
            Audio
        </label>
        <input type="file" accept=".mp3, audio/mpeg" name="audio_path" class="form-control" required>
    </div>  
    <button type="submit" class="btn btn-primary">Simpan Materi</button>
    <button type="reset" class="btn btn-danger">Isi Ulang</button>
</form>
<?= $this->endSection() ?>