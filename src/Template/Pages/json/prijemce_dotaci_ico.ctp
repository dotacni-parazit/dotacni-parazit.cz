<?php

$data_arr = [];
$total = 0;

foreach ($data as $d) {

    /** @var string $ajax_type */
    switch ($ajax_type) {
        case 'cedr':

            /** @var \App\Model\Entity\PrijemcePomoci $d */
            $data_arr[] = [
                empty($d->obchodniJmeno) ? $d->prijmeni . ' ' . $d->jmeno : $d->obchodniJmeno,
                $d->ico,
                empty($d->Stat->statNazev) ? 'N/A' : $this->Html->link($d->Stat->statNazev, '/detail-statu/' . $d->Stat->statKod3Znaky),
                $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $d->idPrijemce)
            ];
            break;
        case 'czechinvest':

            /** @var \App\Model\Entity\InvesticniPobidky $d */
            $data_arr[] = [
                $d->name,
                $d->ico,
                \App\View\DPUTILS::currency($d->investiceCZK * 1000000),
                ($d->rozhodnutiDen == 0 ? 1 : $d->rozhodnutiDen) . "." . $d->rozhodnutiMesic . " " . $d->rozhodnutiRok,
                $this->Html->link('Otevřít', '/investicni-pobidky/detail/' . $d->id)
            ];
            break;
        case 'strukturalniFondy':

            /** @var \App\Model\Entity\StrukturalniFondy $d */
            $data_arr[] = [
                $d->zadatel,
                $d->zadatelIco,
                \App\View\DPUTILS::currency($d->verejneZdrojeCelkem),
                $d->cisloProjektu,
                $d->nazevProjektu,
                $this->Html->link('Otevřít', '/strukturalni-fondy-detail-dotace/' . $d->id)
            ];
            break;
        case 'politickeStrany':

            /** @var \App\Model\Entity\Company $d */
            /** @var array $sums */
            $data_arr[] = [
                $d->name,
                $d->ico,
                \App\View\DPUTILS::currency(isset($sums[$d->id]) ? $sums[$d->id] : 0)
            ];

            break;
    }
    $total++;
}

$out = [
    'draw' => $total > 0 ? 1 : 0,
    'recordsTotal' => $total,
    'recordsFiltered' => $total,
    'data' => $data_arr
];

echo json_encode($out);