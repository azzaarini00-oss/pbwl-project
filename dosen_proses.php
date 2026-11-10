<?php

require_once "inc/Koneksi.php";
require_once "app/Dosen.php";

$dosen = new App\Dosen();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'store':
        if (isset($_POST['store'])) {
            $dosen->store();
        }
        break;

    case 'update':
        if (isset($_POST['update'])) {
            $dosen->update();
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $dosen->delete($_GET['id']);
        }
        break;

    default:
        header("Location: index.php?page=dosen");
        break;
}

header("Location: index.php?page=dosen");
exit;
