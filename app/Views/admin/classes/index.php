<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Nama Kelas</h3>
    <a href="/admin/classes/create" class="btn btn-success">+ Tambah Kelas</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Guru</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1 ?>
    <?php if (empty($classes)): ?>
        <tr>
            <td colspan="4" class="text-center py-4">Tidak ada kelas.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($classes as $s): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($s['class_name'] ?? '-') ?></td>
            <td><?= esc($s['full_name'] ?? '-') ?></td>
            <td>
                <a href="/admin/classes/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/admin/classes/delete/<?= $s['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
<?= $this->endSection() ?>