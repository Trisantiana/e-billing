<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

    $q = "select * from tarif";
    $page = isset($_GET['page']) ?$_GET['page']:1;
    $pag = $odb->paging($q,4,$page);
?>


<div id="content">
    <header>
        <h2 class="title">Data Tarif</h2>
        <a href="?hal=ftarif" class="btn-sm btn-primary pull-right" style="margin-right: 5px; margin-top: -17px;"> <i class="fa fa-plus"></i> Tambah</a>
    </header>

    <div class="content-inner">
        <div class="table-responsive">
        <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Daya</th>
                    <th>Tarif PerKWH</th>
                    <th colspan="2">Option</th>
                </tr>
                <?php
                    $j = $pag["no"];
                    $n = $j + 1;
                    while ($dt = $pag["query"]->fetch()) {
                ?>
                <tr>
                    <td><?=$n?></td>
                    <td><?=$dt["daya"]?></td>
                    <td><?=$ff->rp($dt["tarif_perkwh"])?></td>
                    <td><a href="?hal=starif&aksi=hapus&kode_tarif=<?=$dt['kode_tarif']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a> </td>
                    <td><a href="?hal=etarif&kode_tarif=<?=$dt['kode_tarif']?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Ubah</a></td>
                </tr>
                <?php
                    $n++;
                    }
                ?>
                <tr>
                    <td colspan="6"></td>
                </tr>

        </table>
        </div>
        <?php
            $odb->nav("?hal=dtarif",$pag["jumlah"],$page);
        ?><br><br>

    </div>
</div>
