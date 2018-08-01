<?php

use Cake\Cache\Cache;


$cache_key = 'ajax_granty_praha_prijemci';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var array $soucty */
    /** @var \App\Model\Entity\GrantyPrahaZadatel[] $prijemci */
    foreach ($prijemci as $p) {

        $data_arr[] = [
            $this->Html->link($p->nazev, '/granty-praha/prijemce/' . $p->id_zadatel),
            $p->ic,
            $p->pravni_forma,
            $soucty[$p->id_zadatel]['pocet_projektu'],
            \App\View\DPUTILS::currency($soucty[$p->id_zadatel]['prideleno']),
            \App\View\DPUTILS::currency($soucty[$p->id_zadatel]['vycerpano'])
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