<?php 
require_once 'dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];
   
    $sql = "SELECT * FROM pesanan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
?>

<table class="table table-striped">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><?=$row['nama_produk']?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?=$row['tanggal']?></td>
        </tr>
        
        <tr>
            <td>qty</td>
            <td><?=$row['qty']?></td>
        </tr>
       
        <tr>
            <td>total harga</td>
            <td><?=$row['total_harga']?></td>
        </tr>

        <tr>
            <td>nama pemesan</td>
            <td><?=$row['nama_pemesan']?></td>
        </tr>

        <tr>
            <td>alamat pemesan</td>
            <td><?=$row['alamat_pemesan']?></td>
        </tr>
        
    </tbody>
</table>