<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">📊 Laporan & Statistik Belajar</h3>

<div class="row g-4">
    <!-- Statistik Card -->
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total Siswa</h5>
                <h2><?= $total_students ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Total Sesi Bermain</h5>
                <h2><?= $total_sessions ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5>Rata-rata Skor</h5>
                <h2><?= number_format($avg_score, 1) ?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Top Siswa -->
<h4 class="mt-5 mb-3">🏆 Top 10 Siswa</h4>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nama Siswa</th>
            <th>Rata-rata Skor</th>
            <th>Jumlah Bermain</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($top_students as $s): ?>
        <tr>
            <td><?= $s['full_name'] ?></td>
            <td><strong><?= number_format($s['avg_score'], 1) ?></strong></td>
            <td><?= $s['total_play'] ?> kali</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Progress per Level -->
<h4 class="mt-5 mb-3">📈 Progress per Level</h4>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Level</th>
            <th>Jumlah Siswa</th>
            <th>Progress Rata-rata</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($progress_per_level as $p): ?>
        <tr>
            <td><?= $p['level_name'] ?></td>
            <td><?= $p['total_student'] ?> siswa</td>
            <td><?= number_format($p['avg_progress'], 1) ?>%</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Riwayat Terbaru -->
<h4 class="mt-5 mb-3">🕒 Riwayat Permainan Terbaru</h4>
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
        <?php foreach ($recent_games as $g): ?>
        <tr>
            <td><?= $g['full_name'] ?></td>
            <td><?= $g['level_name'] ?? 'Umum' ?></td>
            <td><strong><?= $g['score'] ?></strong></td>
            <td><?= date('d M Y H:i', strtotime($g['session_date'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>