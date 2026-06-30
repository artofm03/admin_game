<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Level Game</h3>
    <a href="/admin/levels/create" class="btn btn-success">+ Tambah Level</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Level</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1 ?>
    <?php if (empty($levels)): ?>
        <tr>
            <td colspan="4" class="text-center py-4">Belum ada Level.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($levels as $s): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($s['level_name'] ?? '-') ?></td>
            <td><?= esc($s['description'] ?? '-') ?></td>
            <td>
                <a href="/admin/levels/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/admin/levels/delete/<?= $s['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus level ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
<?= $this->endSection() ?>