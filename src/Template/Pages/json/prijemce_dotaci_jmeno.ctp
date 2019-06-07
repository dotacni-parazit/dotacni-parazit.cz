<?php
/**
 * @var AppView $this
 */

use App\Controller\PragueController;
use App\Model\Entity\Company;
use App\Model\Entity\Dotinfo;
use App\Model\Entity\GrantyPrahaZadatel;
use App\Model\Entity\InvesticniPobidky;
use App\Model\Entity\PrijemcePomoci;
use App\Model\Entity\PRV;
use App\Model\Entity\StrukturalniFondy;
use App\Model\Entity\StrukturalniFondy2020;
use App\Model\Entity\Transaction;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;

/** @var string $ajax_type */
$cache_key = 'prijemce_jmeno_ajax_' . sha1($name) . '_' . $ajax_type;
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    if (empty($data)) $data = [];
    foreach ($data as $d) {

        switch ($ajax_type) {
            case 'konsolidace':

                /** @var Company $d */

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
                    DPUTILS::ico($d->ico),
                    $d->type->label,
                    $this->Html->link('Otevřít', $link)
                ];

                break;
            case 'grantyPraha':

                /** @var GrantyPrahaZadatel $d */
                $data_arr[] = [
                    $this->Html->link($d->nazev, '/granty-praha/prijemce/' . $d->id_zadatel),
                    DPUTILS::currency(PragueController::getSoucetPridelenoProIdZadatel($d->id_zadatel)),
                    DPUTILS::currency(PragueController::getSoucetVycerpanoProIdZadatel($d->id_zadatel)),
                    PragueController::getPocetProjektuProIdZadatel($d->id_zadatel)
                ];

                break;
            case 'dotinfo':

                /** @var Dotinfo $d */
                $data_arr[] = [
                    $d->ucastnikObchodniJmeno,
                    DPUTILS::ico($d->ucastnikIco),
                    '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
                    DPUTILS::currency($d->castkaSchvalena),
                    $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
                    $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
                ];

                break;

            case 'szif':

                /** @var PRV $d */
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

                break;
            case 'cedr':

                /** @var PrijemcePomoci $d */
                $data_arr[] = [
                    DPUTILS::jmenoPrijemcePomoci($d),
                    DPUTILS::ico($d->ico),
                    empty($d->Stat->statNazev) ? 'N/A' : $this->Html->link($d->Stat->statNazev, '/detail-statu/' . $d->Stat->statKod3Znaky),
                    $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $d->idPrijemce)
                ];
                break;
            case 'czechinvest':

                /** @var InvesticniPobidky $d */
                $data_arr[] = [
                    $d->name,
                    DPUTILS::ico($d->ico),
                    DPUTILS::currency($d->investiceCZK * 1000000),
                    ($d->rozhodnutiDen == 0 ? 1 : $d->rozhodnutiDen) . "." . $d->rozhodnutiMesic . " " . $d->rozhodnutiRok,
                    $this->Html->link('Otevřít', '/investicni-pobidky/detail/' . $d->id)
                ];
                break;
            case 'strukturalniFondy':

                /** @var StrukturalniFondy $d */
                $data_arr[] = [
                    $d->zadatel,
                    DPUTILS::ico($d->zadatelIcoNum),
                    DPUTILS::currency($d->verejneZdrojeCelkem),
                    $d->cisloProjektu,
                    $d->nazevProjektu,
                    $this->Html->link('Otevřít', '/strukturalni-fondy-detail-dotace/' . $d->id)
                ];
                break;
            case 'strukturalniFondy2020':

                /** @var StrukturalniFondy2020 $d */
                $data_arr[] = [
                    $d->zadatel,
                    DPUTILS::ico($d->zadatelIco),
                    DPUTILS::currency($d->schvaleneZdrojeVerejne),
                    $d->registracniCisloProjektu,
                    $d->nazevProjektu,
                    $this->Html->link('Otevřít', '/strukturalni-fondy-2014-2020-detail-dotace/' . $d->id)
                ];
                break;
            case 'politickeStrany':

                /** @var Transaction $d */

                $data_arr[] = [
                    $this->Html->link($d->donor->name, "/dary-politickym-stranam/detail-darce/" . $d->donor->id),
                    $this->Html->link($d->recipient->name, '/dary-politickym-stranam/detail/' . $d->recipient->id),
                    $d->year,
                    DPUTILS::currency($d->amount)
                ];

                break;
        }

        $total++;
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