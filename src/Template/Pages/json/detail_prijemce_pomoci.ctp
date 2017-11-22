<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;


/** @var \App\Model\Entity\PrijemcePomoci $prijemce */
/** @var string $ajax_type */

$cache_key = 'detail_prijemce_pomoci_' . sha1($prijemce->idPrijemce) . '_' . $ajax_type;
if (!isset($ajax_type)) throw new \Cake\Network\Exception\NotFoundException();
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    switch ($ajax_type) {
        case "dotinfo":

            /** @var \App\Model\Entity\Dotinfo[] $dotinfo */
            foreach ($dotinfo as $d) {
                $data_arr[] = [
                    $d->ucastnikObchodniJmeno,
                    \App\View\DPUTILS::ico($d->ucastnikIco),
                    '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
                    \App\View\DPUTILS::currency($d->castkaSchvalena),
                    $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
                    $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
                ];

                $total++;
            }

            break;

        case "czechinvest":

            /** @var \App\Model\Entity\InvesticniPobidky[] $investicniPobidky */
            foreach ($investicniPobidky as $i) {
                $data_arr[] = [
                    $i->sektor,
                    $i->druhInvesticniAkce,
                    $i->vytvorenaPracovniMista,
                    \App\View\DPUTILS::currency($i->investiceCZK * 1000000),
                    Number::toPercentage($i->miraVerejnePodpory * 100),
                    \App\View\DPUTILS::currency($i->stropVerejnePodpory * 1000000),
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
                    \App\View\DPUTILS::currency($f->celkoveZdroje),
                    \App\View\DPUTILS::currency($f->verejneZdrojeCelkem),
                    \App\View\DPUTILS::currency($f->euZdroje),
                    \App\View\DPUTILS::currency($f->vyuctovaneVerejneCelkem),
                    \App\View\DPUTILS::currency($f->proplaceneEuZdroje),
                    $f->kodNUTS . ' (' . $f->nazevNUTS . ')',
                    $this->Html->link('Detail', '/strukturalni-fondy-detail-dotace/' . $f->id)
                ];

                $total++;
            }
            break;
        case "politickeDary":

            /** @var \App\Model\Entity\Transaction[] $politickeDary */
            foreach ($politickeDary as $p) {

                $data_arr[] = [
                    $this->Html->link($p->recipient->name, '/dary-politickym-stranam/detail/' . $p->recipient->id),
                    $p->year,
                    \App\View\DPUTILS::currency($p->amount)
                ];

                $total++;
            }
            break;
        case "dotace":

            /** @var \App\Model\Entity\Rozhodnuti[] $dotace */
            foreach ($dotace as $d) {
                $displayDotace = \App\View\DPUTILS::dotaceNazev($d->Dotace);
                $data_arr[] = [
                    $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
                    \App\View\DPUTILS::currency($d->castkaPozadovana),
                    \App\View\DPUTILS::currency($d->castkaRozhodnuta),
                    !empty($d->RozpoctoveObdobi) ? \App\View\DPUTILS::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A',
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