CREATE TABLE tb_mhsw (
      mhsw_id INT(11) NOT NULL AUTO_INCREMENT,
      mhsw_nim VARCHAR(25) NOT NULL,
      mhsw_nama VARCHAR(100) NOT NULL,
      mhsw_alamat TEXT DEFAULT NULL,
      PRIMARY KEY(mhsw_id),
      UNIQUE KEY(mhsw_nim)
);

CREATE TABLE tb_dosen (
      dosen_id INT(11) NOT NULL AUTO_INCREMENT,
      dosen_nip VARCHAR(25) NOT NULL,
      dosen_nama VARCHAR(100) NOT NULL,
      dosen_jabatan VARCHAR(100) DEFAULT NULL,
      dosen_golongan VARCHAR(100) DEFAULT NULL,
      PRIMARY KEY(dosen_id),
      UNIQUE KEY(dosen_nip)
);

CREATE TABLE tb_matakuliah (
      matkul_id INT(11) NOT NULL AUTO_INCREMENT,
      matkul_kode VARCHAR(25) NOT NULL,
      matkul_nama VARCHAR(100) NOT NULL,
      matkul_sks TINYINT(3) NOT NULL,
      matkul_semester TINYINT(3) NOT NULL,
      PRIMARY KEY(matkul_id),
      UNIQUE KEY(matkul_kode)
);