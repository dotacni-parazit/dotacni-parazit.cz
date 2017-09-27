<?php

$data_arr = [];
$total = 0;

foreach ($data as $d) {

    /** @var string $ajax_type */
    switch ($ajax_type) {
        case 'dotinfo':

            /** @var \App\Model\Entity\Dotinfo $d */
            $data_arr[] = [
                $d->ucastnikObchodniJmeno,
                \App\View\DPUTILS::ico($d->ucastnikIco),
                '<span title="' . str_replace("\"", "", $d->dotaceNazev) . ' - ' . str_replace("\"", "", $d->ucelDotace) . '">' . (empty($d->idDotace) ? 'Neuvedeno' : $d->idDotace) . '</span>',
                \App\View\DPUTILS::currency($d->castkaSchvalena),
                $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
                $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
            ];

            break;
        case 'cedr':

            /** @var \App\Model\Entity\PrijemcePomoci $d */
            $data_arr[] = [
                empty($d->obchodniJmeno) ? $d->prijmeni . ' ' . $d->jmeno : $d->obchodniJmeno,
                \App\View\DPUTILS::ico($d->ico),
                empty($d->Stat->statNazev) ? 'N/A' : $this->Html->link($d->Stat->statNazev, '/detail-statu/' . $d->Stat->statKod3Znaky),
                $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $d->idPrijemce)
            ];
            break;
        case 'czechinvest':

            /** @var \App\Model\Entity\InvesticniPobidky $d */
            $data_arr[] = [
                $d->name,
                \App\View\DPUTILS::ico($d->ico),
                \App\View\DPUTILS::currency($d->investiceCZK * 1000000),
                ($d->rozhodnutiDen == 0 ? 1 : $d->rozhodnutiDen) . "." . $d->rozhodnutiMesic . " " . $d->rozhodnutiRok,
                $this->Html->link('Otevřít', '/investicni-pobidky/detail/' . $d->id)
            ];
            break;
        case 'strukturalniFondy':

            /** @var \App\Model\Entity\StrukturalniFondy $d */
            $data_arr[] = [
                $d->zadatel,
                \App\View\DPUTILS::ico($d->zadatelIco),
                \App\View\DPUTILS::currency($d->verejneZdrojeCelkem),
                $d->cisloProjektu,
                $d->nazevProjektu,
                $this->Html->link('Otevřít', '/strukturalni-fondy-detail-dotace/' . $d->id)
            ];
            break;
        case 'politickeStrany':

            /** @var \App\Model\Entity\Transaction $d */

            $data_arr[] = [
                $d->donor->name,
                $this->Html->link($d->recipient->name, '/dary-politickym-stranam/detail/' . $d->recipient->id),
                $d->year,
                \App\View\DPUTILS::currency($d->amount)
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