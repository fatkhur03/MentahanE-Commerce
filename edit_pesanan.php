<?php 
require_once 'dbkoneksi.php';

$_idedit = $_GET['idedit'];
if(!empty($_idedit)){
    // edit
    $sql = "SELECT * FROM pesanan WHERE id = ?";
    $st = $dbh->prepare($sql);
    $st->execute([$_idedit]);
    $row = $st->fetch();

    $sql2 = "SELECT * FROM produk WHERE nama = ?";
    $st2 = $dbh->prepare($sql2);
    $st2->execute([$row['nama_produk']]);
    $produk = $st2->fetch();


}else{
    // new data
    $row = [];
}

?>

<form method="POST" action="proses_pesanan.php">
    <div class="form-group row">
        <label for="nama_produk" class="col-4 col-form-label">nama produk</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="nama_produk" name="nama_produk" value="<?=$row['nama_produk']?>" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="tanggal" class="col-4 col-form-label">tanggal</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="tanggal" name="tanggal" value="<?php echo date('20y-m-d'); ?>" type="date" class="form-control" readonly>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="qty" class="col-4 col-form-label">qty</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="qty" name="qty" value="<?= $row['qty'] ?>" type="number" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga" class="col-4 col-form-label">harga satuan</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="harga" name="harga" type="number" class="form-control" value="<?=$produk['harga']?>" readonly>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="nama_pemesan" class="col-4 col-form-label">nama_pemesan</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="nama_pemesan" name="nama_pemesan" value="<?= $row['nama_pemesan'] ?>" type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat_pemesan" class="col-4 col-form-label">alamat_pemesan</label>
        <div class="col-8">
            <div class="input-group">
                
            <input id="alamat_pemesan" name="alamat_pemesan" value="<?= $row['alamat_pemesan'] ?>" type="text" class="form-control">
            </div>
        </div>
    </div>

    
    <div class="form-group row">
        <div class="offset-4 col-8">
            <?php
                $button = (empty($_idedit)) ? "Simpan":"Update"; 
            ?>
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?=$button?>" />
            <input type="hidden" name="idedit" value="<?=$_idedit?>" />
        </div>
    </div>
</form>