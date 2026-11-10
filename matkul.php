<?php

require_once "inc/Koneksi.php";
require_once "app/Matakuliah.php";

$matkul = new App\Matakuliah();
$rows = $matkul->index();

?>

<div class="row">
    <div class="col-md-12">

        <h2 class="fw-bold mb-3">Matakuliah</h2>

        <a href="index.php?page=matkul_input" class="btn btn-primary mb-2 mb-3">Input Matakuliah Baru</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($row['matkul_kode']); ?></td>
                        <td><?php echo htmlspecialchars($row['matkul_nama']); ?></td>
                        <td><?php echo (int) $row['matkul_sks']; ?></td>
                        <td><?php echo (int) $row['matkul_semester']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="index.php?page=matkul_edit&id=<?php echo $row['matkul_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="matkul_proses.php?action=delete&id=<?php echo $row['matkul_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
