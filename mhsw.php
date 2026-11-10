<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

$model = new App\Mahasiswa();
$rows = $model->index();

?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold m-0">Mahasiswa</h2>
    <a href="index.php?page=mhsw_input" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Input Mahasiswa Baru</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle bg-white">
        <thead class="table-light">
            <tr>
                <th style="width:60px">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                <th style="width:170px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) === 0) { ?>
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data.</td></tr>
            <?php } ?>
            <?php $no = 1; foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars((string) ($row['mhsw_nim'] ?? '')); ?></td>
                        <td><?php echo htmlspecialchars((string) ($row['mhsw_nama'] ?? '')); ?></td>
                        <td><?php echo htmlspecialchars((string) ($row['mhsw_alamat'] ?? '')); ?></td>
                    <td class="text-center">
                        <a href="index.php?page=mhsw_edit&id=<?php echo (int) $row['mhsw_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="mhsw_proses.php?action=delete" method="post" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <?php echo App\Koneksi::csrfField(); ?>
                            <input type="hidden" name="id" value="<?php echo (int) $row['mhsw_id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
