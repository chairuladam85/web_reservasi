<?php
require 'function.php';

//Cek login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //cek kecocokan dalam database
    $cekdatabase = mysqli_query($koneksi, "select * from login where email='$email' and password='$password'");

    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        header('location:login.php');
    };
};

if (!isset($_SESSION['log'])) {
} else {
    header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div class="bg-gambar">
        <style>
            body {
                background-image: url('assets/img/rs.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </div>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-3">Panel Admin Reservasi</h3>
                                    <h5 class="text-center font-weight-light my-2">Silahkan Login</h5>
                                </div>
                                <div class="card-body">
                                    <div class="gambar">
                                        <img src="assets/img/iconrs.png" alt="Image" height="256" width="256" style="display:block; margin:auto;">
                                    </div>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Alamat Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Kata Sandi</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3 mb-0">
                                            <button class="btn btn-primary" name="login">Login</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>