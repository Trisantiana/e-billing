<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Listrik</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
    <center>
        <div class="content">
            <header>
                <h1 > Transaksi Pembayaran Listrik</h1>
            </header>

            <div class="content-inner">
                <div class="form-wrapper" style="background-color: #fff; width: 40%;">
                    <form action="" method="post">
                        <div class="clearfix" >
                            <p>Masukkan Id Pelanggan Untuk Melanjutkan</p>
                            <input type="number" class="form-control" name="id_pelanggan" value="">
                            <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" style=" height: 30px; cursor: pointer; border-radius: 3px;" value="Berikutnya">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
    <?php
    if (isset($_POST['btnsimpan'])) {
        $post = $odb->sant(INPUT_POST);
        $id = $ff->post("id_pelanggan");
        extract($post);

        $q = $odb->select("pelanggan where id_pelanggan = '$id'");
        while ($dt = $q->fetch()) {
    ?>
    <center>
        <div class="content-inner" style="background-color: #fff; width: 40%;">
            <?php
                if (isset($_POST['id_pelanggan'])) {
            ?>
            Id Pelanggan : <?=$dt['id_pelanggan']?> <br>
            Nama Pelanggan : <?=$dt['nama']?> <br>
            Alamat : <?=$dt['alamat']?> <br>
            Nomor Meter : <?=$dt['no_meter']?> <br><br>

            <a href="trans.php?kode_tarif=<?=$dt['kode_tarif']?>&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-primary">Cek Tagihan</a>

            <?php

                }
            ?>
        </div>
    </center>
    <?php
        }
    }
    ?>
</body>
</html>


