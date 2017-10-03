<?php

$data_arr = [];
$total = 0;

if(empty($data)) $data = [];

foreach ($data as $d) {

    /** @var string $ajax_type */
    switch ($ajax_type) {
        case 'konsolidace':

            /** @var \App\Model\Entity\Company $d */

            $link = "";
            switch ($d->type_id) {
                case 1:
                    $link = "/konsolidace-holdingy/detail/" . $d->id;
                    break;
                case 2:
                    $link = "/konsolidace-holdingy/detail-spolecnost/" . $d->id;
                    break;
                case 3:
                    $link = "/dary-politickym-stranam/detail/" . $d->id;
                    break;
                case 4:
                    $link = "/konsolidace-holdingy/detail-vlastnik/" . $d->id;
                    break;
                case 5:
                    $link = "/dary-politickym-stranam/detail-darce/" . $d->id;
                    break;
                case 6:
                    $link = "/dary-politickym-stranam/detail-auditor/" . $d->id;
                    break;
            }

            $data_arr[] = [
                $d->name,
                \App\View\DPUTILS::ico($d->ico),
                $d->type->label,
                $this->Html->link('Otevřít', $link)
            ];

            break;
        case 'dotinfo':

            /** @var \App\Model\Entity\Dotinfo $d */
            $data_arr[] = [
                $d->ucastnikObchodniJmeno,
                \App\View\DPUTILS::ico($d->ucastnikIco),
                '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
                \App\View\DPUTILS::currency($d->castkaSchvalena),
                $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
                $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
            ];

            break;
        case 'cedr':

            /** @var \App\Model\Entity\PrijemcePomoci $d */
            $data_arr[] = [
                \App\View\DPUTILS::jmenoPrijemcePomoci($d),
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
                \App\View\DPUTILS::ico($d->zadatelIcoNum),
                \App\View\DPUTILS::currency($d->verejneZdrojeCelkem),
                $d->cisloProjektu,
                $d->nazevProjektu,
                $this->Html->link('Otevřít', '/strukturalni-fondy-detail-dotace/' . $d->id)
            ];
            break;
        case 'politickeStrany':

            /** @var \App\Model\Entity\Transaction $d */

            $data_arr[] = [
                $this->Html->link($d->donor->name, "/dary-politickym-stranam/detail-darce/" . $d->donor->id),
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