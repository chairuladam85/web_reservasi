<?php
session_start();

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "reservasi_db";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi){
    die("Tidak bisa terkoneksi ke database");
}
$rm         = "";
$tanggal    = "";
$namapasien = "";
$poli       = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from reservasi where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from reservasi where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $rm         = $r1['rm'];
    $tanggal    = $r1['tanggal'];
    $namapasien = $r1['namapasien'];
    $poli       = $r1['poli'];

    if ($rm == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $rm        = $_POST['rm'];
    $tanggal       = $_POST['tanggal'];
    $namapasien     = $_POST['namapasien'];
    $poli   = $_POST['poli'];

    if ($rm && $tanggal && $namapasien && $poli) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update reservasi set rm = '$rm',tanggal='$tanggal',namapasien = '$namapasien',poli='$poli' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into reservasi(rm,tanggal,namapasien,poli) values ('$rm','$tanggal','$namapasien','$poli')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>