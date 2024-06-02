<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIPUTRO</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
  </head>
  <body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg animate__animated animate__fadeInDown" id="navbar-container">
      <div class="container-fluid">
        <a class="navbar-brand" href="tambah_barang_elektronik.php" style="font-weight: 700;">SIPUTRO</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse d-flex justify-content-end"
          id="navbarNavAltMarkup"
        >
          <div class="navbar-nav">
            <a class="nav-link" id="nav-link" aria-current="page" href="list_barang_elektronik.php">Peminjaman</a>
            <a class="nav-link active" id="nav-link" aria-current="page" href="list_detail_barang_elektronik.php">Detail Peminjaman</a>
            <a class="nav-link" id="nav-link" aria-current="page" href="list_data_detail.php">Data Peminjaman</a>
            <button type="button" class="nav-link" id="nav-link-logout"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Logout
            </button>
          </div>
        </div>
      </div>
    </nav>

        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda Yakin Ingin Logout?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <a href="index.html"><button type="button" class="btn btn-secondary">Ya</button></a>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <!-- NAVBAR END -->

    <!-- CONTENT START -->
    <div class="card-container d-flex justify-content-center animate__animated animate__fadeInDown" style="margin-top: 50px;">
      <div class="card" style="width: 75rem; height: 95vh;">
        <div class="card-body">
          <h3 class="card-title d-flex justify-content-center">Tambah Data</h3>
          <!-- isi -->
          <form action="" method="post">
            <div class="mb-3">
                <label for="kodeBarang" class="form-label">Kode Peminjam</label>
                <input type="text" class="form-control" id="kodeBarang" aria-describedby="emailHelp" name="Kode_peminjam">
            </div>
            <div class="mb-3">
                <label for="kodeBarang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kodeBarang" aria-describedby="emailHelp" name="Kode_barang">
            </div>
            <div class="mb-3">
                <label for="namaBarang" class="form-label">Peminjam</label>
                <input type="text" class="form-control" id="namaBarang" aria-describedby="emailHelp" name="peminjam">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Pemberi</label>
                <input type="text" class="form-control" id="tanggal" aria-describedby="emailHelp" name="pemberi">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="keterangan" aria-describedby="emailHelp" name="tanggal_kembali">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Lokasi Di Pinjam</label>
                <input type="text" class="form-control" id="jumlah" aria-describedby="emailHelp" name="lokasi_dipinjam">
            </div>
            <button type="submit" class="btn btn-primary" name="submitDetail">Tambah</button>
            <a href="list_detail_barang_elektronik.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
            </form>
      </div>
    </div>
    <!-- CONTENT END -->
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</html>
<?php
require "libraryDetailElektronik.php";

if(isset($_POST['submitDetail'])){
    $kodePeminjam = $_POST['Kode_peminjam'];
    $kodeBarang = $_POST['Kode_barang'];
    $peminjam = $_POST['peminjam'];
    $pemberi = $_POST['pemberi'];
    $tanggalKembali = $_POST['tanggal_kembali'];
    $lokasiDipinjam = $_POST['lokasi_dipinjam'];

    $detailelektronik = new LibraryDetailElektronik();
    $tambahDetailElektronik = $detailelektronik->tambahDetail($kodePeminjam, $kodeBarang, $peminjam, $pemberi, $tanggalKembali, $lokasiDipinjam);

    if($tambahDetailElektronik == 'Tambah Data Berhasil'){  // Perbaikan disini, menggunakan operator == untuk perbandingan
        echo "<script> alert('Tambah Data Berhasil');
        window.location.href='list_detail_barang_elektronik.php'</script>";
    } else {
        echo "<script> alert('Tambah Data Gagal');
        window.location.href='tambah_detail_barang_elektronik.php'</script>";
    }
}
?>
