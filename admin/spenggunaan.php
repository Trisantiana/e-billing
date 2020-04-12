<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $aksi = $ff->get("aksi");
    if ($aksi=="add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->insert("penggunaan","null,'$id_pelanggan','$bulan','$tahun','$meter_awal','$meter_akhir','$tanggal_bayar','$biaya_admin','$status'");
        $ff->alert("Data Tersimpan");
        $ff->redirect("admin.php?hal=dpenggunaan");
    }
    if ($aksi == "edit") {
        $id = $ff->get("id_pengguna");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $odb->update("penggunaan","id_pelanggan='$id_pelanggan',bulan='$bulan',tahun='$tahun',meter_awal='$meter_awal',meter_akhir='$meter_akhir',tanggal_bayar='$tanggal_bayar',biaya_admin='$biaya_admin',status='$status' where id_pengguna='$id'");
        $ff->alert("Data Telah Diubah");
        $ff->redirect("admin.php?hal=dpenggunaan");
    }
    if ($aksi == "hapus") {
        $id = $ff->get("id_pengguna");
        $odb->delete("penggunaan where id_pengguna='$id'");
        $ff->alert("Data Terhapus");
        $ff->redirect("admin.php?hal=dpenggunaan");
    }
?>