<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM produk";
   $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="tambah_produk.php" role="button">Create Produk</a>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>harga</th>
            <th>stok</th>
            <th>Jenis Produk</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
        <tr style="text-align: center;">
            <td><?=$nomor?></td>
            <td><?=$row['kode']?></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['harga']?></td>
            <td><?=$row['stok']?></td>
            <td><?php
                    if ($row['jenis_produk'] == "1") {
                        echo "Makanan";
                    } elseif ($row['jenis_produk'] == "2") {
                        echo "Minuman";
                    }elseif ($row['jenis_produk'] == "3") {
                        echo "Seafood";
                    } elseif ($row['jenis_produk'] == "4") {
                        echo "Aneka Jus";
                    }else {
                        echo "Non Member";
                    }
                    

            ?></td>
            <td>
                 <!-- <a class="btn btn-primary" href="tambah_pesanan.php?id=<?=$row['id']?>">Beli</a> -->
                <a class="btn btn-primary" href="detail_produk.php?id=<?=$row['id']?>">Detail</a>
                <a class="btn btn-primary" href="edit_produk.php?idedit=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_produk.php?iddel=<?=$row['id']?>"
                    onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['nama']?>?')) {return false}">Delete</a>
            </td>
        </tr>
        <?php 
                $nomor++;   
                } 
                ?>
    </tbody>
</table>