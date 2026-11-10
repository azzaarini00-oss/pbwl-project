<h2 class="fw-bold mb-3">Input Matakuliah</h2>

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <form action="matkul_proses.php?action=store" method="post">
                    <div class="mb-3">
                        <label for="matkul_kode" class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="matkul_kode" id="matkul_kode" placeholder="Kode Matakuliah" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_nama" class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" name="matkul_nama" id="matkul_nama" placeholder="Nama Matakuliah" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_sks" class="form-label">SKS</label>
                        <input type="number" class="form-control" name="matkul_sks" id="matkul_sks" placeholder="SKS" min="1" max="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkul_semester" class="form-label">Semester</label>
                        <select class="form-select" name="matkul_semester" id="matkul_semester" required>
                            <option value="">-- Pilih Semester --</option>
                            <?php for ($i = 1; $i <= 8; $i++) { ?>
                                <option value="<?php echo $i; ?>">Semester <?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="store" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=matkul" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>

    </div>
</div>
