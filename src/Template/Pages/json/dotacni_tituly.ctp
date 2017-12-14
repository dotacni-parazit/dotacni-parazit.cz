<?php

$data_arr = [];
$total = 0;

/** @var \App\Model\Entity\CiselnikDotaceTitulv01[] $data */
foreach ($data as $d) {

    $data_arr[] = [
        $this->Html->link($d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaNazev, '/podle-zdroje-financi/t' . $d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod),
        $this->Html->link($d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod, '/podle-zdroje-financi/t' . $d->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod),
        $this->Html->link($d->dotaceTitulNazev, '/detail-dotacni-titul/' . $d->dotaceTitulKod),
        $this->Html->link($d->dotaceTitulKod, '/detail-dotacni-titul/' . $d->dotaceTitulKod)
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
