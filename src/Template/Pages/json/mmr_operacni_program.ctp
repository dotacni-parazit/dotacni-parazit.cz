<?php

use Cake\Cache\Cache;


$cache_key = 'mmr_operacni_program_dotace_' . sha1($data->id);
Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($dotace as $d) {
        $data_arr[] = [
            $this->Html->link($d->projektNazev, '/detail-dotace/' . $d->idDotace),
            $this->Html->link($d->projektKod, '/detail-dotace/' . $d->idDotace),
            $this->Html->link($d->projektIdnetifikator, '/detail-dotace/' . $d->idDotace),
            $this->Html->link($d->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $d->PrijemcePomoci->idPrijemce)
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