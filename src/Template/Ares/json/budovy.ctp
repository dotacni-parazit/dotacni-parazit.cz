<?php

use Cake\Cache\Cache;

$cache_key = 'hackujstat_budovy_index';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {
    $data_arr = [];
    $total = 0;

    /** @var \App\Model\Entity\Budova[] $budovy */
    foreach ($budovy as $o) {

        $data_arr[] = [
            $this->Html->link($o->ulice . ' ' . $o->cisloDomovni, '/ares/budovy/detail/' . $o->id),
            $o->psc,
            $o->pocetPrijemcu,
            $o->pocetDotaci,
            \App\View\DPUTILS::currency($o->castkaRozhodnuta),
            \App\View\DPUTILS::currency($o->castkaPozadovanaSum)
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