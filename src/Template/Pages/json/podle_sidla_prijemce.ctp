<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\CiselnikObecv01;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;

$var = (isset($variant) && is_numeric($variant)) ? $variant : 1;
$cache_key = 'podle_sidla_prijemce_obce_ajax_' . $var;
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;


    /** @var CiselnikObecv01[] $obce */
    foreach ($obce as $o) {
        switch ($var) {
            case 1:
            default:
                $data_arr[] = [
                    $this->Html->link($o->obecNazev, '/detail-obce/' . $o->obecKod),
                    DPUTILS::currency($obce_soucet[$o->id]->soucet),
                    DPUTILS::currency($obce_soucet[$o->id]->soucetSpotrebovano)
                ];
                break;
            case 2:

                $data_arr[] = [
                    $this->Html->link($o->obecNazev, '/detail-obce/' . $o->obecKod),
                    $o->obecNutsKod,
                    DPUTILS::currency($obce_soucet[$o->id]->soucet),
                    DPUTILS::currency($obce_soucet[$o->id]->soucetSpotrebovano)
                ];
                break;
        }
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