<?php
class LibraryDetailElektronik {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_barang_elektronik_sekolah','root','');
    }

    public function tambahDetail($kodePeminjam, $kodeBarang, $peminjam, $pemberi, $tanggalKembali, $lokasiDipinjam) {
        $sql = "INSERT INTO detail_barang (Kode_peminjam, Kode_barang, peminjam, pemberi, tanggal_kembali, lokasi_dipinjam) VALUES ('$kodePeminjam','$kodeBarang','$peminjam','$pemberi','$tanggalKembali','$lokasiDipinjam')";
        $query = $this->db->query($sql);

        if(!$query){
            return "Tambah Data Gagal";
        } else {
            return "Tambah Data Berhasil";
        }

    }

    public function tampilDetail() {
        $sql = "SELECT * FROM detail_barang";
        $query = $this->db->query($sql);
        return $query;
    }

    public function editDetail($kodePeminjam) {
        $sql = "SELECT * FROM detail_barang WHERE Kode_peminjam = '$kodePeminjam'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateDetail($kodePeminjam, $kodeBarang, $peminjam, $pemberi, $tanggalKembali, $lokasiDipinjam) {
        $sql = "UPDATE detail_barang SET Kode_peminjam = :kodePeminjam, peminjam = :peminjam, pemberi = :pemberi, tanggal_kembali = :tanggalKembali, lokasi_dipinjam = :lokasiDipinjam WHERE Kode_peminjam = :kodePeminjam";
    
        $query = $this->db->prepare($sql);
    
        $query->bindParam(':kodePeminjam', $kodePeminjam, PDO::PARAM_STR);
        $query->bindParam(':kodeBarang', $kodeBarang, PDO::PARAM_STR);
        $query->bindParam(':peminjam', $peminjam, PDO::PARAM_STR);
        $query->bindParam(':pemberi', $pemberi, PDO::PARAM_STR);
        $query->bindParam(':tanggalKembali', $tanggalKembali, PDO::PARAM_STR);
        $query->bindParam(':lokasiDipinjam', $lokasiDipinjam, PDO::PARAM_STR);
    
        $query->execute();
    
        if (!$query) {
            return "Edit Data Gagal";
        } else {
            return "Edit Data Berhasil";
        }
    }
    

    public function deleteDetail($kodePeminjam){
        $sql = "DELETE FROM detail_barang WHERE Kode_peminjam = '$kodePeminjam'";
        $result = $this->db->query($sql);

        if(!$result){
            return "Hapus Data Gagal";
        }else {
            return "Hapus Data Berhasil";
        }
    }
}


?>