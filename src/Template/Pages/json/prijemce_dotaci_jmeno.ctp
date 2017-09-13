<?php

use Cake\Cache\Cache;

/** @var string $ajax_type */
$cache_key = 'prijemce_jmeno_ajax_' . sha1($name) . '_' . $ajax_type;
Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($data as $d) {

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

                if ($d->type_id != 5) {
                    continue;
                }
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