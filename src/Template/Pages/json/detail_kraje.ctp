<?php

use Cake\Cache\Cache;


$cache_key = 'ajax_kraj_dotace_' . sha1($kraj->krajKod);
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($biggest as $b) {

        $b = (object)$b;
        $b->Dotace = (object)$b->Dotace;
        $b->Dotace->PrijemcePomoci = (object)$b->Dotace->PrijemcePomoci;
        $b->RozpoctoveObdobi = (object)$b->RozpoctoveObdobi;

        $data_arr[] = [
            $this->Html->link('[R]', '/detail-rozhodnuti/' . $b->idRozhodnuti),
            $this->Html->link(\App\View\DPUTILS::dotaceNazev($b->Dotace), '/detail-dotace/' . $b->Dotace->idDotace),
            $this->Html->link($b->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $b->Dotace->idPrijemce),
            isset($b->Dotace->PrijemcePomoci->AdresaSidlo['psc']) ? $b->Dotace->PrijemcePomoci->AdresaSidlo['psc'] : '',
            \App\View\DPUTILS::currency($b->castkaRozhodnuta),
            isset($b->RozpoctoveObdobi->castkaSpotrebovana) ? \App\View\DPUTILS::currency($b->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A',
            isset($b->RozpoctoveObdobi->rozpoctoveObdobi) ? $b->RozpoctoveObdobi->rozpoctoveObdobi : 'N/A'
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