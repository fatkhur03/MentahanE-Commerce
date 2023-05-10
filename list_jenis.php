<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM jenis_produk";
   $rs = $dbh->query($sql);
?>

<a class="btn btn-success" href="tambah_jenis.php" role="button">Create Produk</a>
<table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Nama</th>
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
            <td><?=$row['nama']?></td>
            <td>
                <a class="btn btn-primary" href="edit_jenis.php?idedit=<?=$row['id']?>">Edit</a>
                <a class="btn btn-primary" href="delete_jenis.php?iddel=<?=$row['id']?>"
                    onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['nama']?>?')) {return false}">Delete</a>
            </td>
        </tr>
        <?php 
                $nomor++;   
                } 
                ?>
    </tbody>
</table>