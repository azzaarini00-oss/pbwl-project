<?php

namespace App;

use Inc\Koneksi;

class Matakuliah extends Koneksi
{

      public function index()
      {
            $sql = "SELECT * FROM tb_matakuliah";
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
            $matkul_kode = $_POST['matkul_kode'];
            $matkul_nama = $_POST['matkul_nama'];
            $matkul_sks = $_POST['matkul_sks'];
            $matkul_semester = $_POST['matkul_semester'];

            $sql = "INSERT INTO tb_matakuliah SET matkul_kode=:matkul_kode, matkul_nama=:matkul_nama, matkul_sks=:matkul_sks, matkul_semester=:matkul_semester";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":matkul_kode", $matkul_kode);
            $stmt->bindParam(":matkul_nama", $matkul_nama);
            $stmt->bindParam(":matkul_sks", $matkul_sks);
            $stmt->bindParam(":matkul_semester", $matkul_semester);

            $stmt->execute();
      }

      public function edit($id)
      {

            $sql = "SELECT * FROM tb_matakuliah WHERE matkul_id=:matkul_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":matkul_id", $id);

            $stmt->execute();

            $row = $stmt->fetch();

            return $row;
      }

      public function update()
      {
            $matkul_kode = $_POST['matkul_kode'];
            $matkul_nama = $_POST['matkul_nama'];
            $matkul_sks = $_POST['matkul_sks'];
            $matkul_semester = $_POST['matkul_semester'];
            $matkul_id = $_POST['matkul_id'];

            $sql = "UPDATE tb_matakuliah SET matkul_kode=:matkul_kode, matkul_nama=:matkul_nama, matkul_sks=:matkul_sks, matkul_semester=:matkul_semester WHERE matkul_id=:matkul_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":matkul_kode", $matkul_kode);
            $stmt->bindParam(":matkul_nama", $matkul_nama);
            $stmt->bindParam(":matkul_sks", $matkul_sks);
            $stmt->bindParam(":matkul_semester", $matkul_semester);
            $stmt->bindParam(":matkul_id", $matkul_id);

            $stmt->execute();
      }

      public function delete($id)
      {
            $sql = "DELETE FROM tb_matakuliah WHERE matkul_id=:matkul_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":matkul_id", $id);

            $stmt->execute();
      }
}
