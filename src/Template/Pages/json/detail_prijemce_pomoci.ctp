<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\Dotinfo;
use App\Model\Entity\InvesticniPobidky;
use App\Model\Entity\PrijemcePomoci;
use App\Model\Entity\PRV;
use App\Model\Entity\Rozhodnuti;
use App\Model\Entity\StrukturalniFondy;
use App\Model\Entity\StrukturalniFondy2020;
use App\Model\Entity\Transaction;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;
use Cake\Http\Exception\NotFoundException;
use Cake\I18n\Number;


/** @var PrijemcePomoci $prijemce */
/** @var string $ajax_type */

$cache_key = 'detail_prijemce_pomoci_' . sha1($prijemce->idPrijemce) . '_' . $ajax_type;
if (!isset($ajax_type)) throw new NotFoundException();
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    switch ($ajax_type) {
        case "dotinfo":

            /** @var Dotinfo[] $dotinfo */
            foreach ($dotinfo as $d) {
                $data_arr[] = [
                    $d->ucastnikObchodniJmeno,
                    DPUTILS::ico($d->ucastnikIco),
                    '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
                    DPUTILS::currency($d->castkaSchvalena),
                    $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
                    $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
                ];

                $total++;
            }

            break;

        case "czechinvest":

            /** @var InvesticniPobidky[] $investicniPobidky */
            foreach ($investicniPobidky as $i) {
                $data_arr[] = [
                    $i->sektor,
                    $i->druhInvesticniAkce,
                    $i->vytvorenaPracovniMista,
                    DPUTILS::currency($i->investiceCZK * 1000000),
                    Number::toPercentage($i->miraVerejnePodpory * 100),
                    DPUTILS::currency($i->stropVerejnePodpory * 1000000),
                    ($i->rozhodnutiDen == 0 ? "" : $i->rozhodnutiDen . " ") . $i->rozhodnutiMesic . " " . $i->rozhodnutiRok
                ];

                $total++;
            }
            break;
        case "strukturalniFondy":

            /** @var StrukturalniFondy[] $strukturalniFondy */
            foreach ($strukturalniFondy as $f) {

                $data_arr[] = [
                    $f->cisloANazevProgramu,
                    $f->cisloProjektu,
                    $f->nazevProjektu,
                    DPUTILS::currency($f->celkoveZdroje),
                    DPUTILS::currency($f->verejneZdrojeCelkem),
                    DPUTILS::currency($f->euZdroje),
                    DPUTILS::currency($f->vyuctovaneVerejneCelkem),
                    DPUTILS::currency($f->proplaceneEuZdroje),
                    $f->kodNUTS . ' (' . $f->nazevNUTS . ')',
                    $this->Html->link('Detail', '/strukturalni-fondy-detail-dotace/' . $f->id)
                ];

                $total++;
            }
            break;

        case "szif":

            /** @var PRV[] $szif */
            foreach ($szif as $d) {
                $data_arr[] = [
                    $d->jmeno,
                    DPUTILS::ico($d->ico),
                    $d->rok,
                    DPUTILS::currency($d->czk_tuzemske),
                    DPUTILS::currency($d->czk_evropske),
                    DPUTILS::currency($d->czk_celkem),
                    $d->opatreni,
                    $d->zdroj,
                    $d->okres . ', ' . $d->obec,
                    $this->Html->link('Otevřít', '/program-rozvoje-venkova/detail/' . $d->id)
                ];

                $total++;
            }
            break;

        case "strukturalniFondy2020":
            /** @var StrukturalniFondy2020[] $strukturalniFondy2020 */
            foreach ($strukturalniFondy2020 as $f) {
                $data_arr[] = [
                    $f->operacniProgram . ' ' . $f->cisloPrioritniOsy,
                    $f->registracniCisloProjektu,
                    $f->nazevProjektu,
                    DPUTILS::currency($f->celkoveZdroje),
                    DPUTILS::currency($f->schvaleneZdrojeVerejne),
                    DPUTILS::currency($f->schvaleneZdrojeEU),
                    DPUTILS::currency($f->vyuctovaneZdrojeVerejne),
                    DPUTILS::currency($f->vyuctovaneZdrojeSoukrome),
                    DPUTILS::currency($f->vyuctovaneZdrojeEU),
                    DPUTILS::currency($f->vyuctovaneZdroje),
                    $f->kodNUTS . ' (' . $f->nazevNUTS . ')',
                    $this->Html->link('Detail', '/strukturalni-fondy-2014-2020-detail-dotace/' . $f->id)
                ];

                $total++;
            }
            break;
        case "politickeDary":

            /** @var Transaction[] $politickeDary */
            foreach ($politickeDary as $p) {

                $data_arr[] = [
                    $this->Html->link($p->recipient->name, '/dary-politickym-stranam/detail/' . $p->recipient->id),
                    $p->year,
                    DPUTILS::currency($p->amount)
                ];

                $total++;
            }
            break;
        case "dotace":

            /** @var Rozhodnuti[] $dotace */
            foreach ($dotace as $d) {
                $displayDotace = DPUTILS::dotaceNazev($d->Dotace);
                $data_arr[] = [
                    $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]),
                    DPUTILS::currency($d->castkaPozadovana),
                    DPUTILS::currency($d->castkaRozhodnuta),
                    !empty($d->RozpoctoveObdobi) ? DPUTILS::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A',
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