<?php

namespace App;

use PDO;
use PDOException;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Koneksi
{
    // Sesuaikan dengan pengaturan MySQL Anda
    private const HOST = 'localhost';
    private const DB   = 'db_akademik';
    private const USER = 'root';
    private const PASS = '';

    private static ?PDO $pdo = null;

    public static function get(): PDO
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=' . self::HOST . ';dbname=' . self::DB . ';charset=utf8mb4',
                    self::USER,
                    self::PASS,
                    [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Koneksi database gagal: ' . htmlspecialchars($e->getMessage())
                    . '<br>Pastikan MySQL menyala, database db_akademik sudah diimpor, dan user/password benar.');
            }
        }
        return self::$pdo;
    }

    // Notifikasi sekali tampil
    public static function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    // Token CSRF untuk semua form
    public static function csrfField(): string
    {
        if (empty($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(16));
        }
        return '<input type="hidden" name="_token" value="' . $_SESSION['_token'] . '">';
    }

    public static function checkCsrf(): bool
    {
        $ok = isset($_POST['_token'], $_SESSION['_token'])
            && hash_equals($_SESSION['_token'], $_POST['_token']);
        if (!$ok) {
            self::flash('danger', 'Sesi form tidak valid. Silakan coba lagi.');
        }
        return $ok;
    }
}
