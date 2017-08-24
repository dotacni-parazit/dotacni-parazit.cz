<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;


$cache_key = 'ucel_znak_dotacni_tituly';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($znaky as $d) {

        $data_arr[] = [
            $d->ucelZnakNazev,
            $d->ucelZnakKod,
            $d->statniRozpocetKapitolaKod,
            empty($d->zaznamPlatnostOdDatum) ? 'N/A' : $d->zaznamPlatnostOdDatum->year
        ];
        $total++;
    }

    $out = [
        'draw' => 1,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data_arr
    ];

    Cache::write($cache_key, json_encode($out), 'long_term');
    echo json_encode($out);
} else {
    echo $cache_data;
}