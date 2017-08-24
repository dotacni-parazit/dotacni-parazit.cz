<?php

use Cake\Cache\Cache;


$cache_key = 'kapitoly_statniho_rozpoctu_ukazatele';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($data as $d) {

        $data_arr[] = [
            $this->Html->link($d->statniRozpocetUkazatelNazev, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->statniRozpocetUkazatelKod),
            $this->Html->link($d->statniRozpocetUkazatelKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->statniRozpocetUkazatelKod),
            $this->Html->link($d->statniRozpocetKapitolaKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->statniRozpocetUkazatelKod),
            isset($ukazatele_counts[$d->id]) ? $ukazatele_counts[$d->id] : 0,
            $d->zaznamPlatnostOdDatum->year,
            $this->Html->link('Otevřít', '/kapitoly-statniho-rozpoctu-ukazatele/' . $d->zaznamPlatnostOdDatum->year . '/' . $d->statniRozpocetUkazatelKod)
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