<?php 
include_once 'C_koneksi.php';

class C_market_list{

    public function tampil(){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM market_list ORDER BY id DESC";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {
            $hasil[] = $q;
        }
        if(!empty($hasil))
        return $hasil;
       }
       
    public function tambah($id, $nama, $harga, $stock, $foto){

        $conn = new C_koneksi();

        $sql = "INSERT INTO market_list VALUES ('$id', '$nama', '$harga', '$stock', '$foto')";  

        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/V_market_list.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
     }   

    public function edit($id){

        $conn = new C_koneksi();

        $sql = "SELECT * FROM market_list WHERE id = '$id' ";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {
            $hasil[] = $q;
        }
        return $hasil;
       }
       

    public function update($id, $nama, $harga, $stock, $foto){
        $conn = new C_koneksi();
        $sql = "UPDATE market_list SET nama_barang = '$nama' , harga = '$harga' , stock = '$stock' , foto = '$foto' WHERE id = '$id'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/V_market_list.php'</script>";
        }else {
            echo "gagal ditambahkan";
        }
     }   

    public function delete($id){
        $conn = new C_koneksi();
        $sql = "DELETE FROM market_list WHERE id = '$id'";
        $query = mysqli_query($conn->conn(), $sql);
        if ($query){
            header ("location: ../views/V_market_list.php");
        }
    }

    }

?>
