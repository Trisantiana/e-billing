<div id="content">
    <header>
        <h2 class="box-top">Form Input Pelanggan</h2>
    </header>
    <div class="content-inner">
        <div class="form-wrapper">
            <form method="post" action="spelanggan.php?&aksi=add" class="form-container">
                <div class="form-title">No Meter</div>
                <input type="number" class="form-control" name="no_meter" value="" placeholder="No.Meter">

                <div class="form-title">Nama</div>
                <input type="text" name="nama" class="form-control" value="" placeholder="Nama">

                <div class="form-title">Alamat</div>
                <textarea name="alamat" class="form-control" value="" placeholder="Alamat"></textarea>

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
                    <input type="submit" name="btnsimpan" class="btn btn-primary pull-right" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>