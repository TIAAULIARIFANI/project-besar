<?php
include_once '../controllers/C_market_list.php';

$market = new C_market_list();

    if ($_GET['aksi'] == 'tambah') {

        $id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];

        $market->tambah($id,$nama_barang,$harga,$stock,'');
    }
    elseif ($_GET['aksi'] == 'update') {

        $id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];

        $market->update($id,$nama_barang,$harga,$stock,'');
    }
    elseif ($_GET['aksi'] == 'hapus') {

        $id = $_GET['id'];
        $market->delete($id);
    }

 
?>