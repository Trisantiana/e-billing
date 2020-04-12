<h1> Dashboard</h1>

<?php
    $q = $odb->select("pelanggan order by id_pelanggan desc limit 1");
    $a = $q->fetch();
?>

<div id="box">
    <div class="box-top">
        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
        <span> Pelanggan Baru</span>
    </div>
    <div class="box-panel">
        Dengan ID : <a href="?hal=dpelanggan"><?=$a['id_pelanggan']?></a>
    </div>
</div>
