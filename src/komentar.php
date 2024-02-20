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
    <title>Halaman Komentar</title>
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

            <div class="flex justify-center mb-10">
                <form action="tambah_komentar.php" method="post" class="basis-1/3">
                    <?php
                    include "koneksi.php";
                    $fotoid = $_GET['fotoid'];
                    $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>

                        <div class="flex justify-center w-full mb-2">
                            <span class="text-2xl font-bold">Tambah Komentar</span>
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
                            <img src="gambar/<?= $data['lokasifile'] ?>" alt="" width="200px">
                        </div>
                        <div class="flex flex-col mb-2">
                            <span class="font-semibold">Komentar</span>
                            <input type="text" name="isikomentar" class="border border-black rounded-lg px-3 py-1">
                        </div>
                        <div class="flex flex-col w-full justify-center">
                            <button type="submit" class="border border-blue-600 text-blue-600 font-semibold rounded-lg py-2 uppercase transition-all hover:bg-blue-600 hover:text-white hover:scale-105">Tambah</button>
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div class="columns-6">
                <?php
                include "koneksi.php";
                $fotoid = $_GET['fotoid'];
                $sql = mysqli_query($conn, "select komentarfoto.*, user.namalengkap from komentarfoto left join user on komentarfoto.userid = user.userid where komentarfoto.fotoid = '$fotoid'");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <div class="break-inside-avoid flex flex-col bg-gray-200 px-2 py-1 rounded-lg">
                        <span class="font-bold"><?= $data['namalengkap'] ?></span>
                        <span>"<?= $data['isikomentar'] ?>"</span>
                        <span class="italic text-gray-400"><?= $data['tanggalkomentar'] ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>