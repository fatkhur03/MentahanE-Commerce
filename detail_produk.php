<?php 
require_once 'dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];
    // select * from pelanggan where id = $_id;
    //$sql = "SELECT a.*,b.nama as jenis FROM pelanggan a
    //INNER JOIN jenis_pelanggan b ON a.jenis_pelanggan_id=b.id WHERE a.id=?";
    $sql = "SELECT * FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    //echo 'NAMA pelanggan ' . $row['nama'];
?>


<table class="table">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?=$row['id']?></td>
        </tr>
        <tr>
            <td>Kode</td>
            <td><?=$row['kode']?></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><?=$row['nama']?></td>
        </tr>
        
        <tr>
            <td>Harga</td>
            <td><?=$row['harga']?></td>
        </tr>
       
        <tr>
            <td>Stok</td>
            <td><?=$row['stok']?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
            <?php
                    if ($row['jenis_produk'] == "1") {
                        echo "Makanan";
                    } elseif ($row['jenis_produk'] == "2") {
                        echo "Minuman";
                    }elseif ($row['jenis_produk'] == "3") {
                        echo "Makanan Siap Saji";
                    } else {
                        echo "Non Member";
                    }
                    

            ?>
            </td>
        </tr>
    </tbody>
</table>

<hr>
<a class="btn btn-primary" href="tambah_pesanan.php?id=<?=$row['id']?>">Checkout</a>