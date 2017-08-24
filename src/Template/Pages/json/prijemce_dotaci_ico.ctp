<?php

$data_arr = [];
$total = 0;

foreach ($data as $d) {

    $data_arr[] = [
        empty($d->obchodniJmeno) ? $d->prijmeni . ' ' . $d->jmeno : $d->obchodniJmeno,
        $d->ico,
        empty($d->Stat->statNazev) ? 'N/A' : $this->Html->link($d->Stat->statNazev, '/detail-statu/' . $d->Stat->statKod3Znaky),
        $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $d->idPrijemce)
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