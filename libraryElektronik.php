<?php
class LibraryElektronik {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_barang_elektronik_sekolah','root','');
    }

    //QUERY UNTUK TABLE ELEKTRONIK

    public function tambahElektronik($KodeBarang,$NamaBarang,$Tanggal,$Keterangan,$Jumlah,$Kondisi) {
        $sql = "INSERT INTO elektronik (Kode_barang, Nama_barang, Tanggal, Keterangan, Jumlah, kondisi) VALUES ('$KodeBarang','$NamaBarang','$Tanggal','$Keterangan','$Jumlah','$Kondisi')";
        $query = $this->db->query($sql);

        if(!$query){
            return 'Tambah Data Gagal';
        } else {
            return 'Tambah Data Berhasil';
        }
    }

    public function tampilElektronik() {
        $sql = "SELECT * FROM elektronik";
        $query = $this->db->query($sql);
        return $query;
    }

    public function editElektronik($KodeBarang) {
        $sql = "SELECT * FROM elektronik WHERE Kode_barang = '$KodeBarang'";
        $query = $this->db->query($sql);
        return $query;
    }

    // public function updateElektronik($KodeBarang,$NamaBarang,$Tanggal,$Keterangan,$Jumlah,$Kondisi) {
    //     $sql = "UPDATE elektronik SET Kode_barang = '$KodeBarang', Nama_barang = '$NamaBarang', Tanggal = '$Tanggal', Keterangan = '$Keterangan', Jumlah = '$Jumlah', kondisi = '$Kondisi' WHERE Kode_barang = $KodeBarang";
    //     $query = $this->db->query($sql);

    //     if(!$query) {
    //         return "Edit Data Gagal";
    //     } else {
    //         return "Edit Data Berhasil";
    //     }
    // }

    public function updateElektronik($KodeBarang, $NamaBarang, $Tanggal, $Keterangan, $Jumlah, $Kondisi) {
        $sql = "UPDATE elektronik SET Nama_barang = :NamaBarang, Tanggal = :Tanggal, Keterangan = :Keterangan, Jumlah = :Jumlah, kondisi = :Kondisi WHERE Kode_barang = :KodeBarang";
        
        $query = $this->db->prepare($sql);
    
        $query->bindParam(':KodeBarang', $KodeBarang, PDO::PARAM_STR);
        $query->bindParam(':NamaBarang', $NamaBarang, PDO::PARAM_STR);
        $query->bindParam(':Tanggal', $Tanggal, PDO::PARAM_STR);
        $query->bindParam(':Keterangan', $Keterangan, PDO::PARAM_STR);
        $query->bindParam(':Jumlah', $Jumlah, PDO::PARAM_INT);
        $query->bindParam(':Kondisi', $Kondisi, PDO::PARAM_STR);
    
        $query->execute();
    
        if (!$query) {
            return "Edit Data Gagal";
        } else {
            return "Edit Data Berhasil";
        }
    }
    

      public function deleteElektronik($KodeBarang){
        $sql = "DELETE FROM elektronik WHERE Kode_barang = '$KodeBarang'";
        $result = $this->db->query($sql);

        if(!$result) {
            return "Hapus Data Gagal";
        } else {
            return "Hapus Data Berhasil";
        }
    }
}


?>