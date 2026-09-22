<?php

function hitungTotalAset($data) {
    $totalAset = 0;
    foreach ($data as $item) {
        $totalAset += $item['harga'] * $item['stok'];
    }
    return $totalAset;
}

function cekStokKritis($stok) {
    return $stok < 3;
}
?>