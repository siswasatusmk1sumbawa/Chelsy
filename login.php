<?php
include "koneksi.php";
session_start();

if (isset($_SESSION['login'])) {
  echo "<script>
    alert('cieee udah login');
    location.href='admin.php';
  </script>";
}

if (isset($_POST['login'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  

  $sql=mysqli_query($conn,"SELECT * from user where username='$username' and password='$password'");

  $cek=mysqli_num_rows($sql);

  if ($cek==1) {
      while ($data = mysqli_fetch_array($sql)) {
          $_SESSION['userid'] = $data['userid'];
          $_SESSION['namalengkap'] = $data['namalengkap'];
          $_SESSION['login'] = true;
          $nama = $data['username'];

      }
      echo "<script>
        alert('login success, welcome $nama');
        location.href='admin.php';
    </script> ";
  } else {
    echo "<script>
      alert('login gagal, username dan password tidak sesuai');
      location.href='login.php';
    </script> ";
  }
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

<main class="container">
   <div class="row mt-5 justify-content-center">
   <div class="col-sm-4 mt-4">
    <div class="text-center text-white">
    <h1> Login </h1>
    </div>
 
  <form action="login.php" method="POST">
    <div class="mb-4 mt-4 text-white">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Masukan username" name="username">
    </div>
    <div class="mb-4 text-white">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password">
    </div>
    <div class="form-check mb-3 text-white">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <div class="mb-3 mt-4 text-center">
    <button type="submit" class="btn btn-warning" name="login">Login</button>
    </div>
    <div class="text-center text-white">
    Belum punya akun? Ayo <a href="Register.php" class="link-warning">Register</a>
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