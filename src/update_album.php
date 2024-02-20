<?php
    include "koneksi.php";
    session_start();

    $albumid=$_POST['albumid'];
    $namaalbum=$_POST['namaalbum'];
    $deskripsi=$_POST['deskripsi'];

    $sql=mysqli_query($conn,"update album set namaalbum='$namaalbum',deskripsi='$deskripsi' where albumid='$albumid'");

    header("location:album.php");
?>