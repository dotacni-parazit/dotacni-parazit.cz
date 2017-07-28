<?php
use Cake\I18n\Number;

$data_arr = [];
$total = 0;

foreach ($dotace as $d) {
    $displayDotace = $d->Dotace->projektNazev;
    if ($d->Dotace->projekKod === $d->Dotace->projektIdnetifikator && !empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
        $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ")";
    } else if (!empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
        $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ", " . $d->Dotace->projektIdnetifikator . ")";
    } else if (!empty($d->Dotace->projektIdnetifikator)) {
        $displayDotace .= "<br/>(" . $d->Dotace->projektIdnetifikator . ")";
    }
    if (strpos($displayDotace, '<br/>') === 0) {
        $displayDotace = substr($displayDotace, 5);
    }

    $prijemcePomoci = $d->Dotace->PrijemcePomoci->obchodniJmeno;
    if (empty($prijemcePomoci)) {
        $prijemcePomoci = $d->Dotace->PrijemcePomoci->jmeno . ' ' . $d->Dotace->PrijemcePomoci->prijmeni . ' (Fyzicka osoba)';
    }

    $data_arr[] = [
        $this->Html->link('[R]', '/detail-rozhodnuti/' . $d->idRozhodnuti),
        $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
        $this->Html->link($prijemcePomoci, '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce),
        $d->rokRozhodnuti,
        Number::currency($d->castkaRozhodnuta),
        Number::currency($d->RozpoctoveObdobi->castkaSpotrebovana),
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
