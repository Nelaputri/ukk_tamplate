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
    <title>WEB GALERI</title>
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

        <div class="ml-72 mr-20 my-12">
            <div class="flex justify-between mb-10">
                <div class="basis-2/3">
                    <p class="text-3xl">Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>
                </div>
            </div>
            <div class="columns-5">
                <?php
                include "koneksi.php";
                $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <div class="break-inside-avoid flex flex-col items-center border border-black p-2 mb-2 rounded-lg">
                        <span hidden><?= $data['fotoid'] ?></span>
                        <div class="flex justify-between w-full gap-1">
                            <span class="font-semibold"><?= $data['judulfoto'] ?></span>
                            <span><?= $data['namalengkap'] ?></span>
                        </div>
                        <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
                        <span class="italic text-gray-400"><?= $data['tanggalunggah'] ?></span>
                        <span>"<?= $data['deskripsifoto'] ?>"</span>
                        <div>
                        </div>
                        <div class="flex gap-2">
                            <a href="like.php?fotoid=<?= $data['fotoid'] ?>" class="flex items-center">
                                <span class="material-symbols-outlined text-pink-600 px-2 py-1 rounded-lg transition-all hover:scale-105">
                                    favorite
                                </span>
                                <span>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql2);
                                    ?>
                                </span>
                            </a>
                            <a href="komentar.php?fotoid=<?= $data['fotoid'] ?>" class="flex items-center">
                                <span class="material-symbols-outlined text-blue-600 px-2 py-1 rounded-lg transition-all hover:scale-105">
                                    comment
                                </span>
                                <span>
                                    <?php
                                    $fotoid = $data['fotoid'];
                                    $sql3 = mysqli_query($conn, "select * from komentarfoto where fotoid='$fotoid'");
                                    echo mysqli_num_rows($sql3);
                                    ?>
                                </span>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>