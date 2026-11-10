CREATE DATABASE IF NOT EXISTS db_akademik CHARACTER SET utf8mb4;
USE db_akademik;

CREATE TABLE IF NOT EXISTS tb_mhsw (
  mhsw_id INT NOT NULL AUTO_INCREMENT,
  mhsw_nim VARCHAR(25) NOT NULL,
  mhsw_nama VARCHAR(100) NOT NULL,
  mhsw_alamat TEXT DEFAULT NULL,
  PRIMARY KEY (mhsw_id),
  UNIQUE KEY (mhsw_nim)
);

CREATE TABLE IF NOT EXISTS tb_dosen (
  dosen_id INT NOT NULL AUTO_INCREMENT,
  dosen_nip VARCHAR(25) NOT NULL,
  dosen_nama VARCHAR(100) NOT NULL,
  dosen_jabatan VARCHAR(100) DEFAULT NULL,
  dosen_golongan VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (dosen_id),
  UNIQUE KEY (dosen_nip)
);

CREATE TABLE IF NOT EXISTS tb_matakuliah (
  matkul_id INT NOT NULL AUTO_INCREMENT,
  matkul_kode VARCHAR(25) NOT NULL,
  matkul_nama VARCHAR(100) NOT NULL,
  matkul_sks TINYINT NOT NULL,
  matkul_semester TINYINT NOT NULL,
  PRIMARY KEY (matkul_id),
  UNIQUE KEY (matkul_kode)
);

-- Data contoh (boleh dihapus)
INSERT IGNORE INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat) VALUES
 ('2024001', 'Budi Santoso', 'Medan'), ('2024002', 'Siti Aminah', 'Binjai');
INSERT IGNORE INTO tb_dosen (dosen_nip, dosen_nama, dosen_jabatan, dosen_golongan) VALUES
 ('198001012005011001', 'Dr. Ahmad Fauzi', 'Lektor', 'III/c');
INSERT IGNORE INTO tb_matakuliah (matkul_kode, matkul_nama, matkul_sks, matkul_semester) VALUES
 ('IF101', 'Pemrograman Web', 3, 4), ('IF102', 'Basis Data', 3, 3);
