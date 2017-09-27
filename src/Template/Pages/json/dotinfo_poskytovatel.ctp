<?php

use Cake\Cache\Cache;

/** @var string $ajax_type */
/** @var \App\Model\Entity\Dotinfo $poskytovatel */
$cache_key = 'dotinfo_poskytovatel_ajax_' . $poskytovatel->poskytovatelIco;
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var \App\Model\Entity\Dotinfo[] $data */
    foreach ($data as $d) {

        $data_arr[] = [
            $d->ucastnikObchodniJmeno,
            \App\View\DPUTILS::ico($d->ucastnikIco),
            '<span title="' . $d->ucelDotace . '">' . (empty($d->dotaceNazev) ? 'Neuvedeno' : $d->dotaceNazev) . '</span>',
            \App\View\DPUTILS::currency($d->castkaSchvalena),
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