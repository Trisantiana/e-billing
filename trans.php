<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include_once "lib/class-Db.php";
    include_once "lib/class-Ff.php";

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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/default.css" type="text/css">
</head>
<body>
    <div class="content">
        <header>
            <h1>Tagihan Transaksi Pembayaran Listrik</h1>
        </header>

        <div class="content-inner">
            <div class="form-wrapper">
                <form action="" method="post">
                    <label>Tagihan Pembayaran Listrik  </label>
                    Nama : <?=$data['nama']?> <br>
                    Daya : <?=$dt['daya']?> <br>
                    Tarif perKwh : <?=$ff->rp($dt['tarif_perkwh'])?> <br>
                    Meter Awal : 0001<br>
                    Meter Akhir : <input type="number" name="meter_akhir" > <br>
                    <input type="submit" class="btn btn-primary" name="btnsimpan" value="Cek Tagihan">
                </form> <br><br>
                <?php
                if (isset($_POST['btnsimpan'])) {
                    $post = $odb->sant(INPUT_POST);
                    $meter_akhir = $ff->post['meter_akhir'];
                    $tarif = $dt['tarif_perkwh'];
                    $biaya_admin = '3000';
                    extract($post);

                    $biaya = $meter_akhir * $tarif;
                    $totalBayar = $biaya + $biaya_admin;
                    $biaya1 = "select round $biaya,3";
                ?>
                Tagihan PLN : <?=$ff->rp($biaya)?>
                <br> Biaya admin : Rp. 3000 <br>
                Total Bayar : <?=$ff->rp($totalBayar)?>

                <?php
                    $id_pelanggan = $data['id_pelanggan'];
                    $bulan = date("M");
                    $tahun = date("Y");
                    $meter_awal = '1';

                    $tanggal_bayar = date("Y-M-d");
                    $status = 'Bayar';

                    $odb->insert("penggunaan", "null,'$id_pelanggan','$bulan','$tahun','$meter_awal','$meter_akhir','$tanggal_bayar','$biaya_admin','$status'");
                ?>
                <br>
                <?php
                    }
                ?>
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