<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$cache_key = 'podle_sidla_prijemce_obce_ajax';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;


    foreach ($obce as $o) {

        $data_arr[] = [
            $this->Html->link($o->obecNazev, '/detail-obce/' . $o->obecKod),
            Number::currency($obce_soucet[$o->id]->soucet),
            Number::currency($obce_soucet[$o->id]->soucetSpotrebovano)
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