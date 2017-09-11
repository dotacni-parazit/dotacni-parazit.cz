<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;


/** @var \App\Model\Entity\PrijemcePomoci $prijemce */
/** @var string $ajax_type */

$cache_key = 'detail_prijemce_pomoci' . sha1($prijemce->idPrijemce) . '_' . $ajax_type;
if (!isset($ajax_type)) throw new \Cake\Network\Exception\NotFoundException();
Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    switch ($ajax_type) {
        case "czechinvest":

            /** @var \App\Model\Entity\InvesticniPobidky[] $investicniPobidky */
            foreach ($investicniPobidky as $i) {
                $data_arr[] = [
                    $i->sektor,
                    $i->druhInvesticniAkce,
                    $i->vytvorenaPracovniMista,
                    Number::currency($i->investiceCZK * 1000000),
                    Number::toPercentage($i->miraVerejnePodpory * 100),
                    Number::currency($i->stropVerejnePodpory * 1000000),
                    ($i->rozhodnutiDen == 0 ? "" : $i->rozhodnutiDen . " ") . $i->rozhodnutiMesic . " " . $i->rozhodnutiRok
                ];

                $total++;
            }
            break;
        case "strukturalniFondy":

            /** @var \App\Model\Entity\StrukturalniFondy[] $strukturalniFondy */
            foreach ($strukturalniFondy as $f) {

                $data_arr[] = [
                    $f->cisloANazevProgramu,
                    $f->cisloProjektu,
                    $f->nazevProjektu,
                    Number::currency($f->celkoveZdroje),
                    Number::currency($f->verejneZdrojeCelkem),
                    Number::currency($f->euZdroje),
                    Number::currency($f->vyuctovaneVerejneCelkem),
                    Number::currency($f->proplaceneEuZdroje),
                    $f->kodNUTS . ' (' . $f->nazevNUTS . ')'
                ];

                $total++;
            }
            break;
        case "dotace":

            /** @var \App\Model\Entity\Rozhodnuti[] $dotace */
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
                $data_arr[] = [
                    $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
                    Number::currency($d->castkaPozadovana),
                    Number::currency($d->castkaRozhodnuta),
                    !empty($d->RozpoctoveObdobi) ? Number::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A',
                    $d->rokRozhodnuti,
                    $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev,
                    $d->FinancniZdroj->financniZdrojNazev,
                    $d->Dotace->idPrijemce == $prijemce->idPrijemce ? 'YES' : 'NO'
                ];

                $total++;
            }
            break;
    }

    $out = [
        'draw' => 1,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data_arr
    ];

    Cache::write($cache_key, json_encode($out), 'long_term');
    echo json_encode($out);
} else {
    echo $cache_data;
}