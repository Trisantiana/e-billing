<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $q = "select p.nama,pe.id_pengguna, pe.bulan, pe.tahun, pe.meter_awal, pe.meter_akhir, pe.tanggal_bayar, pe.biaya_admin, pe.status from pelanggan p, penggunaan pe where pe.id_pelanggan=p.id_pelanggan";
    $page = isset($_GET['page']) ?$_GET['page']:1;
    $pag = $odb->paging($q,4,$page);
?>

<div id="content">
    <header>
        <h2 class="title">Data Penggunaan</h2>
        <a href="?hal=fpenggunaan" class="btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</a>
    </header>
    <div class="content-inner">
        <div class="table-responsive">
            <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Tanggal Bayar</th>
                <th>Biaya Admin</th>
                <th>Status</th>
                <th colspan="2">Option</th>
            </tr>
            <?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt = $pag["query"]->fetch()) {
                    # code...
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$dt["nama"]?></td>
                <td><?=$dt["bulan"]?></td>
                <td><?=$dt["tahun"]?></td>
                <td><?=$dt["meter_awal"]?></td>
                <td><?=$dt["meter_akhir"]?></td>
                <td><?=$dt["tanggal_bayar"]?></td>
                <td><?=$ff->rp($dt["biaya_admin"])?></td>
                <td><?=$dt["status"]?></td>
                <td><a href="?hal=spenggunaan&aksi=hapus&id_pengguna=<?=$dt['id_pengguna']?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a></td>
                <td><a href="?hal=epenggunaan&id_pengguna=<?=$dt['id_pengguna']?>" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</a></td>
            </tr>
            <?php
                $n++;
                }
            ?>
            <tr>
                <td colspan="9"></td>
            </tr>
        </table>
        </div>
        <?php
            $odb->nav("?hal=dpenggunaan", $pag["jumlah"],$page)
        ?><br><br>

    </div>
</div>