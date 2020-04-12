<?php
    $id = $ff->get("id_pengguna");
    $res = $odb->select("penggunaan where id_pengguna='$id'");
    $dt1 = $res->fetch();
?>

<div id="content">
    <header>
        <H2 class="title">Form Edit Pengguna</H2>
    </header>
    <div class="content-inner">
        <div class="form-wrapper">
                <form action="spenggunaan.php?aksi=edit&id_pengguna=<?=$id?>" method="post" class="form-container">
                <div class="form-title">Nama</div>
                <select name="id_pelanggan" class="form-control">
                    <?php
                        $q = $odb->select("pelanggan");
                        while ($dt = $q->fetch()) {
                            # code...
                    ?>
                    <option value="<?=$dt['id_pelanggan']?>"><?=$dt['nama']?></option>
                    <?php
                        }
                    ?>
                </select>
                <div class="form-title">Bulan</div>
                <input type="number" name="bulan" class="form-control" value="<?=$dt1['bulan']?>">

                <div class="form-title">Tahun</div>
                <input type="number" name="tahun" class="form-control" value="<?=$dt1['tahun']?>">

                <div class="form-title">Meter Awal</div>
                <input type="number" name="meter_awal" class="form-control" value="<?=$dt1['meter_awal']?>">

                <div class="form-title">Meter Akhir</div>
                <input type="number" name="meter_akhir" class="form-control" value="<?=$dt1['meter_akhir']?>">

                <div class="form-title">Tanggal Bayar</div>
                <input type="date" name="tanggal_bayar" class="form-control" value="<?=$dt1['tanggal_bayar']?>">

                <div class="form-title">Biaya Admin</div>
                <input type="number" name="biaya_admin" class="form-control" value="<?=$dt1['biaya_admin']?>">

                <div class="form-title">Status</div>
                <select name="status" class="form-control">
                    <option value="Bayar">Bayar</option>
                    <option value="Belum Bayar">Belum</option>
                </select><br>
                <div class="clearfix">
                    <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" value="Ubah">
                </div>
            </form>
        </div>
    </div>
</div>