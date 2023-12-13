<?php
// - buatkan kelas sesuai dengan nama file
// - didalamnya terdapat sebuah fungsi yang bernama connection 

// ini adalah kelas, nama kelas harus sama persis dengan nama file 
use C_koneksi as GlobalC_koneksi;

class C_koneksi{

    // ini ada fungsi atau method yang bernama connection dan fungsi harus ada didalam kelas 
    public function conn(){
        // untuk isinya kita lanjutkan hari rabu 
        $conn = mysqli_connect('localhost', 'root', '', 'e-commerce');

        if (!$conn){
            die ("koneksi gagal di buat : ".mysqli_connect_error());
        }else{
            return $conn;
        }
    }
    
}
//inisialisasi objek harus di luar kls 
$conn = new C_koneksi();
//memanggil method atau fungsi yang ada di dalama kls c_koneksi
$conn->conn();



?>


