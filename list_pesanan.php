<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM pesanan";
   $rs = $dbh->query($sql);
?>

<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Qty</th>
            <th>Total Harga</th>
            <th>Nama Pemesan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
        <tr>
            <td><?=$nomor?></td>
            <td><?=$row['nama_produk']?></td>
            <td><?=$row['qty']?></td>
            <td>Rp <?php echo number_format($row['total_harga'],0,',','.'); ?></td>
            <td><?=$row['nama_pemesan']?></td>
            <td>
                <a class="btn btn-primary" href="detail_pesanan.php?id=<?=$row['id']?>">Detail</a>
                <a class="btn btn-primary" href="edit_pesanan.php?idedit=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_pesanan.php?iddel=<?=$row['id']?>"
                    onclick="if(!confirm('Anda Yakin Hapus Data Pesanan <?=$row['nama']?>?')) {return false}">Delete</a>
            </td>
        </tr>
        <?php 
                $nomor++;   
                } 
                ?>
    </tbody>
</table>