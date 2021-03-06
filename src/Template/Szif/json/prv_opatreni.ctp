<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use App\View\DPUTILS;

$data_arr = [];
$total = 0;

foreach ($data as $d) {
    $data_arr[] = [
        $d->jmeno,
        empty($d->ico) ? '' : $this->Html->link($d->ico, '/program-rozvoje-venkova/ico/' . $d->ico),
        $this->Html->link($d->zdroj, '/program-rozvoje-venkova/zdroj/?name=' . urlencode($d->zdroj)),
        $this->Html->link($d->okres, '/program-rozvoje-venkova/okres/?name=' . urlencode($d->okres)),
        $this->Html->link($d->obec, '/program-rozvoje-venkova/obec/?name=' . urlencode($d->obec) . '&okres=' . urlencode($d->okres)),
        DPUTILS::currency($d->czk_celkem),
        DPUTILS::currency($d->czk_tuzemske),
        DPUTILS::currency($d->czk_evropske)
    ];
    $total++;
}

$out = [
    'draw' => 1,
    'recordsTotal' => $total,
    'recordsFiltered' => $total,
    'data' => $data_arr
];

echo json_encode($out);