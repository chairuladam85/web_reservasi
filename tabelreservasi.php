<?php
require 'function.php';
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Reservasi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Rumah Sakit</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Reservasi
                        </a>
                        <a class="nav-link" href="tabelreservasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                            Data Reservasi
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai:</div>
                    Administrator
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Reservasi Pasien</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Untuk mengecek data reservasi pasien.</li>
                    </ol>
                    <div class="mx-auto">
                        <!-- untuk menampilkan data -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Data Reservasi
                            </div>
                            <div class="card-body">
                            <?php
                                if ($error) {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php
                                    header("refresh:3;url=tabelreservasi.php"); //5 : detik
                                }
                                ?>
                                <?php
                                if ($sukses) {
                                ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $sukses ?>
                                    </div>
                                <?php
                                    header("refresh:3;url=tabelreservasi.php");
                                }
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No. Rekam Medis</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql2   = "select * from reservasi order by id asc";
                                        $q2     = mysqli_query($koneksi, $sql2);
                                        $urut   = 1;
                                        while ($r2 = mysqli_fetch_array($q2)) {
                                            $id         = $r2['id'];
                                            $rm         = $r2['rm'];
                                            $tanggal    = $r2['tanggal'];
                                            $namapasien = $r2['namapasien'];
                                            $poli       = $r2['poli'];

                                        ?>
                                            <tr>
                                                <td><?= $urut++ ?></td>
                                                <td><?= $rm ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $namapasien ?></td>
                                                <td><?= $poli ?></td>
                                                <td>
                                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Ubah</button></a>
                                                    <a href="tabelreservasi.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>