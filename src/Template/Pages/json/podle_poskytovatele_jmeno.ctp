<?php

use Cake\Cache\Cache;

/** @var string $ajax_type */
$cache_key = 'poskytovatel_jmeno_ajax_' . sha1($name) . '_' . $ajax_type;
$cache_data = Cache::read($cache_key, 'long_term');

if (!$cache_data) {

    $data_arr = [];
    $total = 0;

    foreach ($data as $d) {

        switch ($ajax_type) {
            case 'dotacni-urady':

                /** @var \App\Model\Entity\CiselnikDotacePoskytovatelv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $d->dotacePoskytovatelKod),
                    \App\View\DPUTILS::currency($counts[$d->id]['soucet']),
                    \App\View\DPUTILS::currency($counts[$d->id]['soucetSpotrebovano'])
                ];

                break;

            case 'zdroje-financovani':

                /** @var \App\Model\Entity\CiselnikFinancniZdrojv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->financniZdrojNazev, '/podle-zdroje-financi/' . $d->financniZdrojKod),
                    \App\View\DPUTILS::currency($counts[$d->financniZdrojKod]['SUM']),
                    \App\View\DPUTILS::currency($counts[$d->financniZdrojKod]['SUM2'])
                ];

                break;

            case 'dotacni-tituly':

                /** @var \App\Model\Entity\CiselnikDotaceTitulv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->dotaceTitulNazev, '/detail-dotacni-titul/' . $d->dotaceTitulKod),
                    $d->dotaceTitulKod,
                    $this->Html->link($d->statniRozpocetKapitolaKod, '/podle-zdroje-financi/t' . $d->statniRozpocetKapitolaKod)
                ];

                break;

            case 'dotinfo':

                /** @var \App\Model\Entity\Dotinfo $d */
                /** @var array|mixed $sums */

                $data_arr[] = [
                    $this->Html->link($d->poskytovatelNazev, '/dotinfo/poskytovatel/' . $d->poskytovatelIco),
                    $d->poskytovatelIco,
                    \App\View\DPUTILS::currency($sums[$d->poskytovatelIco]['sumSchvaleno']),
                    $sums[$d->poskytovatelIco]['count']
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
