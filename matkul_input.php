<?php

require_once "inc/Koneksi.php";
require_once "app/Matakuliah.php";

$model = new App\Matakuliah();
$row = [];

?>

<h2 class="fw-bold mb-3">Input Matakuliah</h2>

<div class="row">
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="matkul_proses.php?action=store" method="post">
                    <?php echo App\Koneksi::csrfField(); ?>
                    <div class="mb-3">
                        <label for="matkul_kode" class="form-label">Kode Matakuliah <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="matkul_kode" id="matkul_kode" value="<?php echo htmlspecialchars((string) ($row['matkul_kode'] ?? '')); ?>" placeholder="Contoh: IF101" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_nama" class="form-label">Nama Matakuliah <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="matkul_nama" id="matkul_nama" value="<?php echo htmlspecialchars((string) ($row['matkul_nama'] ?? '')); ?>" placeholder="Nama matakuliah" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_sks" class="form-label">SKS <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="matkul_sks" id="matkul_sks" value="<?php echo htmlspecialchars((string) ($row['matkul_sks'] ?? '')); ?>" placeholder="1 - 10" min="1" max="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_semester" class="form-label">Semester <span class="text-danger">*</span></label>
                        <select class="form-select" name="matkul_semester" id="matkul_semester" required>
                            <option value="">-- Pilih Semester --</option>
                            <?php for ($i = 1; $i <= 8; $i++) { ?>
                                <option value="<?php echo $i; ?>" <?php echo ((int) ($row['matkul_semester'] ?? 0) === $i) ? 'selected' : ''; ?>>Semester <?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=matkul" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
