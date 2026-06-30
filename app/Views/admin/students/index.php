<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Data Siswa</h3>
    <a href="/admin/students/create" class="btn btn-success">+ Tambah Siswa</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($students)): ?>
        <tr>
            <td colspan="5" class="text-center py-4">Belum ada data siswa.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= esc($s['nisn'] ?? '-') ?></td>
            <td><?= esc($s['full_name'] ?? '-') ?></td>
            <td><?= esc($s['class_name'] ?? '-') ?></td>
            <td>
                <?php 
                    $isActive = $s['is_active'] ?? 0;
                ?>
                <span class="badge <?= $isActive ? 'bg-success' : 'bg-danger' ?>">
                    <?= $isActive ? 'Aktif' : 'Nonaktif' ?>
                </span>
            </td>
            <td>
                <a href="/admin/students/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/admin/students/delete/<?= $s['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
<?= $this->endSection() ?>