<?php

$data_arr = [];
$total = 0;

/** @var \App\Model\Entity\Rozhodnuti[] $dotace */
foreach ($dotace as $d) {

    $data_arr[] = [
        $this->Html->link(\App\View\DPUTILS::jmenoPrijemcePomoci($d->Dotace->PrijemcePomoci), '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce),
        $this->Html->link(\App\View\DPUTILS::dotaceNazev($d->Dotace), '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
        \App\View\DPUTILS::currency($d->castkaRozhodnuta),
        (!empty($d->RozpoctoveObdobi) ? \App\View\DPUTILS::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A'),
        $d->rokRozhodnuti,
        $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev,
        $d->FinancniZdroj->financniZdrojNazev
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
