<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;


$cache_key = 'strukturalni_fondy_detail_' . sha1($data->operacaniProgramKod);
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($fondy as $d) {

        $data_arr[] = [
            '<span title="' . $d->popisProjektu . '">' . $d->nazevProjektu . '</span>',
            '<span title="' . $d->popisProjektu . '">' . $d->cisloProjektu . '</span>',
            $d->zadatel . ' (IČ: ' . $d->zadatelIco . ')',
            Number::currency($d->celkoveZdroje),
            Number::currency($d->verejneZdrojeCelkem),
            Number::currency($d->euZdroje),
            Number::currency($d->vyuctovaneVerejneCelkem),
            Number::currency($d->proplaceneEuZdroje),
            Number::currency($d->certifikovaneVerejneCelkem),
            Number::currency($d->certifikovaneEUZdroje)
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