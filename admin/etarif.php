<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    $kd = $ff->get("kode_tarif");
    $res = $odb->select("tarif where kode_tarif='$kd'");
    $dt1 = $res->fetch();
?>

<div id="content">
    <header>
        <h2 class="title">Form Edit Tarif</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">

            <form action="starif.php?aksi=edit&kode_tarif=<?=$kd?>" method="post" >
                <div class="form-group">
                    <label>Daya</label>
                    <input type="text" name="daya" class="form-control" value="<?=$dt1['daya']?>">
                </div>

                <div class="form-group">
                    <label>Tarif PerKWH</label>
                <input type="text" name="tarif_perkwh" class="form-control" value="<?=$dt1['tarif_perkwh']?>">
                </div>

                <div class="clearfix">
                    <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" value="Ubah">
                </div>
            </form>
        </div>
    </div>
</div>