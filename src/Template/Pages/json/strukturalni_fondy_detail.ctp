<?php

use Cake\Cache\Cache;


$cache_key = 'strukturalni_fondy_detail_' . sha1($data->operacaniProgramKod);
Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($fondy as $d) {

        $data_arr[] = [
            '<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>',
            '<span title="' . $d->popisProjektu . '">' . $d->cisloProjektu . '</span>',
            $d->zadatel . ' (' . \App\View\DPUTILS::ico($d->zadatelIcoNum) . ')',
            \App\View\DPUTILS::currency($d->celkoveZdroje),
            \App\View\DPUTILS::currency($d->verejneZdrojeCelkem),
            \App\View\DPUTILS::currency($d->euZdroje),
            \App\View\DPUTILS::currency($d->vyuctovaneVerejneCelkem),
            \App\View\DPUTILS::currency($d->proplaceneEuZdroje),
            \App\View\DPUTILS::currency($d->certifikovaneVerejneCelkem),
            \App\View\DPUTILS::currency($d->certifikovaneEUZdroje)
        ];
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