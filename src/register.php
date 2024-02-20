<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
</head>

<body>
    <div class="h-screen">
        <div class="flex h-full">
            <div class="basis-1/2">
                <img src="assets/img/login.jpg" alt="" class="h-full">
            </div>

            <div class="flex justify-center items-center basis-1/2">
                <form action="proses_register.php" method="post" class="w-2/3">

                    <div class="flex justify-center w-full mb-2">
                        <span class="text-2xl font-bold">Register</span>
                    </div>
                    <div class="flex flex-col mb-2">
                        <span class="font-semibold">Username</span>
                        <input type="text" name="username" class="bg-slate-200 rounded-lg px-3 py-1">
                    </div>
                    <div class="flex flex-col mb-2">
                        <span class="font-semibold">Password</span>
                        <input type="password" name="password" class="bg-slate-200 rounded-lg px-3 py-1">
                    </div>
                    <div class="flex flex-col mb-2">
                        <span class="font-semibold">Email</span>
                        <input type="text" name="email" class="bg-slate-200 rounded-lg px-3 py-1">
                    </div>
                    <div class="flex flex-col mb-2">
                        <span class="font-semibold">Nama Lengkap</span>
                        <input type="text" name="namalengkap" class="bg-slate-200 rounded-lg px-3 py-1">
                    </div>
                    <div class="flex flex-col mb-5">
                        <span class="font-semibold">Alamat</span>
                        <input type="text" name="alamat" class="bg-slate-200 rounded-lg px-3 py-1">
                    </div>
                    <div class="flex flex-col w-full justify-center gap-2">
                        <button type="submit" class="border border-green-600 text-green-600 font-semibold rounded-lg py-2 uppercase transition-all hover:bg-green-600 hover:text-white hover:scale-105">Register</button>
                        <span class="text-center">Atau</span>
                        <button onclick="window.location.href='login.php'" type="button" class="font-semibold border border-blue-600 text-blue-600 rounded-lg py-2 uppercase transition-all hover:bg-blue-600 hover:text-white hover:scale-105">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>