<?php

require_once "inc/Koneksi.php";

$db = App\Koneksi::get();
$total = [
    'Mahasiswa'  => ['tb_mhsw', 'mhsw', 'bi-people'],
    'Dosen'      => ['tb_dosen', 'dosen', 'bi-person-badge'],
    'Matakuliah' => ['tb_matakuliah', 'matkul', 'bi-book'],
];

?>

<h2 class="fw-bold mb-3">Dashboard</h2>

<div class="alert alert-info">
    Selamat datang di aplikasi akademik sederhana (PHP OOP + MySQL). Anda dapat menambah, mengubah, dan menghapus data.
</div>

<div class="row g-3">
    <?php foreach ($total as $nama => [$tabel, $page, $icon]) { ?>
        <div class="col-md-4">
            <a href="index.php?page=<?php echo $page; ?>" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi <?php echo $icon; ?> fs-1 text-primary"></i>
                        <div>
                            <div class="text-muted"><?php echo $nama; ?></div>
                            <div class="fs-3 fw-bold text-dark"><?php echo (int) $db->query("SELECT COUNT(*) FROM $tabel")->fetchColumn(); ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
