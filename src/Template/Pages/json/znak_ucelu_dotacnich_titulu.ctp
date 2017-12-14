<?php

use Cake\Cache\Cache;


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
            isset($counts[$d->idUcelZnak]) ? $counts[$d->idUcelZnak] : 0,
            empty($d->zaznamPlatnostOdDatum) ? 'N/A' : $d->zaznamPlatnostOdDatum->year,
            $this->Html->link('Otevřít', '/ucel-znak-dotacnich-titulu/detail/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->ucelZnakKod)
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