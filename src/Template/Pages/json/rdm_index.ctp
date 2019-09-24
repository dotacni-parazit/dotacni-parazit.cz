<?php
/**
 * @var RDM[] $all
 */

use App\Model\Entity\RDM;
use App\View\DPUTILS;
use Cake\Cache\Cache;

$cache_key = 'rdm_index';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($all as $rdm) {

        $data_arr[] = [
            $rdm->in_year,
            $rdm->ico_prijemce_num,
            $rdm->kod_prijemce_num,
            $rdm->ico_poskytovatele,
            DPUTILS::currency($rdm->castka_kc),
            $rdm->ucel
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
