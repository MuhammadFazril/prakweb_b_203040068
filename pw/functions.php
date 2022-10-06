<?php

function koneksi()
{
  return mysqli_connect('Localhost', 'root','', 'prakweb_2022_b_203040068');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
//tambah
function tambah($data)
{
  $conn = koneksi();
 
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $penulis = htmlspecialchars($data['penulis']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO 
            buku
            VALUES
            (null, '$judul_buku', '$penulis', '$tahun_terbit', '$penerbit', '$gambar');
            ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}


//hapus
function hapus($id)
{
  $conn = Koneksi(); 

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//UBAH data
function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $penulis = htmlspecialchars($data['penulis']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $gambar= htmlspecialchars($data['gambar']);


  $query = "UPDATE buku SET
            judul_buku = '$judul_buku',
            penulis=  '$penulis',
            tahun_terbit = '$tahun_terbit',
            penerbit =  '$penerbit',
            gambar =  '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// search 
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku 
              WHERE 
              judul_buku LIKE '%$keyword%' OR
              penulis LIKE '%$keyword%' OR
              tahun_terbit LIKE '%$keyword%' OR
              penerbit LIKE '%$keyword%' OR
              gambar LIKE '%$keyword%'
              ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
?>