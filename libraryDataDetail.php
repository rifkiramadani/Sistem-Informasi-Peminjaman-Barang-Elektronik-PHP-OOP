<?php
class LibraryDataDetail {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_barang_elektronik_sekolah','root','');
    }

    public function tampilSemua(){
        $sql = "SELECT * FROM elektronik JOIN detail_barang ON elektronik.Kode_barang = detail_barang.Kode_barang";
        $query = $this->db->query($sql);
        return $query;
    }
}
?>