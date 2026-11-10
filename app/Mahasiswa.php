<?php

namespace App;

require_once __DIR__ . '/BaseModel.php';

class Mahasiswa extends BaseModel
{
    protected string $table = 'tb_mhsw';
    protected string $pk = 'mhsw_id';
    protected string $label = 'mahasiswa';
    protected string $uniqueMsg = 'NIM sudah terdaftar, gunakan NIM lain.';
    protected array $fields = [
        'mhsw_nim'    => ['label' => 'NIM',    'required' => true],
        'mhsw_nama'   => ['label' => 'Nama',   'required' => true],
        'mhsw_alamat' => ['label' => 'Alamat', 'required' => false],
    ];
}
