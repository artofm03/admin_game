<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<h3 style="font-size: 18px; font-weight: 500;">Edit Materi</h3><br>
<form action="<?= base_url('admin/materials/update/'.($materials['id'] ?? '' )) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Level</label>
        <select name="level_id" class="form-select" required>
            <option value="">- Pilih Level -</option>

            <?php foreach ($levels as $l): ?>
                <option value="<?= $l['id'] ?>"
                    <?= old('level_id', $material['level_id']) == $l['id']
                        ? 'selected'
                        : '' ?>>
                    <?= esc($l['level_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Text English</label>
        <input type="text" name="text_en" class="form-control" value="<?= old('text_en', $material['text_en']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Arti Bahasa Indonesia</label>
        <input type="text" name="text_id" class="form-control" value="<?= old('text_id', $material['text_id']) ?>" required>
    </div>  
    <div class="mb-3">
        <label>
            Audio
        </label>
        <input type="file" accept=".mp3, audio/mpeg" name="audio_path" class="form-control" value="value="<?= old('audio_path', $material['audio_path']) ?>"" required>
    </div>  
    <button type="submit" class="btn btn-primary">Simpan Materi</button>
    <button type="reset" class="btn btn-danger">Isi Ulang</button>
</form>
<?= $this->endSection() ?>