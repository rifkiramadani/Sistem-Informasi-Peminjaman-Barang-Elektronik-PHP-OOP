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
        <a class="navbar-brand" href="list_barang_elektronik.php" style="font-weight: 700;">SIPUTRO</a>
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
            <a class="nav-link active" id="nav-link" aria-current="page" href="list_barang_elektronik.php">Peminjaman</a>
            <a class="nav-link" id="nav-link" aria-current="page" href="list_detail_barang_elektronik.php">Detail Peminjaman</a>
            <a class="nav-link" id="nav-link" aria-current="page" href="list_data_detail.php">Data Peminjaman</a>
            <button type="button" class="nav-link" id="nav-link-logout" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Logout
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- MODAL UNTUK LOGOUT START-->
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
    <!-- MODAL UNTUK LOGOUT END -->

    <!-- NAVBAR END -->

    <!-- CONTENT START -->
    <div class="card-container d-flex justify-content-center animate__animated animate__fadeInDown" style="margin-top: 50px;">
      <div class="card" style="width: 75rem; height: 55vh;">
        <div class="card-body">
          <h3 class="card-title d-flex justify-content-center">Tabel Data Peminjaman</h3>
          <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal Dipinjam</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
        require "libraryElektronik.php";
        $elektronik = new LibraryElektronik();
        $tampilElektronik = $elektronik->tampilElektronik();
        while($data = $tampilElektronik->fetch(PDO::FETCH_OBJ)){
          echo "
          <tbody>
          <tr>
            <th>$data->Kode_barang</th>
            <td>$data->Nama_barang</td>
            <td>$data->Tanggal</td>
            <td>$data->Keterangan</td>
            <td>$data->Jumlah</td>
            <td>$data->kondisi</td>
            <td><a href='edit_barang_elektronik.php?Kode_barang=$data->Kode_barang' class='btn btn-warning'>Ubah</a> | <a href='list_barang_elektronik.php?delete=$data->Kode_barang' class='btn btn-danger'>Hapus</a>
          </button></td>
          </tr>
        </tbody>";
        }
        ?>
      </table>
      <a href="tambah_barang_elektronik.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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
if(isset($_GET['delete'])){
  $KodeBarang = $_GET['delete'];
  $elektronik->deleteElektronik($KodeBarang);
  echo "<script>alert('Hapus Data Berhasil')
  window.location.href='list_barang_elektronik.php'</script>";
}


?>
