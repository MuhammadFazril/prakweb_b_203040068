<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Bubu</title>
  <link rel="stylesheet" href="css/style.css" class="css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  
<!-- navbar -->
<nav class="navbar bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Daftar Buku</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
  <br><br>
</nav>

<!-- table -->
  <table class="table table-dark " cellpadding="0" cellspacing="0" >
  <div class="container">
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Penulis</th>
      <th>Tahun Terbit</th>
      <th>Penerbit</th>
      <th>Gambar</th>
      <th>Opsi</th>
    </tr>

    <?php
    $i = 1;
    foreach ($buku as $b) : ?>
      <tr>
        <td><?= $i++; ?></td>
   
        <td><?= $b['judul_buku']; ?></td>
        <td><?= $b['penulis']; ?></td>
        <td><?= $b['tahun_terbit']; ?></td>
        <td><?= $b['penerbit']; ?></td>
        <td><img src="img/<?= $b['gambar']; ?>" class="rounded float-start" width="120"></td>
        <td>
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-light" type="button">Tambah</button>
          <button class="btn btn-light" type="button">Hapus</button>
        </div>
        </td>
      </tr>

    <?php endforeach; ?>
  </div>
  </table>

  <!-- CRUD -->



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>

