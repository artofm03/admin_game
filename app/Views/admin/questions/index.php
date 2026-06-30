<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Data Soal</h3><br>
    <a href="<?= base_url('admin/questions/create') ?>"
       class="btn btn-success">
        + Tambah Soal
    </a>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="60">No</th>
            <th>Level</th>
            <th>Bahasa Inggris</th>
            <th>Arti</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($questions)) : ?>
            <?php $no = 1; ?>
            <?php foreach ($questions as $q) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($q['level_name']) ?></td>
                    <td><?= esc($q['text_en']) ?></td>
                    <td><?= esc($q['text_id']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/questions/edit/'.$q['id']) ?>"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="<?= base_url('admin/questions/delete/'.$q['id']) ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus soal ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">
                    Data soal belum ada
                </td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>