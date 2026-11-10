<?php

namespace App;

require_once __DIR__ . '/BaseModel.php';

class Matakuliah extends BaseModel
{
    protected string $table = 'tb_matakuliah';
    protected string $pk = 'matkul_id';
    protected string $label = 'matakuliah';
    protected string $uniqueMsg = 'Kode matakuliah sudah terdaftar, gunakan kode lain.';
    protected array $fields = [
        'matkul_kode'     => ['label' => 'Kode Matakuliah', 'required' => true],
        'matkul_nama'     => ['label' => 'Nama Matakuliah', 'required' => true],
        'matkul_sks'      => ['label' => 'SKS',      'required' => true, 'type' => 'int', 'min' => 1, 'max' => 10],
        'matkul_semester' => ['label' => 'Semester', 'required' => true, 'type' => 'int', 'min' => 1, 'max' => 8],
    ];
}
