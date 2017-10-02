<?php

use Cake\Cache\Cache;


$cache_key = 'strukturalni_fondy_detail_' . sha1($data->operacaniProgramKod);
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($fondy as $d) {

        switch($ajax_type){
            case "strukturalniFondy":

                /** @var \App\Model\Entity\StrukturalniFondy $d */
                $data_arr[] = [
                    $this->Html->link('<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>', '/strukturalni-fondy-detail-dotace/' . $d->id, ['escape' => false]),
                    '<span title="' . $d->popisProjektu . '">' . $d->cisloProjektu . '</span>',
                    $d->zadatel . ' (' . \App\View\DPUTILS::ico($d->zadatelIcoNum) . ')',
                    $d->cisloPrioritniOsy,
                    \App\View\DPUTILS::currency($d->celkoveZdroje),
                    \App\View\DPUTILS::currency($d->verejneZdrojeCelkem),
                    \App\View\DPUTILS::currency($d->euZdroje),
                    \App\View\DPUTILS::currency($d->vyuctovaneVerejneCelkem),
                    \App\View\DPUTILS::currency($d->proplaceneEuZdroje),
                    \App\View\DPUTILS::currency($d->certifikovaneVerejneCelkem),
                    \App\View\DPUTILS::currency($d->certifikovaneEUZdoje)
                ];

                break;
            case "strukturalniFondy2020":

                /** @var \App\Model\Entity\StrukturalniFondy2020 $d */

                $data_arr[] = [
                    $this->Html->link('<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>', '/strukturalni-fondy-2014-2020-detail-dotace/' . $d->id, ['escape' => false]),
                    '<span title="' . $d->popisProjektu . '">' . $d->registracniCisloProjektu . '</span>',
                    $d->zadatel . ' (' . \App\View\DPUTILS::ico($d->zadatelIco) . ')',
                    explode(" ", $d->cisloPrioritniOsy)[0],
                    \App\View\DPUTILS::currency($d->celkoveZdroje),
                    \App\View\DPUTILS::currency($d->schvaleneZdrojeVerejne),
                    \App\View\DPUTILS::currency($d->schvaleneZdrojeEU),
                    \App\View\DPUTILS::currency($d->schvaleneZdrojeSoukrome),
                    \App\View\DPUTILS::currency($d->vyuctovaneZdroje),
                    \App\View\DPUTILS::currency($d->vyuctovaneZdrojeVerejne),
                    \App\View\DPUTILS::currency($d->vyuctovaneZdrojeEU),
                    \App\View\DPUTILS::currency($d->vyuctovaneZdrojeSoukrome)
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