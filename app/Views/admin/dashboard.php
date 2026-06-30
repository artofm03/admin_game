<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="row g-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total Siswa</h5>
                <h2><?= $total_students ?? 0 ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Siswa Aktif</h5>
                <h2><?= $active_students ?? 0 ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5>Total Sesi Bermain</h5>
                <h2><?= $total_sessions ?? 0 ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5>Rata-rata Skor</h5>
                <h2><?= number_format($avg_score ?? 0, 1) ?></h2>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-5 mb-3">Sesi Terbaru</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Siswa</th>
            <th>Level</th>
            <th>Skor</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recent_sessions ?? [] as $s): ?>
        <tr>
            <td><?= $s['full_name'] ?></td>
            <td><?= $s['level_id'] ?></td>
            <td><strong><?= $s['score'] ?></strong></td>
            <td><?= date('d M Y H:i', strtotime($s['session_date'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>