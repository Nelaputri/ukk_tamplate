<?php
include "koneksi.php";
session_start();

$fotoid = $_POST['fotoid'];
$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];

//Jika Upload gambar baru
if ($_FILES['lokasifile']['name'] != "") {
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:foto.php");
    } else {
        if ($ukuran < 2044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], './gambar/' . $rand . '_' . $filename);
            mysqli_query($conn, "update foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',lokasifile='$xx',albumid='$albumid' where fotoid=$fotoid");
            header("location:foto.php");
        } else {
            header("location:foto.php");
        }
    }
} else {
    mysqli_query($conn, "update foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',albumid='$albumid'");
    header("location:foto.php");
}
