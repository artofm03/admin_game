<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<div class="mb-4">
    <h3 style="font-size: 18px; font-weight: 500;">Progress Belajar Siswa</h3><br>
</div>
<table class="table table-bordered table-striped align-middle">

    <thead class="table-light">
        <tr>
            <th width="50">No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Level</th>
            <th>Status</th>
            <th>Nilai</th>
            <th>Benar</th>
            <th>Progress</th>
            <th>Terakhir Belajar</th>
        </tr>
    </thead>

    <tbody>

        <?php if (!empty($progress)) : ?>
            <?php $no = 1; ?>

            <?php foreach ($progress as $p) : ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td>
                        <?= esc($p['full_name']) ?>
                    </td>

                    <td>
                        <?= esc($p['class_name'] ?? '-') ?>
                    </td>

                    <td>
                        <?= esc($p['level_name']) ?>
                    </td>

                    <td>
                        <?php if ($p['status'] == 'completed') : ?>
                            <span class="badge bg-success">
                                Selesai
                            </span>

                        <?php elseif ($p['status'] == 'learning') : ?>
                            <span class="badge bg-warning">
                                Sedang Belajar
                            </span>

                        <?php else : ?>
                            <span class="badge bg-secondary">
                                Belum Mulai
                            </span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?= $p['score'] ?? 0 ?>
                    </td>

                    <td>
                        <?= $p['correct_answers'] ?? 0 ?>/10
                    </td>

                    <td width="200">

                        <?php
                        $progressPercent = $p['progress_percent'] ?? 0;
                        ?>

                        <div class="progress">
                            <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: <?= $progressPercent ?>%;">

                                <?= $progressPercent ?>%
                            </div>
                        </div>

                    </td>

                    <td>
                        <?= $p['updated_at'] ?? '-' ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <tr>
                <td colspan="9" class="text-center">
                    Belum ada data progress siswa.
                </td>
            </tr>

        <?php endif; ?>

    </tbody>

</table>

<?= $this->endSection() ?>