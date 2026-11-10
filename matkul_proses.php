<?php

require_once "inc/Koneksi.php";
require_once "app/Matakuliah.php";

use App\Koneksi;

$model = new App\Matakuliah();
$action = $_GET['action'] ?? '';
$back = "Location: index.php?page=matkul";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && Koneksi::checkCsrf()) {
    switch ($action) {
        case 'store':
            if (!$model->store()) {
                $back = "Location: index.php?page=matkul_input";
            }
            break;

        case 'update':
            if (!$model->update()) {
                $back = "Location: index.php?page=matkul_edit&id=" . (int) ($_POST['matkul_id'] ?? 0);
            }
            break;

        case 'delete':
            $model->delete($_POST['id'] ?? 0);
            break;
    }
}

header($back);
exit;
