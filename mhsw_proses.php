<?php

require_once "inc/Koneksi.php";
require_once "app/Mahasiswa.php";

$mhsw = new App\Mahasiswa();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'store':
        if (isset($_POST['store'])) {
            $mhsw->store();
        }
        break;

    case 'update':
        if (isset($_POST['update'])) {
            $mhsw->update();
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $mhsw->delete($_GET['id']);
        }
        break;

    default:
        header("Location: index.php?page=mhsw");
        break;
}

header("Location: index.php?page=mhsw");
exit;
