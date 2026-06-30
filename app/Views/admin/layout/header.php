<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3">
    <div class="container-fluid">
        <h5 class="mb-0 fw-bold"><?= $title ?? 'Dashboard' ?></h5>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted"><?= session('success') ? session('success') : '' ?></span>
            <a href="/logout" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>