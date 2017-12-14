<?php

$data_arr = [];
$total = 0;

foreach ($dotace as $d) {

    $data_arr[] = [
        $this->Html->link('[R]', '/detail-rozhodnuti/' . $d->idRozhodnuti),
        $this->Html->link(\App\View\DPUTILS::dotaceNazev($d->Dotace), '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
        $this->Html->link(\App\View\DPUTILS::jmenoPrijemcePomoci($d->Dotace->PrijemcePomoci), '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce),
        $d->rokRozhodnuti,
        \App\View\DPUTILS::currency($d->castkaRozhodnuta),
        \App\View\DPUTILS::currency($d->RozpoctoveObdobi->castkaSpotrebovana),
        $d->PoskytovatelDotace->dotacePoskytovatelNazev,
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
