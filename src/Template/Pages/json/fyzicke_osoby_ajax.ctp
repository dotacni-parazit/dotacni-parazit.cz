<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;


$cache_key = 'fyzicke_osoby_ajax';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($osoby as $o) {

        $cache_tag_sum_rozhodnuti = "fyzicke_osoby_sum_rozhodnuti_" . sha1($o->idPrijemce);
        $cache_tag_sum_spotrebovano = "fyzicke_osoby_sum_spotrebovano_" . sha1($o->idPrijemce);

        $data_arr[] = [
            $o->jmeno,
            $o->prijmeni,
            $o->rokNarozeni,
            !empty($o->AdresaBydliste) ? $o->AdresaBydliste->obecNazev : '',
            $o->Stat->statNazev,
            DPUTILS::currency(Cache::read($cache_tag_sum_rozhodnuti, 'long_term') + 0),
            DPUTILS::currency(Cache::read($cache_tag_sum_spotrebovano, 'long_term') + 0),
            $this->Html->link('Otevřít', '/detail-prijemce-pomoci/' . $o->idPrijemce)
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