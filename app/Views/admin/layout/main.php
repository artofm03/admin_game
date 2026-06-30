<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Guru' ?> - English Learning System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: #f8f9fa; }
        .sidebar { width: 260px; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <?= view('admin/layout/sidebar') ?>

    <!-- Main Content -->
    <div class="flex-grow-1" style="margin-left: 260px;">
        <?= view('admin/layout/header') ?>
        <div class="p-4">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>