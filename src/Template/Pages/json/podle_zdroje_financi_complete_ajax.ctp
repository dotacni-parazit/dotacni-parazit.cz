<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\Rozhodnuti;
use App\View\AppView;
use App\View\DPUTILS;

$data_arr = [];
$total = 0;

/** @var Rozhodnuti[] $dotace */
foreach ($dotace as $d) {

    $data_arr[] = [
        $this->Html->link(DPUTILS::jmenoPrijemcePomoci($d->Dotace->PrijemcePomoci), '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce),
        $this->Html->link(DPUTILS::dotaceNazev($d->Dotace), '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
        DPUTILS::currency($d->castkaRozhodnuta),
        (!empty($d->RozpoctoveObdobi) ? DPUTILS::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A'),
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
