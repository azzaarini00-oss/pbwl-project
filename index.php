<?php
require_once "inc/Koneksi.php";

// Halaman yang boleh dibuka (mencegah akses file sembarangan)
$allowed = [
    'mhsw', 'mhsw_input', 'mhsw_edit',
    'dosen', 'dosen_input', 'dosen_edit',
    'matkul', 'matkul_input', 'matkul_edit',
];
$page = $_GET['page'] ?? 'dashboard';
if ($page !== 'dashboard' && !in_array($page, $allowed, true)) {
    $page = 'dashboard';
}
$menu = explode('_', $page)[0]; // mhsw_edit -> mhsw
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-primary" id="sidebar-wrapper">
            <div class="sidebar-heading text-white fw-bold">AKADEMIK</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action <?php echo $menu === 'dashboard' ? 'active' : ''; ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a href="index.php?page=mhsw" class="list-group-item list-group-item-action <?php echo $menu === 'mhsw' ? 'active' : ''; ?>"><i class="bi bi-people"></i> Mahasiswa</a>
                <a href="index.php?page=dosen" class="list-group-item list-group-item-action <?php echo $menu === 'dosen' ? 'active' : ''; ?>"><i class="bi bi-person-badge"></i> Dosen</a>
                <a href="index.php?page=matkul" class="list-group-item list-group-item-action <?php echo $menu === 'matkul' ? 'active' : ''; ?>"><i class="bi bi-book"></i> Matakuliah</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="menu-toggle" type="button"><i class="bi bi-list"></i></button>
                </div>
            </nav>

            <div class="container-fluid p-4">
                <?php
                if (isset($_SESSION['flash'])) {
                    $f = $_SESSION['flash'];
                    unset($_SESSION['flash']);
                    echo '<div class="alert alert-' . htmlspecialchars($f['type']) . ' alert-dismissible fade show" role="alert">'
                        . htmlspecialchars($f['message'])
                        . '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                }

                include ($page === 'dashboard' ? 'main' : $page) . '.php';
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
