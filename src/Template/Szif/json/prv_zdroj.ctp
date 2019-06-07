<?php
/**
 * @var AppView $this
 */


use App\View\AppView;
use App\View\DPUTILS;

$data_arr = [];
$total = 0;

foreach ($sources as $s) {
    $data_arr[] = [
        $s['jmeno'],
        empty($s['ico']) ? '' : $this->Html->link($s['ico'], '/program-rozvoje-venkova/ico/' . $s['ico']),
        $this->Html->link($s['okres'], '/program-rozvoje-venkova/okres/?name=' . urlencode($s['okres'])),
        $this->Html->link($s['obec'], '/program-rozvoje-venkova/obec/?name=' . urlencode($s['obec'])),
        $this->Html->link($s['opatreni'], '/program-rozvoje-venkova/opatreni/?name=' . urlencode($s['opatreni'])),
        DPUTILS::currency($s['czk_tuzemske']),
        DPUTILS::currency($s['czk_evropske']),
        DPUTILS::currency($s['czk_celkem'])
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