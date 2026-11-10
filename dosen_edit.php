<?php

require_once "inc/Koneksi.php";
require_once "app/Dosen.php";

$dosen = new App\Dosen();

$id = $_GET['id'] ?? '';

$row = $dosen->edit($id);

?>

<h2 class="fw-bold mb-3">Edit Dosen</h2>
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <form action="dosen_proses.php?action=update" method="post">
                    <input type="hidden" name="dosen_id" value="<?php echo $row['dosen_id']; ?>">
                    <div class="mb-3">
                        <label for="dosen_nip" class="form-label">NIP</label>
                        <input type="text" value="<?php echo htmlspecialchars($row['dosen_nip']); ?>" class="form-control" name="dosen_nip" id="dosen_nip" placeholder="NIP" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosen_nama" class="form-label">Nama</label>
                        <input type="text" value="<?php echo htmlspecialchars($row['dosen_nama']); ?>" class="form-control" name="dosen_nama" id="dosen_nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosen_jabatan" class="form-label">Jabatan</label>
                        <input type="text" value="<?php echo htmlspecialchars($row['dosen_jabatan'] ?? ''); ?>" class="form-control" name="dosen_jabatan" id="dosen_jabatan" placeholder="Contoh: Lektor">
                    </div>
                    <div class="mb-3">
                        <label for="dosen_golongan" class="form-label">Golongan</label>
                        <input type="text" value="<?php echo htmlspecialchars($row['dosen_golongan'] ?? ''); ?>" class="form-control" name="dosen_golongan" id="dosen_golongan" placeholder="Contoh: III/b">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="index.php?page=dosen" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>

    </div>
</div>
