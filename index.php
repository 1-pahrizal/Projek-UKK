<?php 

  include 'koneksi.php';
  include 'Controller/oop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
  <!-- ini navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="?menu=home">Data<b>Siswa</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="?menu=home">Home</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=siswa">Siswa</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=kelas">Kelas</a> 
        </li>
      </ul>
    </div>
</nav>
<!-- ini akhir navbar -->

<div class="container">
  <?php 
    switch(@$_GET['menu']) {
      case "home";
       include "home.php";
       break;
      case "siswa";
        include "siswa.php";
        break;

      case "kelas";
        include "kelas.php";
        break;
    }
  
  ?>

</div>



<script src="js/jquery-3.5.1.min.js"></script>
</body>
</html>