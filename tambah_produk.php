<?php 
require_once 'dbkoneksi.php';


?>



<form method="POST" action="proses_produk.php">
    <div class="form-group row">
        <label for="kode" class="col-4 col-form-label">Kode</label>
        <div class="col-8">
            <div class="input-group">
                
                <input id="kode" name="kode" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama Produk</label>
        <div class="col-8">
            <div class="input-group">
                
                <input id="nama" name="nama" type="text" class="form-control" value="">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga" class="col-4 col-form-label">Harga</label>
        <div class="col-8">
            <div class="input-group">
                
                <input id="harga" name="harga" value="" type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="stok" class="col-4 col-form-label">stok</label>
        <div class="col-8">
            <div class="input-group">
                
                <input id="stok" name="stok" value="" type="number" class="form-control">
            </div>
        </div>
    </div>

 
   
    <div class="form-group row">
        <label for="jenis" class="col-4 col-form-label">Jenis produk</label>
        <div class="col-8">
            <?php 
            $sqljenis = "SELECT * FROM jenis_produk";
            $rsjenis = $dbh->query($sqljenis);
        ?>
            <select id="jenis_produk" name="jenis_produk" class="custom-select">
                <?php 
            foreach($rsjenis as $rowjenis){
         ?>
                <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
                <?php
            }
        ?>
            

            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="Simpan" />
        </div>
    </div>
</form>