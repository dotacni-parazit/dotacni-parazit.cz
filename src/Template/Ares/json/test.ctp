<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\AresFO;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;

$cache_key = 'ares_fo_index';
//Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {
    $data_arr = [];
    $total = 0;

    /** @var AresFO[] $osoby */
    foreach ($osoby as $o) {


        $cache_tag_fo_sum_rozhodnuti = 'sum_rozhodnuti_fo_id_' . sha1($o->id);
        $cache_tag_fo_sum_spotrebovano = 'sum_spotrebovano_fo_id_' . sha1($o->id);

        $data_arr[] = [
            $this->Html->link($o->jmeno, '/ares/fo/detail/' . $o->id),
            $o->prijmeni,
            $o->datum_narozeni->nice(),
            $o->ico_count,
            DPUTILS::currency(Cache::read($cache_tag_fo_sum_rozhodnuti, 'long_term')),
            DPUTILS::currency(Cache::read($cache_tag_fo_sum_spotrebovano, 'long_term'))
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
