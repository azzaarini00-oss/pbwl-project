<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

$mhsw = new App\Mahasiswa();

$id = $_GET['id'] ?? '';

$row = $mhsw->edit($id);

?>

<h2 class="fw-bold mb-3">Edit Mahasiswa</h2>
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <form action="mhsw_proses.php?action=update" method="post">
                    <input type="hidden" name="mhsw_id" value="<?php echo $row['mhsw_id']; ?>">
                    <div class="mb-3">
                        <label for="mhsw_nim" class="form-label">NIM</label>
                        <input type="text" value="<?php echo $row['mhsw_nim']; ?>" class="form-control" name="mhsw_nim" placeholder="NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_nama" class="form-label">Nama</label>
                        <input type="text" value="<?php echo $row['mhsw_nama']; ?>" class="form-control" name="mhsw_nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="mhsw_alamat" placeholder="Alamat"><?php echo $row['mhsw_alamat']; ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="index.php?page=mhsw" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>

    </div>
</div>