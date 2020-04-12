<div id="content">
    <header>
        <h2 class="title">Form Input Penggunaan</h2>
    </header>
    <div class="content-inner">
        <div class="form-wrapper">
            <form action="spenggunaan.php?aksi=add" method="post" class="form-container">
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
                <!-- <input type="number" name="bulan" class="form-control" value=""> -->
                <select name="bulan" class="form-control">
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>

                <div class="form-title">Tahun</div>
                <input type="number" name="tahun" class="form-control" placeholder="YYYY" value="">

                <div class="form-title">Meter Awal</div>
                <input type="number" name="meter_awal" class="form-control" placeholder="Meter Awal" value="">

                <div class="form-title">Meter Akhir</div>
                <input type="number" name="meter_akhir" class="form-control" placeholder="Meter Akhir" value="">

                <div class="form-title">Tanggal Bayar</div>
                <input type="date" name="tanggal_bayar" class="form-control" value="">

                <div class="form-title">Biaya Admin</div>
                <input type="number" name="biaya_admin" class="form-control" placeholder="Biaya Admin" value="">

                <div class="form-title">Status</div>
                <select name="status" class="form-control">
                    <option value="Bayar">Bayar</option>
                    <option value="Belum">Belum</option>
                </select><br>
                <div class="clearfix">
                    <input type="submit" name="btnsimpan" class="sbtn btn-primary pull-right" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
