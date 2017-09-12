<?php


//$cache_key = 'ajax_stat_dotace_' . sha1($stat->statKod3Znaky);
//$cache_data = Cache::read($cache_key, 'long_term');

//if (!$cache_data) {

use Cake\I18n\Number;

$data_arr = [];
$total = 0;


/** @var \App\Model\Entity\InvesticniPobidky[] $pobidky */
foreach ($pobidky as $p) {

    $data_arr[] = [
        $this->Html->link($p->name, ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno', 'name' => $p->name]),
        $this->Html->link($p->ico, ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $p->ico]),
        $p->sektor,
        $p->druhInvesticniAkce,
        $p->zemePuvodu,
        \App\View\DPUTILS::currency($p->investiceCZK * 1000000, 'CZK'),
        $p->vytvorenaPracovniMista,
        Number::toPercentage($p->miraVerejnePodpory * 100),
        $p->okres . ", " . $p->kraj,
        ($p->rozhodnutiDen == 0 ? 1 : $p->rozhodnutiDen) . "." . $p->rozhodnutiMesic . " " . $p->rozhodnutiRok,
        $p->zruseniRozhodnutiNeboOdstoupeni == "x" ? "Nerealizováno" : "OK",
        $this->Html->link('Otevřít', '/investicni-pobidky/detail/' . $p->id)
    ];

    $total++;
}

$out = [
    'draw' => 1,
    'recordsTotal' => $total,
    'recordsFiltered' => $total,
    'data' => $data_arr
];

//Cache::write($cache_key, json_encode($out), 'long_term');
echo json_encode($out);
//} else {
//    echo $cache_data;
//}