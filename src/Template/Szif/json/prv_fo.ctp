<?php

$data_arr = [];
$total = 0;

foreach ($data as $d) {
    $data_arr[] = [
        $d->jmeno,
        $this->Html->link($d->okres, '/program-rozvoje-venkova/okres/?name=' . urlencode($d->okres)),
        $d->count,
        \App\View\DPUTILS::currency($d->sum),
        $this->Html->link('Otevřít', '/program-rozvoje-venkova/detail/' . $d->id)
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