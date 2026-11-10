<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

$model = new App\Mahasiswa();
$row = [];

?>

<h2 class="fw-bold mb-3">Input Mahasiswa</h2>

<div class="row">
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="mhsw_proses.php?action=store" method="post">
                    <?php echo App\Koneksi::csrfField(); ?>
                    <div class="mb-3">
                        <label for="mhsw_nim" class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mhsw_nim" id="mhsw_nim" value="<?php echo htmlspecialchars((string) ($row['mhsw_nim'] ?? '')); ?>" placeholder="NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_nama" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mhsw_nama" id="mhsw_nama" value="<?php echo htmlspecialchars((string) ($row['mhsw_nama'] ?? '')); ?>" placeholder="Nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="mhsw_alamat" id="mhsw_alamat" rows="3" placeholder="Alamat"><?php echo htmlspecialchars((string) ($row['mhsw_alamat'] ?? '')); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=mhsw" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
