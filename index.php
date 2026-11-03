<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Suendri">
    <title>Project 3 Pemrograman Berbasis Web Lanjutan</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <div class="bg-primary border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white">AKADEMIK</div>

            <?php
            if (isset($_GET['page'])) {
                $currentPage = $_GET['page'];
            } else {
                $currentPage = 'dashboard';
            }
            ?>

            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action <?php echo ($currentPage == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
                <a href="index.php?page=mhsw" class="list-group-item list-group-item-action <?php echo ($currentPage == 'mhsw') ? 'active' : ''; ?>">Mahasiswa</a>
                <a href="index.php?page=dosen" class="list-group-item list-group-item-action <?php echo ($currentPage == 'dosen') ? 'active' : ''; ?>">Dosen</a>
                <a href="index.php?page=matkul" class="list-group-item list-group-item-action <?php echo ($currentPage == 'matkul') ? 'active' : ''; ?>">Matakuliah</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="menu-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid p-4">

                <?php
                if (isset($_GET['page'])) {
                    include $_GET['page'] . ".php";
                } else {
                    include "main.php";
                }
                ?>

            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>