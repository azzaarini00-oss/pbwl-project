<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

use App\Koneksi;

$model = new App\Mahasiswa();
$action = $_GET['action'] ?? '';
$back = "Location: index.php?page=mhsw";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && Koneksi::checkCsrf()) {
    switch ($action) {
        case 'store':
            if (!$model->store()) {
                $back = "Location: index.php?page=mhsw_input";
            }
            break;

        case 'update':
            if (!$model->update()) {
                $back = "Location: index.php?page=mhsw_edit&id=" . (int) ($_POST['mhsw_id'] ?? 0);
            }
            break;

        case 'delete':
            $model->delete($_POST['id'] ?? 0);
            break;
    }
}

header($back);
exit;
