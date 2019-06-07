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
        empty($d->ico) ? '' : $this->Html->link($d->ico, '/program-rozvoje-venkova/ico/' . $d->ico),
        $d->jmeno,
        $d->count,
        DPUTILS::currency($d->sum),
        $this->Html->link('Otevřít', '/program-rozvoje-venkova/ico/' . $d->ico)
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