<?php

namespace App;

use PDO;
use PDOException;

abstract class BaseModel
{
    protected PDO $db;
    protected string $table;
    protected string $pk;
    protected string $label;      // contoh: "mahasiswa"
    protected string $uniqueMsg;  // pesan jika data kembar
    /** nama_kolom => ['label'=>..., 'required'=>bool, 'type'=>'text'|'int', 'min'=>, 'max'=>] */
    protected array $fields = [];

    public function __construct()
    {
        $this->db = Koneksi::get();
    }

    // READ: semua data
    public function index(): array
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY {$this->pk} ASC")->fetchAll();
    }

    // READ: satu data (untuk form edit)
    public function edit($id)
    {
        $st = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$this->pk} = :id");
        $st->execute([':id' => (int) $id]);
        return $st->fetch();
    }

    // CREATE
    public function store(): bool
    {
        $data = $this->collect();
        if ($data === null) {
            return false;
        }
        $cols = array_keys($data);
        $sql  = "INSERT INTO {$this->table} (" . implode(', ', $cols) . ") VALUES (:" . implode(', :', $cols) . ")";
        return $this->run($sql, $data, "Data {$this->label} berhasil ditambahkan.");
    }

    // UPDATE
    public function update(): bool
    {
        $id = (int) ($_POST[$this->pk] ?? 0);
        if ($id <= 0) {
            Koneksi::flash('danger', 'ID data tidak valid.');
            return false;
        }
        $data = $this->collect();
        if ($data === null) {
            return false;
        }
        $set = [];
        foreach (array_keys($data) as $c) {
            $set[] = "$c = :$c";
        }
        $data['__id'] = $id;
        $sql = "UPDATE {$this->table} SET " . implode(', ', $set) . " WHERE {$this->pk} = :__id";
        return $this->run($sql, $data, "Data {$this->label} berhasil diperbarui.");
    }

    // DELETE
    public function delete($id): bool
    {
        $id = (int) $id;
        if ($id <= 0) {
            Koneksi::flash('danger', 'ID data tidak valid.');
            return false;
        }
        return $this->run(
            "DELETE FROM {$this->table} WHERE {$this->pk} = :__id",
            ['__id' => $id],
            "Data {$this->label} berhasil dihapus."
        );
    }

    private function run(string $sql, array $data, string $okMsg): bool
    {
        try {
            $st = $this->db->prepare($sql);
            foreach ($data as $k => $v) {
                $st->bindValue(':' . $k, $v, is_int($v) ? PDO::PARAM_INT : ($v === null ? PDO::PARAM_NULL : PDO::PARAM_STR));
            }
            $st->execute();
            Koneksi::flash('success', $okMsg);
            return true;
        } catch (PDOException $e) {
            if (($e->errorInfo[1] ?? 0) == 1062) {
                Koneksi::flash('danger', $this->uniqueMsg);
            } else {
                Koneksi::flash('danger', 'Terjadi kesalahan database: ' . $e->getMessage());
            }
            return false;
        }
    }

    // Ambil + validasi data dari $_POST
    private function collect(): ?array
    {
        $data = [];
        foreach ($this->fields as $name => $cfg) {
            $val = trim((string) ($_POST[$name] ?? ''));
            $lbl = $cfg['label'];

            if ($val === '') {
                if (!empty($cfg['required'])) {
                    Koneksi::flash('danger', "$lbl wajib diisi.");
                    return null;
                }
                $data[$name] = null;
                continue;
            }

            if (($cfg['type'] ?? 'text') === 'int') {
                if (!ctype_digit($val)) {
                    Koneksi::flash('danger', "$lbl harus berupa angka.");
                    return null;
                }
                $n = (int) $val;
                if ($n < ($cfg['min'] ?? 0) || $n > ($cfg['max'] ?? PHP_INT_MAX)) {
                    Koneksi::flash('danger', "$lbl harus antara {$cfg['min']} sampai {$cfg['max']}.");
                    return null;
                }
                $data[$name] = $n;
            } else {
                $data[$name] = $val;
            }
        }
        return $data;
    }
}
