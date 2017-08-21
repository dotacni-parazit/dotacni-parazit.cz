<?php
/**
 * Created by PhpStorm.
 * User: smarek
 * Date: 6/4/17
 * Time: 9:10 PM
 */

namespace App\Controller;

use App\Controller\Component\CachingComponent;
use App\Model\Table\CiselnikCedrOpatreniv01Table;
use App\Model\Table\CiselnikCedrOperacniProgramv01Table;
use App\Model\Table\CiselnikCedrPodOpatreniv01Table;
use App\Model\Table\CiselnikDotacePoskytovatelv01Table;
use App\Model\Table\CiselnikDotaceTitulv01Table;
use App\Model\Table\CiselnikFinancniZdrojv01Table;
use App\Model\Table\CiselnikKrajv01Table;
use App\Model\Table\CiselnikMmrOpatreniv01Table;
use App\Model\Table\CiselnikMmrOperacniProgramv01Table;
use App\Model\Table\CiselnikMmrPodOpatreniv01Table;
use App\Model\Table\CiselnikMmrPrioritav01Table;
use App\Model\Table\CiselnikObecv01Table;
use App\Model\Table\CiselnikOkresv01Table;
use App\Model\Table\CiselnikPravniFormav01Table;
use App\Model\Table\CiselnikStatniRozpocetKapitolav01Table;
use App\Model\Table\CiselnikStatniRozpocetUkazatelv01Table;
use App\Model\Table\CiselnikStatv01Table;
use App\Model\Table\DotaceTable;
use App\Model\Table\PrijemcePomociTable;
use App\Model\Table\RozhodnutiTable;
use App\Model\Table\RozpoctoveObdobiTable;
use App\Model\Table\StrukturalniFondyTable;
use Cake\Cache\Cache;
use Cake\Database\Query;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


/**
 * @property CiselnikStatniRozpocetUkazatelv01Table CiselnikStatniRozpocetUkazatelv01
 * @property CiselnikMmrOperacniProgramv01Table CiselnikMmrOperacniProgramv01
 * @property CiselnikCedrOperacniProgramv01Table CiselnikCedrOperacniProgramv01
 * @property CiselnikFinancniZdrojv01Table CiselnikFinancniZdrojv01
 * @property CiselnikPravniFormav01Table CiselnikPravniFormav01
 * @property CiselnikStatniRozpocetKapitolav01Table CiselnikStatniRozpocetKapitolav01
 * @property RozpoctoveObdobiTable RozpoctoveObdobi
 * @property CiselnikDotaceTitulv01Table CiselnikDotaceTitulv01
 * @property CiselnikDotacePoskytovatelv01Table CiselnikDotacePoskytovatelv01
 * @property CiselnikMmrPodOpatreniv01Table CiselnikMmrPodOpatreniv01
 * @property CiselnikMmrPrioritav01Table CiselnikMmrPrioritav01
 * @property CiselnikMmrOpatreniv01Table CiselnikMmrOpatreniv01
 * @property CiselnikObecv01Table CiselnikObecv01
 * @property CiselnikOkresv01Table CiselnikOkresv01
 * @property CiselnikKrajv01Table CiselnikKrajv01
 * @property CiselnikCedrOpatreniv01Table CiselnikCedrOpatreniv01
 * @property CiselnikCedrPodOpatreniv01Table CiselnikCedrPodOpatreniv01
 * @property RozhodnutiTable Rozhodnuti
 * @property CiselnikStatv01Table CiselnikStatv01
 * @property PrijemcePomociTable PrijemcePomoci
 * @property DotaceTable Dotace
 * @property CachingComponent Caching;
 * @property StrukturalniFondyTable StrukturalniFondy
 */
class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Rozhodnuti');
        $this->loadModel('Dotace');
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('AdresaSidlo');
        $this->loadModel('AdresaBydliste');
        $this->loadModel('RozpoctoveObdobi');
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('CiselnikCedrOperacniProgramv01');
        $this->loadModel('CiselnikFinancniZdrojv01');
        $this->loadModel('CiselnikPravniFormav01');
        $this->loadModel('CiselnikStatniRozpocetKapitolav01');
        $this->loadModel('CiselnikStatniRozpocetUkazatelv01');
        $this->loadModel('CiselnikDotaceTitulv01');
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('CiselnikKrajv01');
        $this->loadModel('CiselnikObecv01');
        $this->loadModel('CiselnikOkresv01');
        $this->loadModel('CiselnikStatv01');
        $this->loadModel('CiselnikMmrPodOpatreniv01');
        $this->loadModel('CiselnikMmrOpatreniv01');
        $this->loadModel('CiselnikMmrPrioritav01');
        $this->loadModel('CiselnikMmrOperacniProgramv01');
        $this->loadModel('CiselnikCedrOperacniProgramv01');
        $this->loadModel('CiselnikCedrPodprogramv01');
        $this->loadModel('CiselnikCedrPrioritav01');
        $this->loadModel('CiselnikCedrOpatreniv01');
        $this->loadModel('CiselnikCedrPodOpatreniv01');
        $this->loadModel('CiselnikCedrGrantoveSchemav01');
        $this->loadModel('StrukturalniFondy');
        $this->loadComponent('Caching');
    }

    public function index()
    {
    }

    public function cache()
    {
        $this->Caching->cacheAll();
        $this->cedrOperacniProgramy();
        $this->mmrOperacniProgramy();
        $this->detailKrajeCache();
        $this->detailObceCache();
        $this->detailOkresyCache();
        $this->detailStatuCache();
        $this->podlePoskytovatelu();
        $this->podlePrijemcu();
        $this->strukturalniFondy();
        $this->podleSidlaPrijemce();
        $this->podleZdrojeFinanci();
        $this->statistics();
        $this->dotacniTituly();
        $this->fyzickeOsoby();
    }

    public function cedrOperacniProgramy()
    {
        $cedr = $this->CiselnikCedrOperacniProgramv01->find('all');
        $counts = $this->Caching->initCacheCEDROP($cedr);

        $this->set(compact('cedr', 'counts'));
    }

    public function mmrOperacniProgramy()
    {
        $mmr = $this->CiselnikMmrOperacniProgramv01->find('all');
        $counts = $this->Caching->initCacheMMROP($mmr);

        $this->set(compact(['mmr', 'counts']));
    }

    public function detailKrajeCache()
    {
        $kraje = $this->CiselnikKrajv01->find('all', [
            'fields' => [
                'krajKod' => 'DISTINCT(krajKod)'
            ]
        ])->enableHydration(false)->toArray();

        foreach ($kraje as $kraj) {

            $cache_tag_kraj_top_100 = 'detail_kraje_top_100_' . sha1($kraj['krajKod']);
            $biggest = Cache::read($cache_tag_kraj_top_100, 'long_term');

            if ($biggest === false) {
                $biggest = $this->Rozhodnuti->find('all', [
                    'order' => [
                        'castkaRozhodnuta' => 'DESC'
                    ],
                    'fields' => [
                        'RozpoctoveObdobi.rozpoctoveObdobi',
                        'RozpoctoveObdobi.castkaSpotrebovana',
                        'Rozhodnuti.castkaRozhodnuta',
                        'Rozhodnuti.idRozhodnuti',
                        'Dotace.idDotace',
                        'Dotace.idPrijemce',
                        'Dotace.projektNazev',
                        'Dotace.projektIdnetifikator',
                        'PrijemcePomoci.obchodniJmeno'
                    ],
                    'conditions' => [
                        'CiselnikOkresv01.krajNadKod' => $kraj['krajKod'],
                        'refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'RozpoctoveObdobi',
                        'Dotace',
                        'Dotace.PrijemcePomoci',
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01.CiselnikOkresv01'
                    ],
                    'group' => [
                        'Rozhodnuti.idRozhodnuti'
                    ]
                ])->limit(20000)->enableHydration(false)->toArray();
                Cache::write($cache_tag_kraj_top_100, $biggest, 'long_term');
            }
            debug($kraj);
            debug(count($biggest));
        }
    }

    public function detailObceCache()
    {
        $obce = $this->CiselnikObecv01->find('all', [
            'fields' => [
                'obecKod' => 'DISTINCT(obecKod)'
            ]
        ])->enableHydration(false)->toArray();

        foreach ($obce as $obec) {
            debug($obec);

            $cache_tag_obec_top_100 = 'detail_obce_top_100_' . sha1($obec['obecKod']);
            $biggest = Cache::read($cache_tag_obec_top_100, 'long_term');

            if ($biggest === false) {
                $biggest = $this->Rozhodnuti->find('all', [
                    'order' => [
                        'castkaRozhodnuta' => 'DESC'
                    ],
                    'fields' => [
                        'RozpoctoveObdobi.rozpoctoveObdobi',
                        'RozpoctoveObdobi.castkaSpotrebovana',
                        'Rozhodnuti.castkaRozhodnuta',
                        'Rozhodnuti.idRozhodnuti',
                        'Dotace.idDotace',
                        'Dotace.idPrijemce',
                        'Dotace.projektNazev',
                        'Dotace.projektIdnetifikator',
                        'PrijemcePomoci.obchodniJmeno'
                    ],
                    'conditions' => [
                        'CiselnikObecv01.obecKod' => $obec['obecKod'],
                        'refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'RozpoctoveObdobi',
                        'Dotace',
                        'Dotace.PrijemcePomoci',
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01'
                    ],
                    'group' => [
                        'Rozhodnuti.idRozhodnuti'
                    ]
                ])->limit(20000)->enableHydration(false)->toArray();
                Cache::write($cache_tag_obec_top_100, $biggest, 'long_term');
            }
            debug(count($biggest));
        }
    }

    public function detailOkresyCache()
    {
        $okresy = $this->CiselnikOkresv01->find('all', [
            'fields' => [
                'okresKod' => 'DISTINCT(okresKod)'
            ]
        ])->enableHydration(false)->toArray();

        foreach ($okresy as $okres) {
            debug($okres);

            $cache_tag_okres_top_100 = 'detail_okresu_top_100_' . sha1($okres['okresKod']);
            $biggest = Cache::read($cache_tag_okres_top_100, 'long_term');

            if ($biggest === false) {
                $biggest = $this->Rozhodnuti->find('all', [
                    'order' => [
                        'castkaRozhodnuta' => 'DESC'
                    ],
                    'fields' => [
                        'RozpoctoveObdobi.rozpoctoveObdobi',
                        'RozpoctoveObdobi.castkaSpotrebovana',
                        'Rozhodnuti.castkaRozhodnuta',
                        'Rozhodnuti.idRozhodnuti',
                        'Dotace.idDotace',
                        'Dotace.idPrijemce',
                        'Dotace.projektNazev',
                        'Dotace.projektIdnetifikator',
                        'PrijemcePomoci.obchodniJmeno'
                    ],
                    'conditions' => [
                        'CiselnikObecv01.okresNadKod' => $okres['okresKod'],
                        'refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'RozpoctoveObdobi',
                        'Dotace',
                        'Dotace.PrijemcePomoci',
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01'
                    ],
                    'group' => [
                        'Rozhodnuti.idRozhodnuti'
                    ]
                ])->limit(20000)->enableHydration(false)->toArray();
                Cache::write($cache_tag_okres_top_100, $biggest, 'long_term');
            }
            debug(count($biggest));
        }
    }

    public function detailStatuCache()
    {
        $staty = $this->CiselnikStatv01->find('all', [
            'fields' => [
                'statKod3Znaky' => 'DISTINCT(statKod3Znaky)'
            ]
        ])->enableHydration(false)->toArray();

        foreach ($staty as $stat) {
            debug($stat);

            $cache_tag_statu_top_100 = 'detail_statu_top_100_' . sha1($stat['statKod3Znaky']);
            $biggest = Cache::read($cache_tag_statu_top_100, 'long_term');

            if ($biggest === false) {
                $biggest = $this->Rozhodnuti->find('all', [
                    'order' => [
                        'castkaRozhodnuta' => 'DESC'
                    ],
                    'fields' => [
                        'RozpoctoveObdobi.rozpoctoveObdobi',
                        'RozpoctoveObdobi.castkaSpotrebovana',
                        'Rozhodnuti.castkaRozhodnuta',
                        'Rozhodnuti.idRozhodnuti',
                        'Dotace.idDotace',
                        'Dotace.idPrijemce',
                        'Dotace.projektNazev',
                        'Dotace.projektIdnetifikator',
                        'PrijemcePomoci.obchodniJmeno'
                    ],
                    'conditions' => [
                        'PrijemcePomoci.iriStat LIKE' => 'http://cedropendata.mfcr.cz/c3lod/csu/resource/ciselnik/Stat/v01/' . $stat['statKod3Znaky'] . '%'
                    ],
                    'contain' => [
                        'RozpoctoveObdobi',
                        'Dotace',
                        'Dotace.PrijemcePomoci'
                    ],
                    'group' => [
                        'Rozhodnuti.idRozhodnuti'
                    ]
                ])->limit(100)->enableHydration(false)->toArray();
                Cache::write($cache_tag_statu_top_100, $biggest, 'long_term');
            }
            debug(count($biggest));
        }
    }

    public function podlePoskytovatelu()
    {

        $this->set('title', 'Poskytovatelé Dotací');

        $data = $this->CiselnikDotacePoskytovatelv01->find('all');
        $counts = $this->Caching->initCachePodlePoskytovatelu($data);

        $this->set(compact(['data', 'counts']));
    }

    public function podlePrijemcu()
    {

        $ico = $this->request->getQuery('ico');
        $ico = filter_var($ico, FILTER_SANITIZE_NUMBER_INT);
        $name = $this->request->getQuery('name');
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $multiple = $this->request->getQuery('multiple');
        $multiple = filter_var($multiple, FILTER_SANITIZE_STRING);
        $pravni_forma = $this->request->getQuery('pravniforma');
        $pravni_forma = filter_var($pravni_forma, FILTER_SANITIZE_NUMBER_INT);
        $multi_prijemci = null;

        if (!empty($multiple)) {
            foreach (explode(",", str_replace(" ", ",", $multiple)) as $multi_ico) {
                if (!filter_var($multi_ico, FILTER_SANITIZE_NUMBER_INT)) continue;
                $multi_prijemci .= $multi_ico . ",";
            }
            $multi_prijemci = substr($multi_prijemci, 0, -1);
        }

        if ($ico != null) {
            $prijemci = $this->PrijemcePomoci->find('all', [
                'fields' => [
                    'idPrijemce',
                    'obchodniJmeno',
                    'jmeno',
                    'prijmeni',
                    'ico'
                ],
                'conditions' => [
                    'ico' => $ico
                ]
            ])->limit(10000);
            if ($ico != 0 && count($prijemci->toArray()) == 1) {
                $this->redirect('/detail-prijemce-pomoci/' . $prijemci->first()->idPrijemce);
            }
            $this->set(compact('prijemci'));
        } else if (!empty($name)) {
            $prijemci = $this->PrijemcePomoci->find('all', [
                'fields' => [
                    'idPrijemce',
                    'obchodniJmeno',
                    'ico',
                    'jmeno',
                    'prijmeni'
                ],
                'conditions' => [
                    "MATCH (obchodniJmeno, jmeno, prijmeni) AGAINST (:against IN BOOLEAN MODE)"
                ]
            ])->bind(':against', h($name))->limit(10000);
            $this->set(compact('prijemci'));
        } else if (!empty($multi_prijemci)) {
            $this->redirect('/podle-prijemcu/multiple/' . $multi_prijemci);
        } else if (!empty($pravni_forma)) {
            $pf = $this->CiselnikPravniFormav01->find('all', [
                'conditions' => [
                    'pravniFormaKod' => $pravni_forma
                ]
            ])->first();
            $prijemci = $this->PrijemcePomoci->find('all', [
                'fields' => [
                    'idPrijemce',
                    'obchodniJmeno',
                    'ico',
                    'jmeno',
                    'prijmeni'
                ],
                'conditions' => [
                    'iriPravniForma' => $pf->id
                ]
            ]);
            $this->set(compact('prijemci'));
        } else {
            $zvlastni_ico = $this->PrijemcePomoci->find('all', [
                'conditions' => [
                    'AND' => [
                        'ico > 0',
                        'ico < 10000'
                    ]
                ],
                'fields' => ['ico', 'idPrijemce', 'obchodniJmeno'],
                'group' => 'ico'
            ]);
            $this->set(compact(['zvlastni_ico']));
        }

        $pravni_formy = $this->CiselnikPravniFormav01->find('list', [
            'fields' => [
                'id' => 'pravniFormaKod',
                'pravniFormaNazev'
            ]
        ]);

        $this->set(compact(['ico', 'name', 'multiple', 'pravni_formy']));
    }

    public function strukturalniFondy()
    {
        $ops = $this->StrukturalniFondy->find('all', [
            'fields' => [
                'OP' => 'cisloANazevProgramu',
                'CNT' => 'COUNT(*)'
            ],
            'group' => [
                'cisloANazevProgramu'
            ]
        ])->hydrate(false)->toArray();
        $this->set(compact(['ops']));
    }

    public function podleSidlaPrijemce()
    {

        $kraje = $this->CiselnikKrajv01->find('all', [
            'fields' => [
                'krajNazev' => 'DISTINCT(krajNazev)'
            ],
            'order' => [
                'krajKod' => 'ASC'
            ]
        ]);

        $kraje_ids = $this->CiselnikKrajv01->find('all', [
            'fields' => [
                'krajKod' => 'DISTINCT(CiselnikKrajv01.krajKod)'
            ],
            'order' => [
                'krajKod' => 'ASC'
            ]
        ]);

        $okresy = $this->CiselnikOkresv01->find('all', [
            'group' => [
                'okresKod'
            ]
        ]);
        $obce = $this->CiselnikObecv01->find('all', [
            'group' => 'obecKod'
        ]);

        $staty = $this->CiselnikStatv01->find('all', [
            'fields' => [
                'CiselnikStatv01.statNazev',
                'CiselnikStatv01.id',
                'CiselnikStatv01.statKod3Znaky'
            ]
        ]);

        $soucet_staty = [];
        $soucet_staty_spotrebovano = [];
        $kraje_data = [];
        $okresy_soucet = [];
        $obce_soucet = [];

        foreach ($staty as $stat) {
            // soucet rozhodnutych
            $cache_tag = "soucet_stat_" . $stat->statKod3Znaky;
            $soucet = Cache::read($cache_tag, 'long_term');
            if ($soucet === false) {
                $sum = $this->Rozhodnuti->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaRozhodnuta)'
                        ],
                        'conditions' => [
                            'PrijemcePomoci.iriStat' => $stat->id,
                            'refundaceIndikator' => 0
                        ],
                        'contain' => [
                            'Dotace.PrijemcePomoci'
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag, $sum, 'long_term');
                $soucet = $sum;
            }
            $soucet_staty[$stat->id] = $soucet;


            // soucet spotrebovaanych
            $cache_tag_spotrebovano = "soucet_stat_spotrebovano_" . $stat->statKod3Znaky;
            $soucet_spotrebovano = Cache::read($cache_tag_spotrebovano, 'long_term');
            if ($soucet_spotrebovano === false) {
                $sum_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaSpotrebovana)'
                        ],
                        'conditions' => [
                            'PrijemcePomoci.iriStat' => $stat->id,
                            'refundaceIndikator' => 0
                        ],
                        'contain' => [
                            'Rozhodnuti',
                            'Rozhodnuti.Dotace.PrijemcePomoci'
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_spotrebovano, $sum_spotrebovano, 'long_term');
                $soucet_spotrebovano = $sum_spotrebovano;
            }
            $soucet_staty_spotrebovano[$stat->id] = $soucet_spotrebovano;
        }

        foreach ($kraje_ids as $kraj) {
            $cache_tag_kraj = 'soucet_kraj_' . sha1($kraj->krajKod);
            $soucet_kraj = Cache::read($cache_tag_kraj, 'long_term');
            if ($soucet_kraj === false) {
                $soucet = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'sum' => 'SUM(Rozhodnuti.castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'CiselnikOkresv01.krajNadKod' => $kraj->krajKod
                    ],
                    'contain' => [
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01.CiselnikOkresv01'
                    ]
                ])->first();
                Cache::write($cache_tag_kraj, $soucet->sum, 'long_term');
                $soucet_kraj = $soucet->sum;
            }

            $cache_tag_kraj_spotrebovano = 'soucet_kraj_spotrebovano_' . sha1($kraj->krajKod);
            $soucet_kraj_spotrebovano = Cache::read($cache_tag_kraj_spotrebovano, 'long_term');
            if ($soucet_kraj_spotrebovano === false) {
                $soucet_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'sum' => 'SUM(RozpoctoveObdobi.castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'CiselnikOkresv01.krajNadKod' => $kraj->krajKod
                    ],
                    'contain' => [
                        'Rozhodnuti.Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01.CiselnikOkresv01'
                    ]
                ])->first();
                Cache::write($cache_tag_kraj_spotrebovano, $soucet_spotrebovano->sum, 'long_term');
                $soucet_kraj_spotrebovano = $soucet_spotrebovano->sum;
            }

            $kraje_data[$kraj->krajKod] = (object)[
                'krajKod' => $kraj->krajKod,
                'soucet' => $soucet_kraj,
                'soucet_spotrebovano' => $soucet_kraj_spotrebovano,
                'krajNazev' => $this->CiselnikKrajv01->find('all', ['conditions' => ['krajKod' => $kraj->krajKod]])->first()->krajNazev,
                'color' => ''
            ];
        }

        $gradients = $this->lineargradient(255, 0, 0, 0, 255, 255, count($kraje_data) + 1);
        usort($kraje_data, function ($a, $b) {
            if ($a->soucet_spotrebovano == $b->soucet_spotrebovano) {
                return 0;
            }
            return ($a->soucet_spotrebovano < $b->soucet_spotrebovano) ? -1 : 1;
        });

        $tmparr = [];
        $cntr = 0;
        foreach ($kraje_data as $key => $val) {
            $val->color = $gradients[$cntr];
            $tmparr[$val->krajKod] = $val;
            $cntr++;
        }
        $kraje_data = $tmparr;
        unset($tmparr);

        foreach ($okresy as $okres) {
            $cache_tag_okres_soucet = 'soucet_okres_' . sha1($okres->okresKod);
            $cache_tag_okres_soucet_spotrebovano = 'soucet_okres_spotrebovano_' . sha1($okres->okresKod);

            $soucet_okres = Cache::read($cache_tag_okres_soucet, 'long_term');
            $soucet_okres_spotrebovano = Cache::read($cache_tag_okres_soucet_spotrebovano, 'long_term');

            if ($soucet_okres === false) {
                $soucet_okres = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaRozhodnuta)'
                    ],
                    'contain' => [
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01.CiselnikOkresv01'
                    ],
                    'conditions' => [
                        'CiselnikOkresv01.okresKod' => $okres->okresKod,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_okres_soucet, $soucet_okres, 'long_term');
            }

            if ($soucet_okres_spotrebovano === false) {
                $soucet_okres_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaSpotrebovana)'
                    ],
                    'contain' => [
                        'Rozhodnuti.Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01.CiselnikOkresv01'
                    ],
                    'conditions' => [
                        'CiselnikOkresv01.okresKod' => $okres->okresKod,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_okres_soucet_spotrebovano, $soucet_okres_spotrebovano, 'long_term');
            }

            $okresy_soucet[$okres->id] = (object)[
                'soucet' => $soucet_okres,
                'soucetSpotrebovano' => $soucet_okres_spotrebovano,
                'okresNazev' => $okres->okresNazev,
                'color' => '',
                'okresKod' => $okres->okresKod,
                'id' => $okres->id
            ];
        }

        $okresy_gradients = $this->lineargradient(255, 0, 0, 0, 255, 255, count($okresy_soucet) + 1);
        usort($okresy_soucet, function ($a, $b) {
            if ($a->soucetSpotrebovano == $b->soucetSpotrebovano) {
                return 0;
            }
            return ($a->soucetSpotrebovano < $b->soucetSpotrebovano) ? -1 : 1;
        });

        $tmparr = [];
        $cntr = 0;
        foreach ($okresy_soucet as $key => $val) {
            $val->color = $okresy_gradients[$cntr];
            $tmparr[$val->id] = $val;
            $cntr++;
        }
        $okresy_soucet = $tmparr;
        unset($tmparr);

        foreach ($obce as $obec) {
            $cache_tag_obec_soucet = 'obec_soucet_' . sha1($obec->obecKod);
            $cache_tag_obec_soucet_spotrebovano = 'obec_soucet_spotrebovano_' . sha1($obec->obecKod);

            $obec_soucet = Cache::read($cache_tag_obec_soucet, 'long_term');
            $obec_soucet_spotrebovano = Cache::read($cache_tag_obec_soucet_spotrebovano, 'long_term');

            if ($obec_soucet === false) {
                $obec_soucet = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaRozhodnuta)'
                    ],
                    'contain' => [
                        'Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01'
                    ],
                    'conditions' => [
                        'CiselnikObecv01.obecKod' => $obec->obecKod,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_obec_soucet, $obec_soucet, 'long_term');
            }

            if ($obec_soucet_spotrebovano === false) {
                $obec_soucet_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaSpotrebovana)'
                    ],
                    'contain' => [
                        'Rozhodnuti.Dotace.PrijemcePomoci.AdresaSidlo.CiselnikObecv01'
                    ],
                    'conditions' => [
                        'CiselnikObecv01.obecKod' => $obec->obecKod,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_obec_soucet_spotrebovano, $obec_soucet_spotrebovano, 'long_term');
            }

            $obce_soucet[$obec->id] = (object)[
                'soucet' => $obec_soucet,
                'soucetSpotrebovano' => $obec_soucet_spotrebovano
            ];
        }

        $this->set(compact(['staty', 'soucet_staty', 'soucet_staty_spotrebovano', 'kraje_data', 'okresy', 'obce', 'okresy_soucet', 'obce_soucet']));
    }

    private
    function lineargradient($ra, $ga, $ba, $rz, $gz, $bz, $iterationnr)
    {
        $colorindex = array();
        for ($iterationc = 1; $iterationc <= $iterationnr; $iterationc++) {
            $iterationdiff = $iterationnr - $iterationc;
            $colorindex[] = '#' .
                str_pad(dechex(intval((($ra * $iterationc) + ($rz * $iterationdiff)) / $iterationnr)), 2, "0", STR_PAD_RIGHT) .
                str_pad(dechex(intval((($ga * $iterationc) + ($gz * $iterationdiff)) / $iterationnr)), 2, "0", STR_PAD_RIGHT) .
                str_pad(dechex(intval((($ba * $iterationc) + ($bz * $iterationdiff)) / $iterationnr)), 2, "0", STR_PAD_RIGHT);
        }
        return $colorindex;
    }

    public function podleZdrojeFinanci()
    {

        $zdroje = $this->CiselnikFinancniZdrojv01->find('all')->toArray();
        $sums = [];
        foreach ($zdroje as $z) {
            // soucet spotrebovana
            $cache_tag = 'soucet_podle_zdroje_' . sha1($z->id);
            $sum = Cache::read($cache_tag, 'long_term');
            $sums[$z->financniZdrojKod]['SUM'] = $sum;
            if ($sum === false) {
                $z_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(RozpoctoveObdobi.castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $z->id,
                        'refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'RozpoctoveObdobi'
                    ]
                ])->first()->toArray()['SUM'];
                Cache::write($cache_tag, $z_sum, 'long_term');
                $sums[$z->financniZdrojKod]['SUM'] = $z_sum;
            }

            // soucet rozhodnuta
            $cache_tag = 'soucet_podle_zdroje_rozhodnuta_' . sha1($z->id);
            $sum = Cache::read($cache_tag, 'long_term');
            $sums[$z->financniZdrojKod]['SUM2'] = $sum;
            if ($sum === false) {
                $z_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $z->id,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->toArray()['SUM'];
                Cache::write($cache_tag, $z_sum, 'long_term');
                $sums[$z->financniZdrojKod]['SUM2'] = $z_sum;
            }
        }
        $data = [];
        foreach ($zdroje as $z) {
            $data[$z->financniZdrojKod] = [
                'nazev' => $z->financniZdrojNazev,
                'castkaSpotrebovana' => $sums[$z->financniZdrojKod]['SUM'],
                'castkaRozhodnuta' => $sums[$z->financniZdrojKod]['SUM2'],
                'id' => $z->financniZdrojKod
            ];
        }
        $sort = $this->request->getQuery('sort');
        if ($sort) {
            if ($sort === "sum") {
                usort($data, function ($a, $b) {
                    return $b['castkaSpotrebovana'] - $a['castkaSpotrebovana'];
                });
            } else if ($sort === "zdroj") {
                usort($data, function ($a, $b) {
                    return strcmp($a['nazev'], $b['nazev']);
                });
            }
        }
        $this->set(compact(['data']));
        $this->set('title', 'Zdroj Financí / Financování');
    }

    public
    function statistics()
    {
        $cache_tag = 'db_stats';
        $tables = Cache::read($cache_tag, 'long_term');
        if ($tables === false) {
            $tables = [];
            $dbtables = ConnectionManager::get('default')->schemaCollection()->listTables();
            foreach ($dbtables as $key => $t) {
                $tablereg = TableRegistry::get($t);

                $this->loadModel($tablereg->getAlias());
                $tableData = (object)[
                    "name" => $tablereg->getAlias(),
                    "total" => $this->{$tablereg->getAlias()}->find()->count(),
                    "columns" => []
                ];
                $tableCount100 = $tableData->total / 100;

                foreach ($tablereg->getSchema()->columns() as $raw_col) {
                    $col_type = $tablereg->getSchema()->column($raw_col);
                    $col_type = $col_type['type'];
                    /** @var Query $empty_rows */
                    $empty_rows = $this->{$tablereg->getAlias()}->find()->where([$raw_col . ' IS NULL']);
                    if ($col_type == 'string') $empty_rows->orWhere([$raw_col => '']);
                    else if ($col_type == 'decimal') $empty_rows->orWhere([$raw_col => 0]);
                    $empty_rows = $empty_rows->count();

                    $top_value = $this->{$tablereg->getAlias()}->find('all', [
                        'fields' => [
                            $raw_col,
                            'rsum' => 'COUNT(' . $raw_col . ')'
                        ],
                        'group' => [$raw_col],
                        'order' => [
                            'rsum' => 'DESC'
                        ]
                    ])->limit(1)->first();
                    $tableData->columns[] = (object)[
                        "empty_rows" => $empty_rows,
                        "percent_empty" => $tableCount100 == 0 ? 0 : round($empty_rows / $tableCount100, 4),
                        "name" => $raw_col,
                        "most_common_value" => empty($top_value) ? '' : $top_value->{$raw_col}
                    ];
                }

                $tables[] = $tableData;
            }
            Cache::write($cache_tag, $tables, 'long_term');
        }
        $this->set(compact(['tables']));
    }

    public function dotacniTituly()
    {
        $data = $this->CiselnikDotaceTitulv01->find('all', [
            'contain' => [
                'CiselnikStatniRozpocetKapitolav01'
            ],
            'group' => [
                'dotaceTitulKod'
            ],
            'order' => [
                'CiselnikDotaceTitulv01.zaznamPlatnostDoDatum' => 'DESC'
            ]
        ]);

        $this->set(compact('data'));
    }

    /*
     * Podle prijemcu
     * **/

    public function fyzickeOsoby()
    {

    }

    public function podleZdrojeFinanciCompleteAjax()
    {

        $zdroj = $this->CiselnikFinancniZdrojv01->find('all', [
            'conditions' => [
                'financniZdrojKod' => $this->request->getParam('kod')
            ]
        ])->first();
        if (empty($zdroj)) throw new NotFoundException();

        $conditions = [
            'iriFinancniZdroj' => $zdroj->id
        ];
        if (!empty($this->request->getParam('year'))) {
            $conditions['rokRozhodnuti'] = $this->request->getParam('year');
        }

        $dotace = $this->Rozhodnuti->find('all', [
            'conditions' => $conditions,
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'RozpoctoveObdobi'
            ],
            'order' => [
                'castkaRozhodnuta' => 'DESC'
            ]
        ])->limit(20000);

        $_serialize = false;

        $this->set(compact(['dotace', '_serialize']));
    }

    public function strukturalniFondyDetail()
    {
        $req_op = filter_var($this->request->getQuery('op'), FILTER_SANITIZE_STRING);

        $op = $this->StrukturalniFondy->find('all', [
            'conditions' => [
                'cisloANazevProgramu' => $req_op
            ]
        ])->first();
        if (empty($op)) throw new NotFoundException();

        $op_kod = explode(' ', $req_op);
        $op_kod = $op_kod[0];

        $data = $this->CiselnikMmrOperacniProgramv01->find('all', [
            'conditions' => [
                'operacaniProgramKod' => $op_kod
            ]
        ])->first();
        if (empty($data) && strpos($req_op, 'ROP') === false && strpos($req_op, 'OP Praha') === false) throw new NotFoundException();

        $is_special_op = strpos($req_op, 'ROP') !== false || strpos($req_op, 'OP Praha') !== false;

        if ($is_special_op) {
            $priority = $this->StrukturalniFondy->find('all', [
                'conditions' => [
                    'cisloANazevProgramu' => $req_op
                ],
                'fields' => [
                    'cisloPrioritniOsy',
                    'CNT' => 'COUNT(*)'
                ],
                'group' => [
                    'cisloPrioritniOsy'
                ]
            ]);
            $data = (object)[
                'operacaniProgramKod' => $op->cisloANazevProgramu,
                'operacaniProgramNazev' => $op->cisloANazevProgramu,
                'idOperacniProgram' => false,
                'zaznamPlatnostDoDatum' => false,
                'zaznamPlatnostOdDatum' => false
            ];
        } else {
            $priority = $this->StrukturalniFondy->find('all', [
                'conditions' => [
                    'cisloANazevProgramu' => $req_op,
                    'CiselnikMmrPrioritav01.idOperacniProgram' => $data->idOperacniProgram
                ],
                'fields' => [
                    'cisloPrioritniOsy',
                    'CNT' => 'COUNT(*)',
                    'CiselnikMmrPrioritav01.prioritaNazev'
                ],
                'group' => [
                    'cisloPrioritniOsy'
                ],
                'contain' => [
                    'CiselnikMmrPrioritav01'
                ]
            ]);
        }

        if ($this->request->is('ajax')) {
            $fondy = $this->StrukturalniFondy->find('all', [
                'conditions' => [
                    'cisloANazevProgramu' => $req_op
                ]
            ])->limit(50000);

            $_serialize = false;
            $this->set(compact(['op', 'data', 'fondy', '_serialize']));
        } else {
            $this->set(compact(['op', 'data', 'priority']));
        }
    }

    public function financniZdroje()
    {
        $sources = $this->CiselnikFinancniZdrojv01->find('all');
        $this->set(compact('sources'));
    }

    public function pravniFormy()
    {
        $data = $this->CiselnikPravniFormav01->find('all');
        $this->set(compact('data'));
    }

    public function kapitolyStatnihoRozpoctu()
    {
        $data = $this->CiselnikStatniRozpocetKapitolav01->find('all');
        $this->set(compact('data'));
    }

    public function kapitolyStatnihoRozpoctuUkazatele()
    {
        $data = $this->CiselnikStatniRozpocetUkazatelv01->find('all');
        $this->set(compact('data'));
    }

    public function podlePoskytovateluDetail()
    {

        $kod = filter_var($this->request->getParam('id'), FILTER_SANITIZE_NUMBER_INT);

        $poskytovatel = !empty($kod) ? $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $kod
            ]
        ])->first() : null;

        if (empty($poskytovatel)) throw new NotFoundException();

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $cache_key = 'sum_rozhodnuti_podle_poskytovatele_years_' . sha1($poskytovatel->id);
        $poskytovatel_years = Cache::read($cache_key, 'long_term');

        $year_to_sum = [];
        $sum = 0;
        $sum_spotrebovano = 0;


        if ($poskytovatel_years === false) {
            $poskytovatel_years = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'roky' => 'DISTINCT(rokRozhodnuti)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id
                ]
            ])->toList();
            Cache::write($cache_key, $poskytovatel_years, 'long_term');
        }
        foreach ($poskytovatel_years as $year) {
            $year = $year['roky'];
            $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
            $cache_key_year_spotrebovano = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_spotrebovano_' . sha1($poskytovatel->id);

            $year_sum = Cache::read($cache_key_year, 'long_term');
            if ($year_sum === false) {
                $year_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriPoskytovatelDotace' => $poskytovatel->id,
                        'rokRozhodnuti' => $year,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->SUM;
                Cache::write($cache_key_year, $year_sum, 'long_term');
            }

            $year_sum_spotrebovano = Cache::read($cache_key_year_spotrebovano, 'long_term');
            if ($year_sum_spotrebovano === false) {
                $year_sum_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'iriPoskytovatelDotace' => $poskytovatel->id,
                        'rokRozhodnuti' => $year,
                        'refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'Rozhodnuti'
                    ]
                ])->first()->SUM;
                Cache::write($cache_key_year_spotrebovano, $year_sum_spotrebovano, 'long_term');
            }

            $year_to_sum[$year] = [$year_sum, $year_sum_spotrebovano];
            $sum += $year_sum;
            $sum_spotrebovano += $year_sum_spotrebovano;
        }

        $sort = $this->request->getQuery('sort');
        if ($sort) {
            if ($sort === "sum") {
                arsort($year_to_sum);
            } else if ($sort === "year") {
                ksort($year_to_sum);
            }
        } else {
            ksort($year_to_sum);
        }

        $poskytovatel_biggest = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'iriPoskytovatelDotace' => $poskytovatel->id
            ],
            'limit' => 100,
            'order' => [
                'Rozhodnuti.castkaRozhodnuta' => 'DESC'
            ],
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'RozpoctoveObdobi'
            ]
        ]);

        $this->set(compact(['poskytovatel', 'year_to_sum', 'poskytovatel_biggest', 'sum', 'sum_spotrebovano']));
    }

    public function podlePoskytovateluDetailComplete()
    {

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        if (empty($poskytovatel)) throw new NotFoundException();

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $this->set(compact(['poskytovatel', 'year_to_sum', 'poskytovatel_biggest', 'sum']));
    }

    public function podlePoskytovateluDetailCompleteAjax()
    {

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        if (empty($poskytovatel)) throw new NotFoundException();

        $conditions = [
            'iriPoskytovatelDotace' => $poskytovatel->id
        ];
        if (!empty($this->request->getParam('year'))) {
            $conditions['rokRozhodnuti'] = $this->request->getParam('year');
        }

        $dotace = $this->Rozhodnuti->find('all', [
            'conditions' => $conditions,
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01'
            ],
            'order' => [
                'castkaRozhodnuta' => 'DESC'
            ]
        ])->limit(20000);
        $_serialize = false;

        $this->set(compact(['dotace', '_serialize']));
    }

    public function podlePoskytovateluDetailRok()
    {

        $year = $this->request->getParam('year');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        if (empty($poskytovatel)) throw new NotFoundException();

        $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
        $year_sum = Cache::read($cache_key_year, 'long_term');
        if ($year_sum === false) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id,
                    'rokRozhodnuti' => $year,
                    'refundaceIndikator' => 0
                ]
            ])->first()->toArray();
            $year_sum = $year_sum['SUM'];
            Cache::write($cache_key_year, $year_sum, 'long_term');
        }

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $this->set(compact(['poskytovatel', 'year', 'sum', 'year_sum']));
    }

    public function detailDotace()
    {

        $dotace = $this->Dotace->find('all', [
            'conditions' => [
                'idDotace' => $this->request->getParam('id')
            ],
            'contain' => [
                'PrijemcePomoci',
                'PrijemcePomoci.CiselnikPravniFormav01',
                'PrijemcePomoci.CiselnikStatv01',
                'PrijemcePomoci.EkonomikaSubjekt',
                'CiselnikMmrOperacniProgramv01',
                'CiselnikMmrPodprogramv01',
                'CiselnikMmrPrioritav01',
                'CiselnikMmrOpatreniv01',
                'CiselnikMmrPodOpatreniv01',
                'CiselnikMmrGrantoveSchemav01',
                'CiselnikCedrOperacniProgramv01',
                'CiselnikCedrPodprogramv01',
                'CiselnikCedrGrantoveSchemav01',
                'CiselnikCedrPrioritav01',
                'CiselnikCedrOpatreniv01',
                'CiselnikCedrPodOpatreniv01',
                'Rozhodnuti.RozpoctoveObdobi.CiselnikDotaceTitulv01'
            ]
        ])->first();
        if (empty($dotace)) throw new NotFoundException();

        $rozhodnuti = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'idDotace' => $dotace->idDotace
            ],
            'contain' => [
                'CiselnikDotacePoskytovatelv01',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'RozpoctoveObdobi'
            ]
        ]);

        $this->set(compact(['dotace', 'rozhodnuti']));
    }

    public function detailPrijemcePomoci()
    {

        $prijemce = $this->PrijemcePomoci->find('all', [
            'conditions' => [
                'idPrijemce' => $this->request->getParam('id')
            ],
            'contain' => [
                'CiselnikPravniFormav01',
                'CiselnikStatv01',
                'Osoba',
                'Osoba.CiselnikObecv01',
                'EkonomikaSubjekt'
            ]
        ])->limit(1)->first();

        if (empty($prijemce)) throw new NotFoundException();

        if ($prijemce->ico == 0) {
            $conditions = [
                'ico' => 0,
                'jmeno' => $prijemce->jmeno,
                'prijmeni' => $prijemce->prijmeni,
                'rokNarozeni' => $prijemce->rokNarozeni
            ];
        } else {
            $conditions = [
                'ico' => $prijemce->ico,
                'idPrijemce !=' => $prijemce->idPrijemce
            ];
        }

        $prijemci = $this->PrijemcePomoci->find('all', [
            'conditions' => $conditions,
            'order' => [
                'PrijemcePomoci.idPrijemce' => 'ASC'
            ]
        ]);

        $id_vsech_prijemcu = [$prijemce->idPrijemce];
        foreach ($prijemci as $p) {
            $id_vsech_prijemcu[] = $p->idPrijemce;
        }

        $dotace = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'Dotace.idPrijemce IN' => $id_vsech_prijemcu
            ],
            'contain' => [
                'CiselnikFinancniProstredekCleneniv01',
                'CiselnikFinancniZdrojv01',
                'Dotace.CiselnikMmrOperacniProgramv01',
                'Dotace.CiselnikMmrPodprogramv01',
                'Dotace.CiselnikMmrPrioritav01',
                'Dotace.CiselnikMmrOpatreniv01',
                'Dotace.CiselnikMmrPodOpatreniv01',
                'Dotace.CiselnikMmrGrantoveSchemav01',
                'Dotace.CiselnikCedrOperacniProgramv01',
                'Dotace.CiselnikCedrPodprogramv01',
                'Dotace.CiselnikCedrGrantoveSchemav01',
                'Dotace.CiselnikCedrPrioritav01',
                'Dotace.CiselnikCedrOpatreniv01',
                'Dotace.CiselnikCedrPodOpatreniv01',
                'RozpoctoveObdobi'

            ]
        ]);

        $this->set(compact(['prijemce', 'dotace', 'prijemci']));
    }

    public function detailPrijemceMulti()
    {
        $multiple = $this->request->getParam('ico');
        $ico = [];
        foreach (explode(",", str_replace(" ", ",", $multiple)) as $multi_ico) {
            if (!filter_var($multi_ico, FILTER_SANITIZE_NUMBER_INT)) continue;
            $ico[] = $multi_ico;
        }

        if (empty($ico)) {
            $this->redirect($this->referer());
        }

        $prijemci = [];
    }

    function podleZdrojeFinanciDetail()
    {

        $zdroj = $this->CiselnikFinancniZdrojv01->find('all', [
            'conditions' => [
                'financniZdrojKod' => $this->request->getParam('kod')
            ]
        ])->first();
        if (empty($zdroj)) throw new NotFoundException();

        $this->set('title', $zdroj->financniZdrojNazev . ' - Zdroj Financí');

        $cache_key = 'sum_rozhodnuti_podle_zdroje_years_' . sha1($zdroj->id);
        $zdroj_years = Cache::read($cache_key, 'long_term');
        $year_to_sum = [];
        $sum = 0;
        $sum_spotrebovano = 0;

        if ($zdroj_years === false) {
            $zdroj_years = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'roky' => 'DISTINCT(rokRozhodnuti)'
                ],
                'conditions' => [
                    'iriFinancniZdroj' => $zdroj->id,
                    'refundaceIndikator' => 0
                ]
            ])->toList();
            Cache::write($cache_key, $zdroj_years, 'long_term');
        }

        foreach ($zdroj_years as $year) {
            $year = $year['roky'];

            $cache_key_year = 'sum_rozhodnuti_podle_zdroje_year_' . $year . '_' . sha1($zdroj->id);
            $cache_key_year_spotrebovano = 'sum_rozhodnuti_podle_zdroje_year_' . $year . '_spotrebovano_' . sha1($zdroj->id);

            $year_sum = Cache::read($cache_key_year, 'long_term');
            if ($year_sum === false) {
                $year_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $zdroj->id,
                        'rokRozhodnuti' => $year,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->SUM;
                Cache::write($cache_key_year, $year_sum, 'long_term');
            }

            $year_sum_spotrebovano = Cache::read($cache_key_year_spotrebovano, 'long_term');
            if ($year_sum_spotrebovano === false) {
                $year_sum_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $zdroj->id,
                        'rokRozhodnuti' => $year,
                        'refundaceIndikator' => 0
                    ],
                    'contain' => 'Rozhodnuti'
                ])->first()->SUM;
                Cache::write($cache_key_year_spotrebovano, $year_sum_spotrebovano, 'long_term');
            }

            $year_to_sum[$year] = [
                $year_sum,
                $year_sum_spotrebovano
            ];
            $sum += $year_sum;
            $sum_spotrebovano += $year_sum_spotrebovano;
        }

        $sort = $this->request->getQuery('sort');
        if ($sort) {
            if ($sort === "sum") {
                arsort($year_to_sum);
            } else if ($sort === "year") {
                ksort($year_to_sum);
            }
        } else {
            ksort($year_to_sum);
        }

        $zdroj_biggest = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'iriFinancniZdroj' => $zdroj->id
            ],
            'limit' => 100,
            'order' => [
                'Rozhodnuti.castkaRozhodnuta' => 'DESC'
            ],
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'RozpoctoveObdobi'
            ]
        ]);

        $this->set(compact(['zdroj', 'zdroj_biggest', 'year_to_sum', 'sum', 'sum_spotrebovano']));
    }

    public function podleZdrojeFinanciDetailComplete()
    {
        $zdroj = $this->CiselnikFinancniZdrojv01->find('all', [
            'conditions' => [
                'financniZdrojKod' => $this->request->getParam('kod')
            ]
        ])->first();
        if (empty($zdroj)) throw new NotFoundException();

        $this->set('title', $zdroj->financniZdrojNazev . ' - Zdroj Financí');

        $this->set(compact(['zdroj']));
    }

    public function podleZdrojeFinanciDetailRok()
    {
        $year = $this->request->getParam('year');
        $zdroj = $this->CiselnikFinancniZdrojv01->find('all', [
            'conditions' => [
                'financniZdrojKod' => $this->request->getParam('kod')
            ]
        ])->first();

        if (empty($zdroj)) throw new NotFoundException();

        $this->set('title', $zdroj->financniZdrojNazev . ' - Rok ' . $year . ' - Zdroj Financí');

        $cache_key_year = 'sum_rozhodnuti_podle_zdroje_year_' . $year . '_' . sha1($zdroj->id);
        $year_sum = Cache::read($cache_key_year, 'long_term');
        if ($year_sum === false) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriFinancniZdroj' => $zdroj->id,
                    'rokRozhodnuti' => $year,
                    'refundaceIndikator' => 0
                ]
            ])->first()->toArray();
            $year_sum = $year_sum['SUM'];
            Cache::write($cache_key_year, $year_sum, 'long_term');
        }

        $this->set(compact(['year', 'zdroj', 'year_sum']));
    }

    function detailRozhodnuti()
    {
        $id = $this->request->getParam('id');
        $rozhodnuti = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'Rozhodnuti.idRozhodnuti' => $id
            ],
            'contain' => [
                'Dotace',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'CiselnikDotacePoskytovatelv01',
                'RozpoctoveObdobi',
                'RozpoctoveObdobi.CiselnikDotaceTitulv01'
            ]
        ])->first();
        if (empty($rozhodnuti)) throw new NotFoundException();

        $rozhodnuti = $rozhodnuti->toArray();

        $rozpocet = $this->RozpoctoveObdobi->find('all', [
            'conditions' => [
                'idRozhodnuti' => $id
            ]
        ])->toArray();

        $this->set(compact(['rozhodnuti', 'rozpocet']));
    }

    public function fyzickeOsobyAjax()
    {
        $osoby = $this->PrijemcePomoci->find('all', [
            'fields' => [
                'idPrijemce',
                'jmeno',
                'prijmeni',
                'rokNarozeni',
                'iriStat',
                'iriOsoba',
                'CiselnikStatv01.statNazev',
                'AdresaBydliste.obecNazev'
            ],
            'conditions' => [
                'iriPravniForma' => 'http://cedropendata.mfcr.cz/c3lod/szcr/resource/ciselnik/PravniForma/v01/100/19980101'
            ]
        ])->contain([
            'CiselnikStatv01',
            'AdresaBydliste'
        ])->enableHydration(true)->limit(110000);

        $_serialize = false;

        $this->set(compact(['osoby', '_serialize']));
    }

    public
    function detailDotacniTitul()
    {
        $titul = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'dotaceTitulKod' => $this->request->getParam('kod')
            ],
            'contain' => [
                'CiselnikStatniRozpocetKapitolav01'
            ]
        ])->first();
        if (!$titul) throw new NotFoundException();

        $tituly_ids = $this->CiselnikDotaceTitulv01->find('all', [
            'fields' => [
                'id' => 'DISTINCT(idDotaceTitul)'
            ],
            'conditions' => [
                'dotaceTitulKod' => $this->request->getParam('kod')
            ]
        ])->enableHydration(false)->toArray();
        $tituly_ids_flat = [];
        array_walk_recursive($tituly_ids, function ($a) use (&$tituly_ids_flat) {
            $tituly_ids_flat[] = $a;
        });

        $roky = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'dotaceTitulKod' => $this->request->getParam('kod')
            ]
        ]);

        $top_rozpoctove_obdobi = $this->RozpoctoveObdobi->find('all', [
            'conditions' => [
                'iriDotacniTitul IN' => $tituly_ids_flat
            ],
            'contain' => [
                'Rozhodnuti',
                'Rozhodnuti.CiselnikDotacePoskytovatelv01',
                'Rozhodnuti.CiselnikFinancniProstredekCleneniv01',
                'Rozhodnuti.Dotace',
                'Rozhodnuti.Dotace.PrijemcePomoci',
                'CiselnikUcelZnakv01'
            ],
            'order' => [
                'castkaSpotrebovana' => 'DESC'
            ]
        ])->limit(5000);

        $soucty = [];

        foreach ($roky as $r) {
            $cache_tag_rozhodnuto = 'dotacni_titul_soucet_rozhodnuto_' . sha1($r->idDotaceTitul);
            $cache_tag_spotrebovano = 'dotacni_titul_soucet_spotrebovano_' . sha1($r->idDotaceTitul);

            $soucet_rozhodnuto = Cache::read($cache_tag_rozhodnuto, 'long_term');
            $soucet_spotrebovano = Cache::read($cache_tag_spotrebovano, 'long_term');

            if ($soucet_rozhodnuto === false) {
                $soucet_rozhodnuto = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'sum' => 'SUM(Rozhodnuti.castkaRozhodnuta)'
                    ],
                    'contain' => [
                        'Rozhodnuti'
                    ],
                    'conditions' => [
                        'iriDotacniTitul' => $r->idDotaceTitul,
                        'Rozhodnuti.refundaceIndikator' => 0
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_rozhodnuto, $soucet_rozhodnuto, 'long_term');
            }
            if ($soucet_spotrebovano === false) {
                $soucet_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'iriDotacniTitul' => $r->idDotaceTitul,
                        'Rozhodnuti.refundaceIndikator' => 0
                    ],
                    'contain' => [
                        'Rozhodnuti'
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_spotrebovano, $soucet_spotrebovano, 'long_term');
            }
            $soucty[$r->idDotaceTitul] = [
                'soucetRozhodnuto' => $soucet_rozhodnuto,
                'soucetSpotrebovano' => $soucet_spotrebovano
            ];
        }

        $this->set(compact(['titul', 'top_rozpoctove_obdobi', 'roky', 'soucty']));
    }

    public
    function detailDotacniTitulRok()
    {
        $idTitul = $this->request->getQuery('id');
        $idTitul = filter_var($idTitul, FILTER_SANITIZE_URL);

        $titul = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'idDotaceTitul' => $idTitul
            ],
            'contain' => [
                'CiselnikStatniRozpocetKapitolav01'
            ]
        ])->first();
        if (empty($titul)) throw new NotFoundException();

        $cache_tag_rozhodnuto = 'dotacni_titul_soucet_rozhodnuto_' . sha1($titul->idDotaceTitul);
        $cache_tag_spotrebovano = 'dotacni_titul_soucet_spotrebovano_' . sha1($titul->idDotaceTitul);

        $soucet_rozhodnuto = Cache::read($cache_tag_rozhodnuto, 'long_term');
        $soucet_spotrebovano = Cache::read($cache_tag_spotrebovano, 'long_term');

        if ($soucet_rozhodnuto === false) {
            $soucet_rozhodnuto = $this->RozpoctoveObdobi->find('all', [
                'fields' => [
                    'sum' => 'SUM(Rozhodnuti.castkaRozhodnuta)'
                ],
                'contain' => [
                    'Rozhodnuti'
                ],
                'conditions' => [
                    'iriDotacniTitul' => $titul->idDotaceTitul
                ]
            ])->first()->sum;
            Cache::write($cache_tag_rozhodnuto, $soucet_rozhodnuto, 'long_term');
        }
        if ($soucet_spotrebovano === false) {
            $soucet_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                'fields' => [
                    'sum' => 'SUM(castkaSpotrebovana)'
                ],
                'conditions' => [
                    'iriDotacniTitul' => $titul->idDotaceTitul,
                    'refundaceIndikator' => 0
                ]
            ])->first()->sum;
            Cache::write($cache_tag_spotrebovano, $soucet_spotrebovano, 'long_term');
        }
        $soucty[$titul->idDotaceTitul] = [
            'soucetRozhodnuto' => $soucet_rozhodnuto,
            'soucetSpotrebovano' => $soucet_spotrebovano
        ];

        $this->set(compact(['titul', 'soucty', 'idTitul']));
    }

    public
    function detailDotacniTitulRokAjax()
    {
        $idTitul = $this->request->getQuery('id');
        $idTitul = filter_var($idTitul, FILTER_SANITIZE_URL);

        $titul = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'idDotaceTitul' => $idTitul
            ]
        ])->first();
        if (empty($titul)) throw new NotFoundException();

        $dotace = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'RozpoctoveObdobi.iriDotacniTitul' => $titul->idDotaceTitul
            ],
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'RozpoctoveObdobi',
                'CiselnikDotacePoskytovatelv01'
            ],
            'order' => [
                'castkaRozhodnuta' => 'DESC'
            ]
        ])->limit(50000);
        $_serialize = false;

        $this->set(compact(['dotace', '_serialize']));
    }

    public
    function detailKraje()
    {
        $kraj = $this->CiselnikKrajv01->find('all', [
            'conditions' => [
                'krajKod' => $this->request->getParam('id')
            ],
            'order' => [
                'zaznamPlatnostDoDatum' => 'DESC'
            ]
        ])->first();
        if (empty($kraj)) throw new NotFoundException();

        $okresy = $this->CiselnikOkresv01->find('all', [
            'conditions' => [
                'krajNadKod' => $this->request->getParam('id')
            ],
            'group' => [
                'okresKod'
            ],
            'order' => [
                'zaznamPlatnostDoDatum' => 'DESC'
            ]
        ]);

        $historie = $this->CiselnikKrajv01->find('all', [
            'conditions' => [
                'krajKod' => $this->request->getParam('id')
            ]
        ]);

        if ($this->request->is('ajax')) {
            $cache_tag_kraj_top_100 = 'detail_kraje_top_100_' . sha1($kraj->krajKod);
            $biggest = Cache::read($cache_tag_kraj_top_100, 'long_term');
            if ($biggest === false) $biggest = [];
            $_serialize = false;
            $this->set(compact(['kraj', 'historie', 'biggest', '_serialize']));
        } else {
            $biggest = [];
            $this->set(compact(['kraj', 'okresy', 'historie', 'biggest']));
        }

    }

    public
    function detailOkres()
    {
        $okres = $this->CiselnikOkresv01->find('all', [
            'conditions' => [
                'okresKod' => $this->request->getParam('id')
            ],
            'order' => ['CiselnikOkresv01.zaznamPlatnostDoDatum' => 'DESC'],
            'contain' => [
                'CiselnikKrajv01'
            ]
        ])->first();
        if (empty($okres)) throw new NotFoundException();

        $obce = $this->CiselnikObecv01->find('all', [
            'conditions' => [
                'okresNadKod' => $this->request->getParam('id')
            ],
            'group' => [
                'obecKod'
            ]
        ]);

        $historie = $this->CiselnikOkresv01->find('all', [
            'conditions' => [
                'okresKod' => $this->request->getParam('id')
            ]
        ]);

        if ($this->request->is('ajax')) {
            $cache_tag_okres_top_100 = 'detail_okresu_top_100_' . sha1($okres->okresKod);
            $biggest = Cache::read($cache_tag_okres_top_100, 'long_term');
            if ($biggest === false) $biggest = [];
            $_serialize = false;
            $this->set(compact(['okres', 'historie', 'biggest', '_serialize']));
        } else {
            $biggest = [];
            $this->set(compact(['okres', 'obce', 'historie', 'biggest']));
        }
    }

    public
    function detailObce()
    {
        $obec = $this->CiselnikObecv01->find('all', [
            'conditions' => [
                'obecKod' => $this->request->getParam('id')
            ],
            'order' => [
                'CiselnikObecv01.zaznamPlatnostDoDatum' => 'DESC'
            ],
            'contain' => [
                'CiselnikOkresv01'
            ]
        ])->first();
        if (empty($obec)) throw new NotFoundException();

        $historie = $this->CiselnikObecv01->find('all', [
            'conditions' => [
                'obecKod' => $this->request->getParam('id')
            ]
        ]);

        if ($this->request->is('ajax')) {
            $cache_tag_obec_top_100 = 'detail_obce_top_100_' . sha1($obec->obecKod);
            $biggest = Cache::read($cache_tag_obec_top_100, 'long_term');
            if ($biggest === false) $biggest = [];
            $_serialize = false;
            $this->set(compact(['obec', 'historie', 'biggest', '_serialize']));
        } else {
            $biggest = [];
            $this->set(compact(['obec', 'historie', 'biggest']));
        }
    }

    public
    function ciselniky()
    {

    }

    public function mmrPodOpatreni()
    {
        $data = $this->CiselnikMmrPodOpatreniv01->find('all', [
            'conditions' => [
                'idPodOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikMmrOpatreniv01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $dotace = $this->Dotace->find('all', [
            'fields' => [
                'idDotace',
                'idPrijemce',
                'projektKod',
                'projektIdnetifikator',
                'projektNazev',
                'PrijemcePomoci.idPrijemce',
                'PrijemcePomoci.obchodniJmeno',
                'PrijemcePomoci.jmeno',
                'PrijemcePomoci.prijmeni'
            ],
            'conditions' => [
                'iriPodopatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'PrijemcePomoci'
            ]
        ])->limit(1000);

        $this->set(compact(['data', 'dotace']));
    }

    public function cedrPodOpatreni()
    {
        $data = $this->CiselnikCedrPodOpatreniv01->find('all', [
            'conditions' => [
                'idPodOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikCedrOpatreniv01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $dotace = $this->Dotace->find('all', [
            'fields' => [
                'idDotace',
                'idPrijemce',
                'projektKod',
                'projektIdnetifikator',
                'projektNazev',
                'PrijemcePomoci.idPrijemce',
                'PrijemcePomoci.obchodniJmeno',
                'PrijemcePomoci.jmeno',
                'PrijemcePomoci.prijmeni'
            ],
            'conditions' => [
                'iriPodopatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'PrijemcePomoci'
            ]
        ])->limit(1000);

        $this->set(compact(['data', 'dotace']));
    }

    public function mmrOpatreni()
    {
        $data = $this->CiselnikMmrOpatreniv01->find('all', [
            'conditions' => [
                'idOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikMmrPrioritav01',
                'CiselnikMmrPodOpatreniv01'
            ]
        ])->first();
        if (empty($data)) {
            $podopatreni = $this->CiselnikMmrPodOpatreniv01->find('all', [
                'conditions' => [
                    'idPodOpatreni' => $this->request->getQuery('id')
                ]
            ])->first();
            if (empty($podopatreni)) {
                throw new NotFoundException();
            } else {
                $this->redirect('/detail-mmr-podopatreni/?id=' . $this->request->getQuery('id'));
                return;
            }
        }

        $dotace = $this->Dotace->find('all', [
            'fields' => [
                'idDotace',
                'idPrijemce',
                'projektKod',
                'projektIdnetifikator',
                'projektNazev',
                'PrijemcePomoci.idPrijemce',
                'PrijemcePomoci.obchodniJmeno',
                'PrijemcePomoci.jmeno',
                'PrijemcePomoci.prijmeni'
            ],
            'conditions' => [
                'iriOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'PrijemcePomoci'
            ]
        ])->limit(1000);

        $this->set(compact(['data', 'dotace']));
    }

    public function cedrOpatreni()
    {
        $data = $this->CiselnikCedrOpatreniv01->find('all', [
            'conditions' => [
                'idOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikCedrPrioritav01',
                'CiselnikCedrPodOpatreniv01'
            ]
        ])->first();
        if (empty($data)) {
            $podopatreni = $this->CiselnikCedrPodOpatreniv01->find('all', [
                'conditions' => [
                    'idPodOpatreni' => $this->request->getQuery('id')
                ]
            ])->first();
            if (empty($podopatreni)) {
                throw new NotFoundException();
            } else {
                $this->redirect('/detail-cedr-podopatreni/?id=' . $this->request->getQuery('id'));
                return;
            }
        }

        $dotace = $this->Dotace->find('all', [
            'fields' => [
                'idDotace',
                'idPrijemce',
                'projektKod',
                'projektIdnetifikator',
                'projektNazev',
                'PrijemcePomoci.idPrijemce',
                'PrijemcePomoci.obchodniJmeno',
                'PrijemcePomoci.jmeno',
                'PrijemcePomoci.prijmeni'
            ],
            'conditions' => [
                'iriOpatreni' => $this->request->getQuery('id')
            ],
            'contain' => [
                'PrijemcePomoci'
            ]
        ])->limit(1000);

        $this->set(compact(['data', 'dotace']));
    }

    public function mmrPriorita()
    {
        $data = $this->CiselnikMmrPrioritav01->find('all', [
            'conditions' => [
                'idPriorita' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikMmrOperacniProgramv01',
                'CiselnikMmrPodprogramv01',
                'CiselnikMmrOpatreniv01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        if ($this->request->is('ajax')) {
            $dotace = $this->Dotace->find('all', [
                'fields' => [
                    'idDotace',
                    'idPrijemce',
                    'projektKod',
                    'projektIdnetifikator',
                    'projektNazev',
                    'PrijemcePomoci.idPrijemce',
                    'PrijemcePomoci.obchodniJmeno',
                    'PrijemcePomoci.jmeno',
                    'PrijemcePomoci.prijmeni'
                ],
                'conditions' => [
                    'iriPriorita' => $this->request->getQuery('id')
                ],
                'contain' => [
                    'PrijemcePomoci'
                ]
            ])->limit(50000);
            $_serialize = false;
            $this->set(compact(['data', 'dotace', '_serialize']));
        } else {
            $this->set(compact(['data']));
        }
    }

    public function cedrPriorita()
    {
        $data = $this->CiselnikCedrPrioritav01->find('all', [
            'conditions' => [
                'idPriorita' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikCedrOperacniProgramv01',
                'CiselnikCedrPodprogramv01',
                'CiselnikCedrOpatreniv01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        if ($this->request->is('ajax')) {
            $dotace = $this->Dotace->find('all', [
                'fields' => [
                    'idDotace',
                    'idPrijemce',
                    'projektKod',
                    'projektIdnetifikator',
                    'projektNazev',
                    'PrijemcePomoci.idPrijemce',
                    'PrijemcePomoci.obchodniJmeno',
                    'PrijemcePomoci.jmeno',
                    'PrijemcePomoci.prijmeni'
                ],
                'conditions' => [
                    'iriPriorita' => $this->request->getQuery('id')
                ],
                'contain' => [
                    'PrijemcePomoci'
                ]
            ])->limit(50000);
            $_serialize = false;
            $this->set(compact(['data', 'dotace', '_serialize']));
        } else {
            $this->set(compact(['data']));
        }
    }

    public function mmrOperacniProgram()
    {
        $data = $this->CiselnikMmrOperacniProgramv01->find('all', [
            'conditions' => [
                'idOperacniProgram' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikMmrPrioritav01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $cache_tag_mmr_priorita_dotace_count = 'mmr_priorita_count_dotace_' . sha1($data->idOperacniProgram);
        $counts = Cache::read($cache_tag_mmr_priorita_dotace_count, 'long_term');
        if ($counts === false) {
            $counts = [];

            foreach ($data->MmrPriorita as $p) {
                $counts[$p->idPriorita] = $this->Dotace->find('all', [
                    'conditions' => [
                        'iriPriorita' => $p->idPriorita
                    ]
                ])->count();
            }

            Cache::write($cache_tag_mmr_priorita_dotace_count, $counts, 'long_term');
        }

        if ($this->request->is('ajax')) {
            $dotace = $this->Dotace->find('all', [
                'fields' => [
                    'idDotace',
                    'idPrijemce',
                    'projektKod',
                    'projektIdnetifikator',
                    'projektNazev',
                    'PrijemcePomoci.idPrijemce',
                    'PrijemcePomoci.obchodniJmeno',
                    'PrijemcePomoci.jmeno',
                    'PrijemcePomoci.prijmeni'
                ],
                'conditions' => [
                    'iriOperacniProgram' => $this->request->getQuery('id')
                ],
                'contain' => [
                    'PrijemcePomoci'
                ]
            ])->limit(50000);

            $_serialize = false;
            $this->set(compact(['data', 'dotace', '_serialize']));
        } else {
            $this->set(compact(['data', 'counts']));
        }
    }

    public function cedrOperacniProgram()
    {
        $data = $this->CiselnikCedrOperacniProgramv01->find('all', [
            'conditions' => [
                'idOperacniProgram' => $this->request->getQuery('id')
            ],
            'contain' => [
                'CiselnikCedrPrioritav01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $cache_tag_cedr_priorita_dotace_count = 'cedr_priorita_count_dotace_' . sha1($data->idOperacniProgram);
        $counts = Cache::read($cache_tag_cedr_priorita_dotace_count, 'long_term');
        if ($counts === false) {
            $counts = [];

            foreach ($data->CedrPriorita as $p) {
                $counts[$p->idPriorita] = $this->Dotace->find('all', [
                    'conditions' => [
                        'iriPriorita' => $p->idPriorita
                    ]
                ])->count();
            }

            Cache::write($cache_tag_cedr_priorita_dotace_count, $counts, 'long_term');
        }

        if ($this->request->is('ajax')) {
            $dotace = $this->Dotace->find('all', [
                'fields' => [
                    'idDotace',
                    'idPrijemce',
                    'projektKod',
                    'projektIdnetifikator',
                    'projektNazev',
                    'PrijemcePomoci.idPrijemce',
                    'PrijemcePomoci.obchodniJmeno',
                    'PrijemcePomoci.jmeno',
                    'PrijemcePomoci.prijmeni'
                ],
                'conditions' => [
                    'iriOperacniProgram' => $this->request->getQuery('id')
                ],
                'contain' => [
                    'PrijemcePomoci'
                ]
            ])->limit(50000);

            $_serialize = false;
            $this->set(compact(['data', 'dotace', '_serialize']));
        } else {
            $this->set(compact(['data', 'counts']));
        }
    }

    public function detailStatu()
    {
        $stat = $this->CiselnikStatv01->find('all', [
            'conditions' => [
                'statKod3Znaky' => $this->request->getParam('id')
            ],
            'order' => [
                'zaznamPlatnostDoDatum' => 'DESC'
            ]
        ])->first();
        if (empty($stat)) throw new NotFoundException();

        $historie = $this->CiselnikStatv01->find('all', [
            'conditions' => [
                'statKod3Znaky' => $this->request->getParam('id')
            ]
        ]);

        $cache_tag_statu_top_100 = 'detail_statu_top_100_' . sha1($stat->statKod3Znaky);
        $biggest = Cache::read($cache_tag_statu_top_100, 'long_term');
        if ($biggest === false) $biggest = [];

        $this->set(compact(['stat', 'historie', 'biggest']));
    }

}