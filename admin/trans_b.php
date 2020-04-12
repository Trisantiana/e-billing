<?php
    $q = "select p.id_pelanggan, p.nama, t.tarif_perkwh from pelanggan p, tarif t where p.kode_tarif=t.kode_tarif";
    $p = "select p.id_pelanggan, p.nama, pe.meter_awal, pe.meter_akhir, t.tarif_perkwh from pelanggan p, penggunaan pe, tarif t where pe.id_pelanggan=p.id_pelanggan and p.kode_tarif=t.kode_tarif";

    $total = 0;
    do {
        echo $q['id_pelanggan'];
        echo $q['tarif_perkwh'];
        echo $p['meter_awal'];
        echo $p['meter_akhir'];
        foreach ($q as $key => $q) {
            echo "$key . $p";
        }

        echo "masukkan id_pelanggan : \n";
        $q = trim(fgets(STDIN));
        echo "masukkan meter_akhir: \n";
        $p = trim(fgets(STDIN));

        switch ($q) {
            case 1:
                $p = $p1[0];
                break;

            default:
                # code...
                break;
        }

$biaya = $q['tarif_perkwh'] * $p;
$total += $biaya;
echo "Total Harga : $biaya";

$pilihan = "y/n";
echo "\nBelanja Lagi ?(y/n) \n";
$pilihan = trim(fgets(STDIN));


} while ($pilihan == 'y');

$total = $biaya;
echo "Total Pembayaran: $total";

?>