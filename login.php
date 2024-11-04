<?php
session_start();
require_once "function.php";

if (isset($_POST["login"])) {
    $login = login_akun();
} else if (isset($_POST["register"])) {
    $register = register_akun();
    echo $register > 0
        ? "<script>
            alert('Berhasil Registrasi!');
            location.href = 'login.php';
        </script>"
        : "<script>
            alert('Gagal Registrasi!');
            location.href = 'login.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/bootstrap-5.2.0/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        /* Menggunakan gambar sebagai latar belakang */
        body {
            background-image: url('src/img/bgresto.png'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #judul-form {
            font-weight: bold;
            color: #444;
        }
        .form-container {
            max-width: 400px;
            margin-top: 8%;
            padding: 40px;
            background: rgba(241, 243, 246, 0.85); /* Warna latar form dengan transparansi */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        .btn-custom {
            width: 100%;
        }
        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-container">
            <h2 id="judul-form" class="text-center mb-4">LOGIN</h2>
            
            <!-- Tab Login & Register -->
            <div class="d-flex justify-content-around mb-4">
                <button id="tab-login" class="btn btn-primary btn-custom fw-bold">LOGIN</button>
                <button id="tab-register" class="btn btn-outline-primary btn-custom fw-bold">REGISTER</button>
            </div>
            
            <!-- Jika Username & Password Login Salah -->
            <?php if (isset($_POST["login"]) && !$login) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    * Username atau password salah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            
            <!-- Form Login & Register -->
            <form id="form" action="login.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-custom">Login</button>
            </form>
        </div>
    </div>
    <script src="./src/css/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="./src/js/login.js"></script>
</body>
</html>
