<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Daftar Materi Belajar</h3><br>
    <a href="/admin/materials/create" class="btn btn-success">+ Tambah Materi</a>
</div>
<form method="get" class="row mb-4">
    <div class="col-md-4">
        <select name="level_id"
                class="form-select"
                onchange="this.form.submit()">

            <option value="">
                -- Pilih Level --
            </option>

            <?php foreach ($levels as $level): ?>
                <option
                    value="<?= $level['id'] ?>"
                    <?= $selectedLevel == $level['id'] ? 'selected' : '' ?>>
                    <?= $level['level_name'] ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>
</form>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Level</th>
            <th>Text English</th>
            <th>Arti Indonesia</th>
            <th>Audio</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>

    <tbody>

        <?php if (!empty($materials)): ?>

            <?php foreach ($materials as $m): ?>

                <tr>
                    <td><?= esc($m['level_name']) ?></td>

                    <td>
                        <strong><?= esc($m['text_en']) ?></strong>
                    </td>

                    <td><?= esc($m['text_id']) ?></td>

                    <td>
                        <?php if ($m['audio_path']): ?>
                            <audio controls>
                                <source
                                    src="<?= base_url($m['audio_path']) ?>"
                                    type="audio/mp3">
                            </audio>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="<?= base_url('admin/materials/edit/'.$m['id']) ?>"
                           class="btn btn-sm btn-info">
                            Edit
                        </a>

                        <a href="<?= base_url('admin/materials/delete/'.$m['id']) ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus materi ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="5" class="text-center">
                    Silakan pilih level untuk melihat materi.
                </td>
            </tr>

        <?php endif; ?>

    </tbody>
</table>
<?= $this->endSection() ?>