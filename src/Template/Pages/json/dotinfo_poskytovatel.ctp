<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\Dotinfo;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;

/** @var string $ajax_type */
/** @var Dotinfo $poskytovatel */
$cache_key = 'dotinfo_poskytovatel_ajax_' . $poskytovatel->poskytovatelIco;
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var Dotinfo[] $data */
    foreach ($data as $d) {

        $data_arr[] = [
            $d->ucastnikObchodniJmeno,
            DPUTILS::ico($d->ucastnikIco),
            '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
            DPUTILS::currency($d->castkaSchvalena),
            $this->Html->link('Otevřít', '/detail-dotinfo/' . $d->id) . '<br/>' .
            $this->Html->link('Otevřít DotInfo.cz', 'https://www.dotinfo.cz/dotace/' . $d->dotinfoId)
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