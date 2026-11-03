<h2 class="fw-bold mb-3">Input Mahasiswa</h2>

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">

                <form action="mhsw_proses.php?action=store" method="post">
                    <div class="mb-3">
                        <label for="mhsw_nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" name="mhsw_nim" placeholder="NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="mhsw_nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="mhsw_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="mhsw_alamat" placeholder="Alamat"></textarea>
                    </div>
                    <button type="submit" name="store" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=mhsw" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>

    </div>
</div>