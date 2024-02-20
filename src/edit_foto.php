<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Foto</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
</head>

<body>

    <div class="flex">
        <div class="flex flex-col fixed justify-between py-6 shadow-lg px-16 text-lg font-bold border-r border-black gap-6 h-screen">
            <div class="flex flex-col gap-3">
                <div class="mx-6">Gallery</div>
                <a href="index.php">Home</a>
                <a href="album.php">Album</a>
                <a href="foto.php">Foto</a>
            </div>
            <div class="flex">
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <div class="ml-72 mr-20 my-12 w-full">
            <div class="">
                <p class="text-3xl">Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>
            </div>

            <div class="flex flex-col">
                <div class="flex justify-center">
                    <form action="update_foto.php" method="post" enctype="multipart/form-data" class="w-1/3">
                        <?php
                        include "koneksi.php";
                        $fotoid = $_GET['fotoid'];
                        $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>

                            <div class="flex justify-center w-full mb-2">
                                <span class="text-2xl font-bold">Edit Photo</span>
                            </div>
                            <div class="flex flex-col mb-2">
                                <span class="font-semibold">Judul Foto</span>
                                <input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>" class="border border-black rounded-lg px-3 py-1">
                            </div>
                            <div class="flex flex-col mb-2">
                                <span class="font-semibold">Deskripsi Foto</span>
                                <textarea name="deskripsifoto" class="border border-black rounded-lg px-3 py-3"><?= $data['deskripsifoto'] ?></textarea>
                            </div>
                            <div class="flex flex-col mb-2">
                                <span class="font-semibold">Lokasi Foto</span>
                                <input type="file" name="lokasifile" value="<?= $data['lokasifile'] ?>" class="border border-black rounded-lg px-3 py-1">
                            </div>
                            <div class="flex flex-col mb-2">
                                <span class="font-semibold">Album</span>
                                <select name="albumid" class="border border-black rounded-lg px-3 py-1">
                                    <option value="">pilih album</option>
                                    <?php
                                    $userid = $_SESSION['userid'];
                                    $sql2 = mysqli_query($conn, "select * from album where userid='$userid'");
                                    while ($data2 = mysqli_fetch_array($sql2)) {
                                    ?>
                                        <option value="<?= $data2['albumid'] ?>" <?php if ($data2['albumid'] == $data['albumid']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $data2['namaalbum'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="flex flex-col w-full justify-center">
                                <button type="submit" class="border border-yellow-600 text-yellow-600 font-semibold rounded-lg py-2 uppercase transition-all hover:bg-yellow-600 hover:text-white hover:scale-105">Edit</button>
                            </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>