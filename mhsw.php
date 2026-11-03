<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

$mhsw = new App\Mahasiswa();
$rows = $mhsw->index();

?>

<div class="row">
    <div class="col-md-12">

        <h2 class="fw-bold mb-3">Mahasiswa</h2>

        <a href="index.php?page=mhsw_input" class="btn btn-primary mb-2 mb-3">Input Mahasiswa Baru</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
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
                        <td><?php echo $row['mhsw_nim']; ?></td>
                        <td><?php echo $row['mhsw_nama']; ?></td>
                        <td><?php echo $row['mhsw_alamat']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="index.php?page=mhsw_edit&id=<?php echo $row['mhsw_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="mhsw_proses.php?action=delete&id=<?php echo $row['mhsw_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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