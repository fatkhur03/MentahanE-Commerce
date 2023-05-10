<?php
    require_once 'dbkoneksi.php';

    //menangkap data dari url   
    $id = $_GET['iddel'];
    
    $dbh->query("DELETE FROM produk WHERE id=$id");

    header('location:list_produk.php');
?>