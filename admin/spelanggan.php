<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $aksi = $ff->get("aksi");
    if ($aksi=="add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->insert("pelanggan","null,'$no_meter','$nama','$alamat','$kode_tarif'");
        $ff->alert("Data Tersimpan");
        $ff->redirect("admin.php?hal=dpelanggan");
    }
    if ($aksi=="edit") {
        $id=$ff->get("id_pelanggan");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->update("pelanggan","no_meter='$no_meter',nama='$nama',alamat='$alamat', kode_tarif='$kode_tarif' where id_pelanggan='$id'");
        $ff->alert("Data Telah Diubah");
        $ff->redirect("admin.php?hal=dpelanggan");
    }
    if ($aksi=="hapus") {
        $id=$ff->get("id_pelanggan");
        $odb->delete("pelanggan where id_pelanggan='$id'");
        $ff->alert("Data Terhapus");
        $ff->redirect("admin.php?hal=dpelanggan");
    }
?>