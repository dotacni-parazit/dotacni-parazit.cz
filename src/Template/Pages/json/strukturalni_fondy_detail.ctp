<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\StrukturalniFondy;
use App\Model\Entity\StrukturalniFondy2020;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;


$cache_key = 'strukturalni_fondy_detail_' . sha1($data->operacaniProgramKod);
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($fondy as $d) {

        switch ($ajax_type) {
            case "strukturalniFondy":

                /** @var StrukturalniFondy $d */
                $data_arr[] = [
                    $this->Html->link('<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>', '/strukturalni-fondy-detail-dotace/' . $d->id, ['escape' => false]),
                    '<span title="' . $d->popisProjektu . '">' . $d->cisloProjektu . '</span>',
                    $d->zadatel . ' (' . DPUTILS::ico($d->zadatelIcoNum) . ')',
                    $d->cisloPrioritniOsy,
                    DPUTILS::currency($d->celkoveZdroje),
                    DPUTILS::currency($d->verejneZdrojeCelkem),
                    DPUTILS::currency($d->euZdroje),
                    DPUTILS::currency($d->vyuctovaneVerejneCelkem),
                    DPUTILS::currency($d->proplaceneEuZdroje),
                    DPUTILS::currency($d->certifikovaneVerejneCelkem),
                    DPUTILS::currency($d->certifikovaneEUZdoje)
                ];

                break;
            case "strukturalniFondy2020":

                /** @var StrukturalniFondy2020 $d */

                $data_arr[] = [
                    $this->Html->link('<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>', '/strukturalni-fondy-2014-2020-detail-dotace/' . $d->id, ['escape' => false]),
                    '<span title="' . $d->popisProjektu . '">' . $d->registracniCisloProjektu . '</span>',
                    $d->zadatel . ' (' . DPUTILS::ico($d->zadatelIco) . ')',
                    explode(" ", $d->cisloPrioritniOsy)[0],
                    DPUTILS::currency($d->celkoveZdroje),
                    DPUTILS::currency($d->schvaleneZdrojeVerejne),
                    DPUTILS::currency($d->schvaleneZdrojeEU),
                    DPUTILS::currency($d->schvaleneZdrojeSoukrome),
                    DPUTILS::currency($d->vyuctovaneZdroje),
                    DPUTILS::currency($d->vyuctovaneZdrojeVerejne),
                    DPUTILS::currency($d->vyuctovaneZdrojeEU),
                    DPUTILS::currency($d->vyuctovaneZdrojeSoukrome)
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