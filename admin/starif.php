<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);


    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $aksi=$ff->get("aksi");
    if ($aksi=="add") {
        $post=$odb->sant(INPUT_POST);
        extract($post);
        $odb->insert("tarif","null,'$daya','$tarif_perkwh'");
        $ff->alert("Data Tersimpan");
        $ff->redirect("admin.php?hal=dtarif");
    }
    if ($aksi=="edit") {
        $kd=$ff->get("kode_tarif");
        $post=$odb->sant(INPUT_POST);
        extract($post);
        $odb->update("tarif","daya='$daya',tarif_perkwh='$tarif_perkwh' where kode_tarif='$kd'");
        $ff->alert("Data Telah Diubah");
        $ff->redirect("admin.php?hal=dtarif");
    }
    if ($aksi=="hapus") {
        $kd = $ff->get("kode_tarif");
        $odb->delete("tarif where kode_tarif='$kd'");
        $ff->alert("Data Terhapus");
        $ff->redirect("admin.php?hal=dtarif");
    }