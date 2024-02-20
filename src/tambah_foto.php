<?php
include "koneksi.php";
session_start();

$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];
$tanggalunggah = date("Y-m-d");
$userid = $_SESSION['userid'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['lokasifile']['name'];
$ukuran = $_FILES['lokasifile']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if (!in_array($ext, $ekstensi)) {
    header("location:foto.php");
} else {
    if ($ukuran < 2044070) {
        $xx =  $rand . '_' . $filename;
        move_uploaded_file($_FILES['lokasifile']['tmp_name'], './gambar/' . $rand . '_' . $filename);
        mysqli_query($conn, "INSERT INTO foto VALUES(NULL,'$judulfoto','$deskripsifoto','$tanggalunggah','$xx','$albumid','$userid')");
        header("location:foto.php");
    } else {
        header("location:foto.php");
    }
}
