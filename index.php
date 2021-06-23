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
    <title>Reservasi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
        .max-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
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
                    <h1 class="mt-4">Reservasi Pasien</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Menambah dan mengubah data pasien disini.</li>
                    </ol>
                    <div class="mx-auto">
                        <!-- untuk memasukkan data -->
                        <div class="card">
                            <div class="card-header">
                                Tambah Data Reservasi
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
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="rm" class="col-sm-2 col-form-label">No. Rekam Medis</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="rm" name="rm" value="<?php echo $rm ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                                        </div>
                                        <div class="col-auto">
                                            <span id="tanggalHelp" class="form-text">
                                                Contoh pengisian tanggal (01-01-2021)
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="namapasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="namapasien" name="namapasien" value="<?php echo $namapasien ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="poli" class="col-sm-2 col-form-label">Poli</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="poli" id="poli">
                                                <option value="">- Pilih poli -</option>
                                                <option value="Umum" <?php if ($poli == "Umum") echo "selected" ?>>Poli
                                                    Umum</option>
                                                <option value="Gigi" <?php if ($poli == "Gigi") echo "selected" ?>>Poli
                                                    Gigi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
        </main>

    </div>
    </div>
</body>

</html>