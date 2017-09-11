<?php

use Cake\Cache\Cache;


$cache_key = 'ajax_podle_poskytovatelu';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var \App\Model\Entity\CiselnikDotacePoskytovatelv01[] $data */
    foreach ($data as $d) {

        $data_arr[] = [
            $this->Html->link($d->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $d->dotacePoskytovatelKod),
            \App\View\DPUTILS::currency($counts[$d->id]['soucet']),
            \App\View\DPUTILS::currency($counts[$d->id]['soucetSpotrebovano'])
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