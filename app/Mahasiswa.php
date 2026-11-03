<?php

namespace App;

use Inc\Koneksi;

class Mahasiswa extends Koneksi
{

      public function index()
      {
            $sql = "SELECT * FROM tb_mhsw";
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
            $mhsw_nim = $_POST['mhsw_nim'];
            $mhsw_nama = $_POST['mhsw_nama'];
            $mhsw_alamat = $_POST['mhsw_alamat'];

            $sql = "INSERT INTO tb_mhsw SET mhsw_nim=:mhsw_nim, mhsw_nama=:mhsw_nama, mhsw_alamat=:mhsw_alamat";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":mhsw_nim", $mhsw_nim);
            $stmt->bindParam(":mhsw_nama", $mhsw_nama);
            $stmt->bindParam(":mhsw_alamat", $mhsw_alamat);

            $stmt->execute();
      }

      public function edit($id)
      {

            $sql = "SELECT * FROM tb_mhsw WHERE mhsw_id=:mhsw_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":mhsw_id", $id);

            $stmt->execute();

            $row = $stmt->fetch();

            return $row;
      }

      public function update()
      {
            $mhsw_nim = $_POST['mhsw_nim'];
            $mhsw_nama = $_POST['mhsw_nama'];
            $mhsw_alamat = $_POST['mhsw_alamat'];
            $mhsw_id = $_POST['mhsw_id'];

            $sql = "UPDATE tb_mhsw SET mhsw_nim=:mhsw_nim, mhsw_nama=:mhsw_nama, mhsw_alamat=:mhsw_alamat WHERE mhsw_id=:mhsw_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":mhsw_nim", $mhsw_nim);
            $stmt->bindParam(":mhsw_nama", $mhsw_nama);
            $stmt->bindParam(":mhsw_alamat", $mhsw_alamat);
            $stmt->bindParam(":mhsw_id", $mhsw_id);

            $stmt->execute();
      }

      public function delete($id)
      {
            $sql = "DELETE FROM tb_mhsw WHERE mhsw_id=:mhsw_id";
            $stmt = $this->koneksi->prepare($sql);

            $stmt->bindParam(":mhsw_id", $id);

            $stmt->execute();
      }
}
