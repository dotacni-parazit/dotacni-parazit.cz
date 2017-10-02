<?php

use Cake\Cache\Cache;


$cache_key = 'fyzicke_osoby_ajax';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($osoby as $o) {

        $data_arr[] = [
            $o->jmeno,
            $o->prijmeni,
            $o->rokNarozeni,
            !empty($o->AdresaBydliste) ? $o->AdresaBydliste->obecNazev : '',
            $o->Stat->statNazev,
            0,
            0,
            $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $o->idPrijemce)
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