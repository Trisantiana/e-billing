<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $kd = $ff->get("kode_tarif");
    $id = $ff->get("id_pelanggan");

    $q = $odb->select("tarif where kode_tarif='$kd'");
    $dt = $q->fetch();

    $query = $odb->select("pelanggan where id_pelanggan='$id'");
    $data = $query->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Listrik</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
</head>
<body>
    <div class="content">
        <header>
            <h1>Tagihan Transaksi Pembayaran Listrik</h1>
        </header>

        <div class="content-inner">
            <div class="form-wrapper">
                <form action="" method="post">
                    <label>Tagihan Transaksi oleh : </label>
                    Nama : <?=$data['nama']?> <br>
                    Daya : <?=$dt['daya']?> <br>
                    Tarif perKwh : <?=$ff->rp($dt['tarif_perkwh'])?> <br>
                    Meter Awal : <br>
                    Meter Akhir : <input type="number" name="meter_akhir" > <br>
                    <input type="submit" class="btn btn-primary" name="btnsimpan" value="Hitung">
                </form> <br><br>
                <?php
                    $meter_akhir = $ff->post['meter_akhir'];
                    $tarif = $dt['tarif_perkwh'];
                    $biaya_admin = '3000';

                    $biaya = $meter_akhir * $tarif;
                    $totalBiaya = $biaya + $biaya_admin;
                ?>
                Pembayaran Listrik : <?=$ff->rp($biaya)?>
                <br>biaya admin <?=$ff->rp($biaya_admin)?>
                <br> Total Bayar : <?=$ff->rp($totalBiaya)?>
            </div>
        </div>
    </div>


</body>
</html>

<!-- <?php
    $q = "select p.id_pelanggan, p.nama, pe.meter_awal, pe.meter_akhir, t.tarif_perkwh from pelanggan p, penggunaan pe, tarif t where pe.id_pelanggan=p.id_pelanggan and p.kode_tarif=t.kode_tarif";

?>

<div class="content">
    <header>
        <h2 class="title">Transaksi Pembayaran Listrik</h2>
    </header>
    <div class="content-inner">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>Nama : <?=$q['id_pelanggan']?> <br>
                        Meter Awal : <?=$q['meter_awal']?> <br>
                        Meter Akhir : <input type="number"  value="<?=$q['meter_akhir']?>">

                        <?=$q['tarif_perkwh']?>
                    </td>

                    <td>
                        <?php
                        $totalBiaya = 0;
                        $t = "select p.id_pelanggan, p.nama, t.tarif_perkwh from tarif t, pelanggan p where t.kode_tarif=p.kode_tarif"

                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

 -->