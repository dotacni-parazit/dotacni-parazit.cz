<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\GrantyPrahaZadatel;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;


$cache_key = 'ajax_granty_praha_projekty_oblast_' . $id_oblast;
//Cache::delete($cache_key, 'long_term');
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var GrantyPrahaZadatel[] $prijemce */
    foreach ($prijemce as $p) {
        $projekt = $p->Projekt;
        if (empty($projekt)) continue;

        $data_arr[] = [
            $this->Html->link($p->nazev, '/granty-praha/prijemce/' . $p->id_zadatel),
            $this->Html->link($projekt->cislo_projektu, '/granty-praha/projekt/' . $projekt->id_projekt),
            '<span title="' . $projekt->popis . '">' . $projekt->nazev_projektu . '</span>',
            $projekt->rok_od,
            $projekt->rok_do,
            DPUTILS::currency($projekt->castka_naklady),
            DPUTILS::currency($projekt->castka_pozadovana),
            DPUTILS::currency($projekt->castka_pridelena),
            DPUTILS::currency($projekt->castka_vycerpana),
            $projekt->stav,
            $projekt->nazev_programu,
            $projekt->nazev_oblasti,
            $projekt->ucel_dotace
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