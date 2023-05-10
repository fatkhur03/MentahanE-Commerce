<?php 
require_once 'dbkoneksi.php';
?>
<?php 
   $_kode = $_POST['kode'];
   $_nama = $_POST['nama'];
   $_harga = $_POST['harga'];
   $_stok = $_POST['stok'];
   $_jenis_produk = $_POST['jenis_produk'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_kode; // ? 1
   $ar_data[]=$_nama; // ? 2
   $ar_data[]=$_harga;// 3
   $ar_data[]=$_stok;
   $ar_data[]=$_jenis_produk; // ? 7

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO produk (kode,nama,harga,stok,jenis_produk) VALUES (?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE produk SET kode=?,nama=?,harga=?,
    stok=?,jenis_produk=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_produk.php');
?>