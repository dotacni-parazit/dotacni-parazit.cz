<?php

use Cake\Cache\Cache;


$cache_key = 'prijemce_jmeno_ajax_' . sha1($name);
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($data as $d) {

        $data_arr[] = [
            empty($d->obchodniJmeno) ? $d->prijmeni . ' ' . $d->jmeno : $d->obchodniJmeno,
            $d->ico,
            empty($d->Stat->statNazev) ? 'N/A' : $this->Html->link($d->Stat->statNazev, '/detail-statu/'.$d->Stat->statKod3Znaky),
            $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $d->idPrijemce)
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