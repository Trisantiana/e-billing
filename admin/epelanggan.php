<?php
    $id = $ff->get("id_pelanggan");
    $res = $odb->select("pelanggan where id_pelanggan='$id'");
    $dt1 = $res->fetch();
?>

<div id="content">
    <header>
        <h2 class="title">Form Edit Pelanggan</h2>
    </header>
    <div class="content-inner">
        <div class="form-wrapper">
            <form action="spelanggan.php?aksi=edit&id_pelanggan=<?=$id?>" method="post" class="form-container" >
                <div class="form-title">No Meter</div>
                <input type="number" class="form-control" name="no_meter" value="<?=$dt1['no_meter']?>">

                <div class="form-title">Nama</div>
                <input type="text" name="nama" class="form-control" value="<?=$dt1['nama']?>">

                <div class="form-title">Alamat</div>
                <input type="text" name="alamat" class="form-control" value="<?=$dt1['alamat']?>">

                <div class="form-title">Daya</div>
                <select name="kode_tarif" class="form-control">
                        <?php
                            $q = $odb->select("tarif");
                            while ($dt = $q->fetch()) {
                                # code...
                        ?>
                        <option value="<?=$dt['kode_tarif']?>"> <?=$dt['daya']?> </option>
                        <?php
                            }
                        ?>
                </select> <br>
                <div class="clearfix">
                    <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" value="Ubah">
                </div>
            </form>
        </div>
    </div>
</div>