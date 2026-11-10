<?php

namespace App;

use Inc\Koneksi;

class Dosen extends Koneksi
{

      public function index()
      {
            $sql = "SELECT * FROM tb_dosen";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute();

            $data = [];

            while ($rows = $stmt->fetch()) {
                  $data[] = $rows;
            }

            return $data;
      }

      public function store()
      {
            $dosen_nip = $_POST['dosen_nip'];
            $dosen_nama = $_POST['dosen_nama'];
            $dosen_jabatan = $_POST['dosen_jabatan'];
            $dosen_golongan = $_POST['dosen_golongan'];

            $sql = "INSERT INTO tb_dosen SET dosen_nip=:dosen_nip, dosen_nama=:dosen_nama, dosen_jabatan=:dosen_jabatan, dosen_golongan=:dosen_golongan";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":dosen_nip", $dosen_nip);
            $stmt->bindParam(":dosen_nama", $dosen_nama);
            $stmt->bindParam(":dosen_jabatan", $dosen_jabatan);
            $stmt->bindParam(":dosen_golongan", $dosen_golongan);

            $stmt->execute();
      }

      public function edit($id)
      {

            $sql = "SELECT * FROM tb_dosen WHERE dosen_id=:dosen_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":dosen_id", $id);

            $stmt->execute();

            $row = $stmt->fetch();

            return $row;
      }

      public function update()
      {
            $dosen_nip = $_POST['dosen_nip'];
            $dosen_nama = $_POST['dosen_nama'];
            $dosen_jabatan = $_POST['dosen_jabatan'];
            $dosen_golongan = $_POST['dosen_golongan'];
            $dosen_id = $_POST['dosen_id'];

            $sql = "UPDATE tb_dosen SET dosen_nip=:dosen_nip, dosen_nama=:dosen_nama, dosen_jabatan=:dosen_jabatan, dosen_golongan=:dosen_golongan WHERE dosen_id=:dosen_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":dosen_nip", $dosen_nip);
            $stmt->bindParam(":dosen_nama", $dosen_nama);
            $stmt->bindParam(":dosen_jabatan", $dosen_jabatan);
            $stmt->bindParam(":dosen_golongan", $dosen_golongan);
            $stmt->bindParam(":dosen_id", $dosen_id);

            $stmt->execute();
      }

      public function delete($id)
      {
            $sql = "DELETE FROM tb_dosen WHERE dosen_id=:dosen_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":dosen_id", $id);

            $stmt->execute();
      }
}
