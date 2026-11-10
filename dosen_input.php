<?php

require_once "inc/Koneksi.php";
require_once "app/Dosen.php";

$model = new App\Dosen();
$row = [];

?>

<h2 class="fw-bold mb-3">Input Dosen</h2>

<div class="row">
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="dosen_proses.php?action=store" method="post">
                    <?php echo App\Koneksi::csrfField(); ?>
                    <div class="mb-3">
                        <label for="dosen_nip" class="form-label">NIP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dosen_nip" id="dosen_nip" value="<?php echo htmlspecialchars((string) ($row['dosen_nip'] ?? '')); ?>" placeholder="NIP" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosen_nama" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dosen_nama" id="dosen_nama" value="<?php echo htmlspecialchars((string) ($row['dosen_nama'] ?? '')); ?>" placeholder="Nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosen_jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="dosen_jabatan" id="dosen_jabatan" value="<?php echo htmlspecialchars((string) ($row['dosen_jabatan'] ?? '')); ?>" placeholder="Contoh: Lektor">
                    </div>
                    <div class="mb-3">
                        <label for="dosen_golongan" class="form-label">Golongan</label>
                        <input type="text" class="form-control" name="dosen_golongan" id="dosen_golongan" value="<?php echo htmlspecialchars((string) ($row['dosen_golongan'] ?? '')); ?>" placeholder="Contoh: III/b">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=dosen" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
