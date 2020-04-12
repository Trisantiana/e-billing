<?php
ini_set("display_errors", "1");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $q = "select p.id_pelanggan,p.no_meter,p.nama,p.alamat,t.daya from pelanggan p, tarif t where p.kode_tarif=t.kode_tarif";
    $page = isset($_GET['page']) ?$_GET['page']:1;
    $pag = $odb->paging($q,4,$page);
?>

<div id="content">
    <header>
        <h2 class="title">Data Pelanggan</h2>
        <a href="?hal=fpelanggan" class="btn-sm btn-primary pull-right"><i class="fa fa-plus"></i>Tambah</a>
    </header>
    <div class="content-inner">
        <div class="table-responsive">
            <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>No.Meter</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Daya</th>
                <th colspan="2">Option</th>
            </tr>
            <?php
                $j = $pag["no"];
                $n = $j + 1;
                while ($dt = $pag["query"]->fetch()) {
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$dt["no_meter"]?></td>
                <td><?=$dt["nama"]?></td>
                <td><?=$dt["alamat"]?></td>
                <td><?=$dt["daya"]?></td>
                <td><a href="?hal=spelanggan&aksi=hapus&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-danger" > <i class="fa fa-trash"></i> Hapus</a></td>
                <td><a href="?hal=epelanggan&id_pelanggan=<?=$dt['id_pelanggan']?>" class="btn btn-success"> <i class="fa fa-edit"></i> Ubah</a></td>
            </tr>
            <?php
                $n++;
                }
            ?>
            <tr>
                <td colspan="8"></td>
            </tr>
        </table>
        </div>
        <?php
            $odb->nav("?hal=dpelanggan",$pag["jumlah"],$page)
        ?> <br><br>

    </div>
</div>