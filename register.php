<?php
include "koneksi.php";
session_start();

if (isset($_SESSION['login'])) {
  echo "<script>
    alert('cieee udah login');
    location.href='admin.php';
  </script>";
}

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $namalengkap = $_POST['namalengkap'];
  $alamat = $_POST['alamat'];

  $sql=mysqli_query($conn,"insert into user values('','$username','$password','$email','$namalengkap','$alamat')");
  echo "<script>
    alert('Registrasi berhasil, silahkan login');
    location.href='login.php';
  </script>";
 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fairies site </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

</head>

<body>
    <?php 
    include "layout/header.html";
    ?>

<main class="container mt-5 mb-3">
   <div class="row justify-content-center text-warning">
    <div class="col-sm-4 mt-4 mb-5">
      <div class="text-center">
        <h1 class="fw-bold"> REGISTER </h1>
      </div>
 
      <form action="register.php" method="POST">
        <div class="mb-3 mt-4 text-white">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" placeholder="Masukan username" name="username" required>
        </div>
        <div class="mb-3 mt-2 text-white">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password" required>
        </div>
        <div class="mb-3 mt-2 text-white">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" required>
        </div>
        <div class="mb-3 mt-2 text-white">
          <label for="namalengkap">Nama Lengkap:</label>
          <input type="text" class="form-control" id="namalengkap" placeholder="Masukan nama lengkap" name="namalengkap" required>
        </div>
        <div class="mb-3 mt-2 text-white">
          <label for="alamat">Alamat:</label>
          <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" name="alamat" required>
        </div>
        <div class="form-check mb-4 text-white">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <div class="row mb-3"></div>
        <div class="d-grid gap-2" class="text-center">
        <button type="submit" class="btn btn-warning" name="register">Sign Up</button>
        </div>

        <div class="mt-2 text-center text-white">
        Already have an account? Go <a href="login.php" class="link-warning">Sign in</a>
        </div>
    
      </form>
    </div>
  </div>
</main>

    <?php 
    include "layout/footer.html";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>