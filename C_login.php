<?php
    session_start();
//modularisasi
 include_once 'C_koneksi.php';

//membuat kelas login 
class C_login{

   
    //membuat fungsi untuk menangani registarasi user
    public function register($id=0, $nama, $email, $pass, $role) { 
    
    //membuat sebuah variabel yang bertipe data obejek dari kelas file C_koneksi
     $conn = new C_koneksi();

     $sql="INSERT INTO e_commerce VALUES ('$id', '$nama', '$email', '$pass', '$role')";

     $query = mysqli_query($conn->conn(), $sql);
     if($query){
        header ("location: ../C_login.php");
     }else {
        echo "data gagal ditambahkan";
     }
    }

    //membuat fungsi untuk login user 
    public function login($email, $pass) {
      $conn = new C_koneksi();

      //untuk mengecek tombol login sudah ditekan atau diklik oleh user
      if (isset($_POST['login'])){

         //untuk menampilkan semua data dari table user berdasarkan email yang diinputkan oleh user
         $sql = "SELECT * FROM e_commerce WHERE email = '$email'";
         $query = mysqli_query($conn->conn(), $sql);
         //mengubah data dari yang tipe data objek menjadi array assosiatif
         $data = mysqli_fetch_assoc($query);

         //untuk mengecek data ada atau tidak dari hsil query
         if ($data){
         //untuk mengecek atau membandingkan inputan password dari user dengan pasword dari table user  
            if(password_verify($pass, $data['pass'])){
               //untuk mengecek apakalh role user itu sebagai admin atau bukan 
               if($data['role'] == 'admin'){

                  //untuk menampung data dan query yang akan digunakan di halaman admin/user setelah proses login
                  $_SESSION["data"] = $data;
                  $_SESSION["role"] = $data['role'];

                  //untuk memindahkan lokasi ke halaman admin
                  header("location: ../views/home.php");
                  //untuk menghentikan proses eksekusi
                  exit; 
               //untuk mengecek apakalh role user itu sebagai user atau bukan 
               }elseif ($data['role'] == 'user'){
                  $_SESSION["data"] = $data;
                  $_SESSION['login'] = $_POST['login'];
                  $_SESSION["role"] = $data['role'];
                  //untuk memindahkan lokasi ke halaman user

                  header("location: ../views/home.php");
                  exit;
               }
            }else{
               echo "cek password";
            }
         }else {
            echo "cek username dan password";
         }
      }

    }

    public function logout(){
      session_destroy();
      header("location: ../views/C_login.php");
      exit;
    }
}
?>