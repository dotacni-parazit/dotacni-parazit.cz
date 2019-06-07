<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\MFCRPAP;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Cache\Cache;


$cache_key = 'ajax_ico_dotace_distance';
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    /** @var MFCRPAP[] $data */
    foreach ($data as $d) {
        /** @var MFCRPAP $d */
        $data_arr[] = [
            $this->Html->link(DPUTILS::jmenoPrijemcePomoci($d->PrijemcePomoci), '/detail-prijemce-pomoci/' . $d->idPrijemce),
            $d->start->nice(),
            !empty($d->end) ? $d->end->nice() : 'N/A',
            empty($d->PrvniDotace) ? 'N/A' : $this->Html->link($d->PrvniDotace->podpisDatum->nice(), '/detail-dotace/' . $d->distance_start_dotace),
            empty($d->PosledniDotace) ? 'N/A' : $this->Html->link($d->PosledniDotace->podpisDatum->nice(), '/detail-dotace/' . $d->distance_end_dotace),
            $d->distance_start_days,
            $d->distance_end_days * -1
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