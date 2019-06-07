<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\CiselnikDotacePoskytovatelv01;
use App\Model\Entity\CiselnikDotaceTitulv01;
use App\Model\Entity\CiselnikFinancniZdrojv01;
use App\Model\Entity\Dotinfo;
use App\View\AppView;
use App\View\DPUTILS;
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

                /** @var CiselnikDotacePoskytovatelv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $d->dotacePoskytovatelKod),
                    DPUTILS::currency($counts[$d->id]['soucet']),
                    DPUTILS::currency($counts[$d->id]['soucetSpotrebovano'])
                ];

                break;

            case 'zdroje-financovani':

                /** @var CiselnikFinancniZdrojv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->financniZdrojNazev, '/podle-zdroje-financi/' . $d->financniZdrojKod),
                    DPUTILS::currency($counts[$d->financniZdrojKod]['SUM']),
                    DPUTILS::currency($counts[$d->financniZdrojKod]['SUM2'])
                ];

                break;

            case 'dotacni-tituly':

                /** @var CiselnikDotaceTitulv01 $d */

                $data_arr[] = [
                    $this->Html->link($d->dotaceTitulNazev, '/detail-dotacni-titul/' . $d->dotaceTitulKod),
                    $d->dotaceTitulKod,
                    $this->Html->link($d->statniRozpocetKapitolaKod, '/podle-zdroje-financi/t' . $d->statniRozpocetKapitolaKod)
                ];

                break;

            case 'dotinfo':

                /** @var Dotinfo $d */
                /** @var array|mixed $sums */

                $data_arr[] = [
                    $this->Html->link($d->poskytovatelNazev, '/dotinfo/poskytovatel/' . $d->poskytovatelIco),
                    $d->poskytovatelIco,
                    DPUTILS::currency($sums[$d->poskytovatelIco]['sumSchvaleno']),
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
