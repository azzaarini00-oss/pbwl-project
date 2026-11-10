<?php

namespace App;

require_once __DIR__ . '/BaseModel.php';

class Dosen extends BaseModel
{
    protected string $table = 'tb_dosen';
    protected string $pk = 'dosen_id';
    protected string $label = 'dosen';
    protected string $uniqueMsg = 'NIP sudah terdaftar, gunakan NIP lain.';
    protected array $fields = [
        'dosen_nip'      => ['label' => 'NIP',      'required' => true],
        'dosen_nama'     => ['label' => 'Nama',     'required' => true],
        'dosen_jabatan'  => ['label' => 'Jabatan',  'required' => false],
        'dosen_golongan' => ['label' => 'Golongan', 'required' => false],
    ];
}
