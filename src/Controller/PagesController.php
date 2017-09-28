<?php
/**
 * Created by PhpStorm.
 * User: smarek
 * Date: 6/4/17
 * Time: 9:10 PM
 */

namespace App\Controller;

use App\Controller\Component\CachingComponent;
use App\Model\Entity\Company;
use App\Model\Entity\Consolidation;
use App\Model\Entity\Dotace;
use App\Model\Entity\MFCRPAP;
use App\Model\Table\AuditsTable;
use App\Model\Table\CiselnikCedrOpatreniv01Table;
use App\Model\Table\CiselnikCedrOperacniProgramv01Table;
use App\Model\Table\CiselnikCedrPodOpatreniv01Table;
use App\Model\Table\CiselnikCedrPrioritav01Table;
use App\Model\Table\CiselnikDotacePoskytovatelv01Table;
use App\Model\Table\CiselnikDotaceTitulStatniRozpocetUkazatelv01Table;
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
use App\Model\Table\CiselnikUcelZnakDotacniTitulv01Table;
use App\Model\Table\CiselnikUcelZnakv01Table;
use App\Model\Table\CompaniesTable;
use App\Model\Table\ConsolidationsTable;
use App\Model\Table\DotaceTable;
use App\Model\Table\DotinfoTable;
use App\Model\Table\InvesticniPobidkyTable;
use App\Model\Table\MFCRPAPTable;
use App\Model\Table\OwnersTable;
use App\Model\Table\PrijemcePomociTable;
use App\Model\Table\RozhodnutiTable;
use App\Model\Table\RozpoctoveObdobiTable;
use App\Model\Table\StrukturalniFondyTable;
use App\Model\Table\TransactionsTable;
use App\View\DPUTILS;
use Cake\Cache\Cache;
use Cake\Database\Query;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Client;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\HtmlHelper;
use Cake\View\View;


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
 * @property CiselnikDotaceTitulStatniRozpocetUkazatelv01Table CiselnikDotaceTitulStatniRozpocetUkazatelv01
 * @property CiselnikUcelZnakv01Table CiselnikUcelZnakv01
 * @property CiselnikUcelZnakDotacniTitulv01Table CiselnikUcelZnakDotacniTitulv01
 * @property InvesticniPobidkyTable InvesticniPobidky
 * @property CompaniesTable Companies
 * @property TransactionsTable Transactions
 * @property DotinfoTable Dotinfo
 * @property ConsolidationsTable Consolidations
 * @property OwnersTable Owners
 * @property CiselnikCedrPrioritav01Table CiselnikCedrPrioritav01
 * @property AuditsTable Audits
 * @property MFCRPAPTable MFCRPAP
 */
class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Dotinfo');
        $this->loadModel('MFCRPAP');
        $this->loadModel('Audits');
        $this->loadModel('Transactions');
        $this->loadModel('Owners');
        $this->loadModel('Consolidations');
        $this->loadModel('InvesticniPobidky');
        $this->loadModel('Companies');
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
        $this->loadModel('CiselnikDotaceTitulStatniRozpocetUkazatelv01');
        $this->loadModel('CiselnikUcelZnakv01');
        $this->loadModel('CiselnikUcelZnakDotacniTitulv01');
        $this->loadComponent('Caching');
    }

    public function index()
    {
        $this->set('crumbs', ['Hlavní stránka' => 'self']);
        if (!empty($this->request->getQuery('type')) && !empty($this->request->getQuery('query'))) {
            $query = $this->request->getQuery('query');
            switch ($this->request->getQuery('type')) {
                case 1:
                    if (is_numeric($query)) {
                        $this->redirect('/prijemce-dotaci/ico?ico=' . $this->request->getQuery('query'));
                    } else {
                        $this->redirect('/prijemce-dotaci/jmeno?name=' . $this->request->getQuery('query'));
                    }
                    break;
                case 2:
                    $this->redirect('/poskytovatel-dotaci/jmeno?name=' . $this->request->getQuery('query'));
                    break;
            }
        }
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
        $this->strukturalniFondy();
        $this->podleSidlaPrijemce();
        $this->podleZdrojeFinanci();
        $this->statistics();
        $this->dotacniTituly();
        $this->fyzickeOsoby();
    }

    public function cedrOperacniProgramy()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy CEDR' => 'self']);
        $cedr = $this->CiselnikCedrOperacniProgramv01->find('all');
        $counts = $this->Caching->initCacheCEDROP($cedr);

        $this->set(compact('cedr', 'counts'));
    }

    public function mmrOperacniProgramy()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy MMR' => 'self']);
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
                if ($stat['statKod3Znaky'] === 'CZE') {
                    $biggest = $this->Rozhodnuti->find('list', [
                        'order' => [
                            'castkaRozhodnuta' => 'DESC'
                        ],
                        'fields' => [
                            'Rozhodnuti.castkaRozhodnuta',
                            'Rozhodnuti.idDotace'
                        ],
                        'keyField' => 'idDotace',
                        'valueField' => 'castkaRozhodnuta'
                    ])->limit(28000)->enableHydration(false)->toArray();
                    $step2 = $this->Dotace->find('list', [
                        'conditions' => [
                            'idDotace IN' => array_keys($biggest),
                            'PrijemcePomoci.iriStat' => 'http://cedropendata.mfcr.cz/c3lod/csu/resource/ciselnik/Stat/v01/CZE/19930101'
                        ],
                        'contain' => [
                            'PrijemcePomoci'
                        ],
                        'fields' => [
                            'idDotace',
                            'PrijemcePomoci.iriStat'
                        ],
                        'keyField' => 'idDotace',
                        'valueField' => 'PrijemcePomoci.iriStat'
                    ])->limit(20000)->enableHydration(false)->toArray();
                    $idDotaci = array_keys($step2);
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
                            'Rozhodnuti.idDotace IN' => $idDotaci
                        ],
                        'contain' => [
                            'RozpoctoveObdobi',
                            'Dotace',
                            'Dotace.PrijemcePomoci'
                        ]
                    ])->limit(20000)->enableHydration(false)->toArray();
                } else {
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
                    ])->limit(20000)->enableHydration(false)->toArray();
                }
                Cache::write($cache_tag_statu_top_100, $biggest, 'long_term');
            }
            debug(count($biggest));
        }
    }

    public function podlePoskytovatelu()
    {

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační úřady' => 'self']);

        $this->set('title', 'Poskytovatelé Dotací');

        if ($this->request->is('ajax')) {
            $_serialize = false;
            $data = $this->CiselnikDotacePoskytovatelv01->find('all');
            $counts = $this->Caching->initCachePodlePoskytovatelu($data);

            $this->set(compact(['data', 'counts', '_serialize']));
        }

    }

    public function strukturalniFondy()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Strukturální Fondy' => 'self']);
        $ops = $this->StrukturalniFondy->find('all', [
            'fields' => [
                'OP' => 'cisloANazevProgramu',
                'CNT' => 'COUNT(*)'
            ],
            'group' => [
                'cisloANazevProgramu'
            ]
        ])->enableHydration(false)->toArray();
        $this->set(compact(['ops']));
    }

    public function podleSidlaPrijemce()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Sídlo Příjemce' => 'self']);

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

        if ($this->request->is('ajax')) {

            $obce_soucet = [];

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

            $_serialize = false;
            $this->set(compact(['obce', 'obce_soucet', '_serialize']));
            return;
        }

        $soucet_staty = [];
        $soucet_staty_spotrebovano = [];
        $kraje_data = [];
        $okresy_soucet = [];

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

        $this->set(compact(['staty', 'soucet_staty', 'soucet_staty_spotrebovano', 'kraje_data', 'okresy', 'okresy_soucet']));
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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Zdroje Financí' => 'self']);

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

    public function statistics()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Statistika využití databáze' => 'self']);
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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační tituly' => 'self']);
        if ($this->request->is('ajax')) {
            $_serialize = false;
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
            $this->set(compact(['data', '_serialize']));
        }

    }

    public function fyzickeOsoby()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Fyzické osoby' => 'self']);

    }

    public function strukturalniFondyDetailDotace()
    {
        $data = $this->StrukturalniFondy->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('id')
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $this->set(compact(['data']));
    }

    public function podlePrijemcu()
    {

        if (!empty($name)) {

        } else if (!empty($multi_prijemci)) {
            $this->redirect('/podle-prijemcu/multiple/' . $multi_prijemci);
        } else if (!empty($pravni_forma)) {

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

        $this->set(compact(['ico', 'name', 'multiple', 'pravni_formy']));
    }

    public function podlePrijemcuIndex()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => 'self']);
    }

    /*
     * Podle prijemcu
     * **/

    public function prijemceDotaciPravniForma()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Právní Forma' => 'self']);

        $spf_filtr = [
            1 => [703, 721],
            2 => [100],
            3 => [101, 102, 103, 104, 105, 106, 107, 108, 150],
            4 => [[116, 117, 118, 141, 145, 233, 234, 251, 353, 401, 442, 701, 705, 706, 731, 741, 745, 751, 761, 921, 922], [361 => 2001]],
            5 => [111, 112, 113, 114, 115, 121, 151, 201, 205, 231, 232, 241, 242, 300, 301, 320, 330, 352, 501, 521, 531, 532, 533, 705, 931, 932, 933],
            6 => [314, 321, 325, 331, 341, 343, 352, 381, 400, 500, 601, 771, 801, 802, 804, 805, 901, 941, 950],
            7 => [601, 602, 603, 611, 621, 625, 631, 641, 661],
            8 => [310, 312, 313, 431, 435, 436, 437, 541, 702],
            9 => [[911], [361 => 2002]],
            10 => [711, 715, 732],
            11 => [421],
            12 => [391, 651, 671],
            13 => [0, 950, 999]
        ];
        // ošetřit: 361,

        $pravni_forma = $this->request->getQuery('pravniforma');
        $pravni_forma = filter_var($pravni_forma, FILTER_SANITIZE_NUMBER_INT);
        $spolecna_pravni_forma = $this->request->getQuery('spf');
        $spolecna_pravni_forma = filter_var($spolecna_pravni_forma, FILTER_SANITIZE_NUMBER_INT);

        if ($this->request->is('ajax')) {
            $_serialize = false;
            $conditions = [];
            $filter_id = 1;
            if (!empty($pravni_forma)) {
                $filter_id = 2 . '_' . $pravni_forma;

                $pf = $this->CiselnikPravniFormav01->find('all', [
                    'conditions' => [
                        'pravniFormaKod' => $pravni_forma
                    ]
                ])->first();
                if (empty($pf)) throw new NotFoundException();

                $conditions = [
                    'iriPravniForma' => $pf->id
                ];
            } else if (!empty($spolecna_pravni_forma)) {
                $filter_id = 3 . '_' . $spolecna_pravni_forma;
                if (is_array($spf_filtr[$spolecna_pravni_forma][0])) {
                    $conds = ['OR' => [
                        'pravniFormaKod IN' => $spf_filtr[$spolecna_pravni_forma][0],
                        [
                            'pravniFormaKod' => array_keys($spf_filtr[$spolecna_pravni_forma][1])[0],
                            'YEAR(zaznamPlatnostOdDatum)' => $spf_filtr[$spolecna_pravni_forma][1][array_keys($spf_filtr[$spolecna_pravni_forma][1])[0]]
                        ]
                    ]];
                } else {
                    $conds = [
                        'pravniFormaKod IN' => $spf_filtr[$spolecna_pravni_forma]
                    ];
                }
                $pf = $this->CiselnikPravniFormav01->find('all', [
                    'conditions' => $conds
                ]); //->enableHydration(false)->toArray();
                if (empty($pf)) throw new NotFoundException();

                $pf_array = [];
                foreach ($pf as $p) {
                    $pf_array[] = $p['id'];
                }

                $conditions = [
                    'iriPravniForma IN' => $pf_array
                ];
            }

            if ($filter_id == 1) {
                $data = [];
            } else {
                $data = $this->PrijemcePomoci->find('all', [
                    'fields' => [
                        'idPrijemce',
                        'ico',
                        'obchodniJmeno',
                        'CiselnikStatv01.statKod3Znaky',
                        'CiselnikStatv01.statNazev'
                    ],
                    'contain' => [
                        'CiselnikStatv01'
                    ],
                    'conditions' => $conditions
                ])->limit(50000);
            }
            $this->set(compact(['_serialize', 'data', 'filter_id']));
        } else {
            $pravni_formy = $this->CiselnikPravniFormav01->find('list', [
                'fields' => [
                    'id' => 'pravniFormaKod',
                    'pravniFormaNazev'
                ],
                'order' => [
                    'pravniFormaNazev'
                ]
            ]);
            $spolecne_pravni_formy = [
                1 => 'Církevní Instituce',
                2 => 'Fyzická Osoba Nepodnikatel',
                3 => 'Fyzická Osoba Podnikatel',
                4 => 'Nezisková Organizace',
                5 => 'Právnická Osoba Podnikající',
                6 => 'Veřejná Instituce',
                7 => 'Vzdělávací Instituce',
                8 => 'Finanční Instituce',
                9 => 'Veřejnoprávní Média',
                10 => 'Politická Strana',
                11 => 'Zahraniční Osoba',
                12 => 'Zdravotnická Instituce',
                13 => 'Ostatní'
            ];
            $this->set(compact(['pravni_formy', 'spolecne_pravni_formy', 'pravni_forma', 'spolecna_pravni_forma']));
        }
    }

    public function prijemceDotaciIco()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'IČO Příjemce' => 'self']);

        $ico = $this->request->getQuery('ico');
        $ico = filter_var($ico, FILTER_SANITIZE_NUMBER_INT);
        $ico = $ico == 0 ? null : $ico;

        $multiple = $this->request->getQuery('multiple');
        $multiple = filter_var($multiple, FILTER_SANITIZE_STRING);
        $multi_prijemci = null;

        if (!empty($multiple)) {
            $this->redirect('/podle-prijemcu/multiple/' . $multiple);
        }

        if ($this->request->is('ajax')) {
            $_serialize = false;
            $ajax_type = 'cedr';
            if ($this->request->getQuery('czechinvest') == 'czechinvest') {
                $data = $this->InvesticniPobidky->find('all', [
                    'conditions' => [
                        'ico' => $ico
                    ]
                ]);
                $ajax_type = 'czechinvest';
            } else if ($this->request->getQuery('konsolidace') == 'konsolidace') {
                $data = $this->Companies->find('all', [
                    'conditions' => [
                        'ico' => $ico
                    ],
                    'contain' => [
                        'Types'
                    ]
                ]);
                $ajax_type = 'konsolidace';
            } else if ($this->request->getQuery('strukturalni-fondy') == 'strukturalni-fondy') {
                $data = $this->StrukturalniFondy->find('all', [
                    'conditions' => [
                        'zadatelIco' => $ico
                    ]
                ]);
                $ajax_type = 'strukturalniFondy';
            } else if ($this->request->getQuery('cedr') == 'cedr') {
                $data = $this->PrijemcePomoci->find('all', [
                    'fields' => [
                        'idPrijemce',
                        'obchodniJmeno',
                        'jmeno',
                        'prijmeni',
                        'ico',
                        'CiselnikStatv01.statNazev',
                        'CiselnikStatv01.statKod3Znaky'
                    ],
                    'contain' => ['CiselnikStatv01'],
                    'conditions' => [
                        'ico' => $ico
                    ]
                ])->limit(50000);
            } else if ($this->request->getQuery('dotinfo') == 'dotinfo') {
                $data = $this->Dotinfo->find('all', [
                    'conditions' => [
                        'ucastnikIco' => $ico
                    ]
                ]);
                $ajax_type = 'dotinfo';
            } else if ($this->request->getQuery('politickeStrany') == 'politickeStrany') {
                $ajax_type = 'politickeStrany';
                $data = $this->Companies->find('all', [
                    'conditions' => [
                        'type_id' => 5,
                        'ico' => $ico
                    ]
                ]);
                $darce_id = [];
                foreach ($data as $d) {
                    if ($d->ico == 0) {
                        $sums[0] = 0;
                        continue;
                    }
                    if ($d->type_id != 5) {
                        continue;
                    }
                    $darce_id[] = $d->id;
                }

                if (empty($darce_id)) {
                    $data = [];
                } else {
                    $data = $this->Transactions->find('all', [
                        'conditions' => [
                            'donor_id IN' => $darce_id
                        ],
                        'contain' => [
                            'Recipient',
                            'Donor'
                        ]
                    ]);
                }
            } else {
                $data = [];
            }
            $this->set(compact(['_serialize', 'data', 'ico', 'ajax_type']));
        } else {
            $this->set(compact(['ico']));
        }
    }

    public function prijemceDotaciJmeno()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Jméno Příjemce' => 'self']);

        $name = $this->request->getQuery('name');
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if ($this->request->is('ajax')) {
            $_serialize = false;
            $ajax_type = 'empty';
            if ($this->request->getQuery('cedr') == 'cedr') {
                $data = $this->PrijemcePomoci->find('all', [
                    'fields' => [
                        'idPrijemce',
                        'obchodniJmeno',
                        'ico',
                        'jmeno',
                        'prijmeni',
                        'CiselnikStatv01.statKod3Znaky',
                        'CiselnikStatv01.statNazev'
                    ],
                    'contain' => ['CiselnikStatv01'],
                    'conditions' => [
                        "MATCH (obchodniJmeno, jmeno, prijmeni) AGAINST (:against IN BOOLEAN MODE)"
                    ]
                ])->bind(':against', h($name))->limit(50000);
                $ajax_type = 'cedr';
            } else if ($this->request->getQuery('konsolidace') == 'konsolidace') {
                $data = $this->Companies->find('all', [
                    'conditions' => [
                        "MATCH (name) AGAINST (:against in BOOLEAN MODE)"
                    ],
                    'contain' => [
                        'Types'
                    ]
                ])->bind(':against', h($name));
                $ajax_type = 'konsolidace';
            }else if ($this->request->getQuery('czechinvest') == 'czechinvest') {
                $data = $this->InvesticniPobidky->find('all', [
                    'conditions' => [
                        "MATCH (name) AGAINST (:against IN BOOLEAN MODE)"
                    ]
                ])->bind(':against', h($name));
                $ajax_type = 'czechinvest';
            } else if ($this->request->getQuery('strukturalni-fondy') == 'strukturalni-fondy') {
                $data = $this->StrukturalniFondy->find('all', [
                    'conditions' => [
                        "MATCH (zadatel) AGAINST (:against IN BOOLEAN MODE)"
                    ]
                ])->bind(':against', h($name));
                $ajax_type = 'strukturalniFondy';
            } else if ($this->request->getQuery('politickeStrany') == 'politickeStrany') {
                $ajax_type = 'politickeStrany';
                $data = $this->Companies->find('all', [
                    'conditions' => [
                        "MATCH (name) AGAINST (:against IN BOOLEAN MODE)"
                    ]
                ])->bind(':against', h($name));
                $darce_id = [];
                foreach ($data as $d) {
                    if ($d->ico == 0) {
                        $sums[0] = 0;
                        continue;
                    }
                    if ($d->type_id != 5) {
                        continue;
                    }
                    $darce_id[] = $d->id;
                }
                if (empty($darce_id)) {
                    $data = [];
                } else {
                    $data = $this->Transactions->find('all', [
                        'conditions' => [
                            'donor_id IN' => $darce_id
                        ],
                        'contain' => [
                            'Recipient',
                            'Donor'
                        ]
                    ]);
                }
            } else if ($this->request->getQuery('dotinfo') == 'dotinfo') {
                $ajax_type = 'dotinfo';
                $data = $this->Dotinfo->find('all', [
                    'conditions' => [
                        "MATCH (ucastnikObchodniJmeno) AGAINST (:against IN BOOLEAN MODE)"
                    ]
                ])->bind(':against', h($name));
            } else {
                $data = [];
            }
            $this->set(compact(['data', '_serialize', 'name', 'ajax_type']));
        } else {
            $this->set(compact(['name']));
        }

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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Finanční zdroje' => 'self']);
        $sources = $this->CiselnikFinancniZdrojv01->find('all');
        $this->set(compact('sources'));
    }

    public function pravniFormy()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Právní formy' => 'self']);
        $data = $this->CiselnikPravniFormav01->find('all');
        $this->set(compact('data'));
    }

    public function kapitolyStatnihoRozpoctu()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Kapitoly státního rozpočtu' => 'self']);
        $data = $this->CiselnikStatniRozpocetKapitolav01->find('all');
        $this->set(compact('data'));
    }

    public function kapitolyStatnihoRozpoctuUkazatele()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Ukazatele kapitol státního rozpočtu' => 'self']);
        if ($this->request->is('ajax')) {
            $data = $this->CiselnikStatniRozpocetUkazatelv01->find('all', [
                'conditions' => [
                    'statniRozpocetUkazatelNadrizenyKod' => ''
                ],
                'order' => [
                    'zaznamPlatnostDoDatum' => 'DESC'
                ]
            ]);

            $ukazatele_counts = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->find('list', [
                'fields' => [
                    'idStatniRozpocetUkazatel' => 'idStatniRozpocetUkazatel',
                    'CNT' => 'COUNT(idDotaceTitul)'
                ],
                'keyField' => 'idStatniRozpocetUkazatel',
                'valueField' => 'CNT',
                'group' => [
                    'idStatniRozpocetUkazatel'
                ]
            ])->enableHydration(false)->toArray();

            $_serialize = false;

            $this->set(compact('data', 'ukazatele_counts', '_serialize'));
        } else {
            $roky = $this->CiselnikStatniRozpocetUkazatelv01->find('all', [
                'fields' => [
                    'ROK' => 'DISTINCT(YEAR(zaznamPlatnostOdDatum))'
                ],
                'order' => [
                    'ROK' => 'DESC'
                ]
            ])->enableHydration(false)->toArray();
            $this->set(compact('roky'));
        }
    }

    public function kapitolyStatnihoRozpoctuUkazateleDetail()
    {
        $kodUkazatele = $this->request->getParam('id');
        $rokUkazatele = $this->request->getParam('year');

        $ukazatele = $this->CiselnikStatniRozpocetUkazatelv01->find('all', [
            'conditions' => [
                'statniRozpocetUkazatelKod' => $kodUkazatele,
                'zaznamPlatnostOdDatum' => $rokUkazatele . '-01-01 00:00:00'
            ],
            'contain' => [
                'CiselnikStatniRozpocetKapitolav01'
            ]
        ])->limit(1)->enableHydration(false)->toArray();
        if (empty($ukazatele)) throw new NotFoundException();

        $podrizene = $this->CiselnikStatniRozpocetUkazatelv01->find('all', [
            'conditions' => [
                'statniRozpocetUkazatelNadrizenyKod' => $kodUkazatele,
                'zaznamPlatnostOdDatum' => $rokUkazatele . '-01-01 00:00:00'
            ],
            'group' => [
                'statniRozpocetUkazatelKod'
            ],
            'order' => [
                'zaznamPlatnostDoDatum' => 'DESC'
            ]
        ]);

        $dotacniTituly = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'CiselnikDotaceTitulStatniRozpocetUkazatelv01.idStatniRozpocetUkazatel' => $ukazatele[0]['id']
            ],
            'contain' => [
                'CiselnikDotaceTitulStatniRozpocetUkazatelv01'
            ]
        ]);

        $this->set(compact(['kodUkazatele', 'ukazatele', 'podrizene', 'dotacniTituly']));
    }

    public function podlePoskytovateluDetail()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační úřady' => '/podle-poskytovatelu', 'Detail poskytovatele dotací' => 'self']);

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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Detail Dotace' => 'self']);

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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Detail Příjemce' => 'self']);

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

        if ($this->request->is('ajax')) {
            $this->set('_serialize', false);
            if ($this->request->getQuery('dotace') == 'dotace') {
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
                $this->set(compact(['dotace', 'prijemce']));
                $this->set('ajax_type', 'dotace');
            } else if ($this->request->getQuery('strukturalni-fondy') == 'strukturalni-fondy') {
                $strukturalniFondy = $this->StrukturalniFondy->find('all', [
                    'conditions' => [
                        'zadatelIco' => $prijemce->ico
                    ]
                ]);
                $this->set(compact(['strukturalniFondy', 'prijemce']));
                $this->set('ajax_type', 'strukturalniFondy');
            } else if ($this->request->getQuery('czechinvest') == 'czechinvest') {
                $investicniPobidky = $this->InvesticniPobidky->find('all', [
                    'conditions' => [
                        'ico' => $prijemce->ico
                    ]
                ]);
                $this->set(compact(['investicniPobidky', 'prijemce']));
                $this->set('ajax_type', 'czechinvest');
            } else if ($this->request->getQuery('politickeDary') == 'politickeDary') {
                $me = $this->Companies->find('all', [
                    'conditions' => [
                        'type_id' => 5,
                        'ico' => $prijemce->ico
                    ]
                ]);
                $darce_id = [];
                foreach ($me as $m) {
                    $darce_id[] = $m->id;
                }
                $politickeDary = $this->Transactions->find('all', [
                    'conditions' => [
                        'donor_id IN' => $darce_id
                    ],
                    'contain' => [
                        'Recipient'
                    ]
                ]);
                $ajax_type = 'politickeDary';
                $this->set(compact(['politickeDary', 'ajax_type', 'prijemce']));
            } else if ($this->request->getQuery('dotinfo') == 'dotinfo') {
                $ajax_type = 'dotinfo';
                $dotinfo = $this->Dotinfo->find('all', [
                    'conditions' => [
                        'ucastnikIco' => $prijemce->ico
                    ]
                ]);
                $this->set(compact(['dotinfo', 'ajax_type', 'prijemce']));
            } else {
                $this->set('_serialize', true);
                throw new NotFoundException($this->request->getQueryParams());
            }
        } else {

            if ($prijemce->ico != 0) {
                $strukturalniFondy = $this->StrukturalniFondy->find('all', [
                    'conditions' => [
                        'zadatelIco' => $prijemce->ico
                    ]
                ])->count();
                $investicniPobidky = $this->InvesticniPobidky->find('all', [
                    'conditions' => [
                        'ico' => $prijemce->ico
                    ]
                ])->count();
                $politickeDary = $this->Companies->find('all', [
                    'conditions' => [
                        'ico' => $prijemce->ico,
                        'type_id' => 5
                    ]
                ])->count();
                $dotinfo = $this->Dotinfo->find('all', [
                    'conditions' => [
                        'ucastnikIco' => $prijemce->ico
                    ]
                ])->count();
                $this->set(compact(['strukturalniFondy', 'investicniPobidky', 'politickeDary', 'dotinfo']));
            }

            $this->set(compact(['prijemce', 'prijemci']));
        }
    }

    public function detailPrijemceMulti()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Detail Příjemce (Více IČO zároveň)' => 'self']);
        $multiple = $this->request->getParam('ico');
        $ico = [];
        foreach (explode(",", str_replace(" ", ",", $multiple)) as $multi_ico) {
            if (!filter_var($multi_ico, FILTER_SANITIZE_NUMBER_INT)) continue;
            if ($ico == 0) continue;
            $ico[] = $multi_ico;
        }

        if (empty($ico)) {
            $this->redirect($this->referer());
        }

        $prijemci = [];
        $info = [];
        $aliasy = [];
        $ids = [];
        foreach ($ico as $ic) {
            $ids = $this->PrijemcePomoci->find('list', [
                'conditions' => [
                    'ico' => $ic
                ],
                'keyField' => 'idPrijemce',
                'valueField' => 'ico'
            ])->enableHydration(false)->toArray();
            if (!empty($ids)) {
                $prijemci = array_merge($prijemci, $ids);
                $info[] = $this->PrijemcePomoci->find('all', [
                    'conditions' => [
                        'idPrijemce' => array_keys($ids)[0]
                    ],
                    'contain' => [
                        'CiselnikStatv01',
                        'CiselnikPravniFormav01',
                        'Osoba'
                    ]
                ])->first();
                foreach (array_keys($ids) as $id) {
                    $alias = $this->PrijemcePomoci->find('all', [
                        'fields' => [
                            'obchodniJmeno',
                            'jmeno',
                            'prijmeni',
                            'idPrijemce'
                        ],
                        'conditions' => [
                            'idPrijemce' => $id
                        ]
                    ])->enableHydration(false)->toArray();
                    $aliasy = array_merge($aliasy, $alias);
                }
            }
        }
        if (empty($prijemci)) throw new NotFoundException();

        if ($this->request->is('ajax')) {
            $dotace = $this->Rozhodnuti->find('all', [
                'conditions' => [
                    'Dotace.idPrijemce IN' => array_keys($ids)
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
                    'RozpoctoveObdobi',
                    'CiselnikDotacePoskytovatelv01',
                    'Dotace.PrijemcePomoci'
                ]
            ]);
            $_serialize = false;
            $this->set(compact(['_serialize', 'dotace']));
        } else {
            $this->set(compact(['prijemci', 'info', 'aliasy']));
        }
    }

    function podlePoskytovateluIndex()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => 'self']);
    }

    function podleZdrojeFinanciDetail()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační úřady' => '/podle-poskytovatelu', 'Detail finančního zdroje' => 'self']);

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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační úřady' => '/podle-poskytovatelu', 'Detail finančního zdroje (kompletní)' => 'self']);

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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační úřady' => '/podle-poskytovatelu', 'Detail finančního zdroje (rok)' => 'self']);
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

    function detailRozpoctoveObdobi()
    {
        $data = $this->RozpoctoveObdobi->find('all', [
            'conditions' => [
                'idObdobi' => $this->request->getParam('id')
            ],
            'contain' => [
                'Rozhodnuti',
                'CiselnikDotaceTitulv01',
                'CiselnikUcelZnakv01',
                'Rozhodnuti.CiselnikDotacePoskytovatelv01',
                'Rozhodnuti.CiselnikFinancniProstredekCleneniv01',
                'Rozhodnuti.CiselnikFinancniZdrojv01',
                'Rozhodnuti.Dotace'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $this->set(compact(['data']));
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

    public function znakUceluDotacnichTitulu()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => '/ciselniky', 'Účel dotačních titulů' => 'self']);
        if ($this->request->is('ajax')) {
            $znaky = $this->CiselnikUcelZnakv01->find('all');
            $counts = $this->CiselnikUcelZnakDotacniTitulv01->find('list', [
                'fields' => [
                    'idUcelZnak',
                    'CNT' => 'COUNT(*)'
                ],
                'keyField' => 'idUcelZnak',
                'valueField' => 'CNT',
                'group' => [
                    'idUcelZnak'
                ]
            ])->enableHydration(false)->toArray();
            $_serialize = false;

            $this->set(compact(['znaky', 'counts', '_serialize']));
        } else {
            $roky = $this->CiselnikUcelZnakv01->find('all', [
                'fields' => [
                    'ROK' => 'DISTINCT(YEAR(zaznamPlatnostOdDatum))'
                ],
                'order' => [
                    'ROK' => 'DESC'
                ]
            ])->enableHydration(false)->toArray();
            $this->set(compact(['roky']));
        }
    }

    public function znakUceluDotacnichTituluDetail()
    {
        $rok = $this->request->getParam('rok');
        $rok = filter_var($rok, FILTER_SANITIZE_NUMBER_INT);
        $kod = $this->request->getParam('kod');
        $kod = filter_var($kod, FILTER_SANITIZE_NUMBER_INT);

        $data = $this->CiselnikUcelZnakv01->find('all', [
            'conditions' => [
                'ucelZnakKod' => $kod,
                'zaznamPlatnostOdDatum' => $rok . '-01-01 00:00:00'
            ],
            'contain' => [
                'CiselnikUcelZnakDotacniTitulv01',
                'CiselnikUcelZnakDotacniTitulv01.CiselnikDotaceTitulv01'
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $this->set(compact('data'));
    }

    public function detailDotacniTitul()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Dotační tituly' => '/dotacni-tituly', 'Detail dotačního titulu' => 'self']);
        $titul = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'dotaceTitulKod' => $this->request->getParam('kod')
            ],
            'contain' => [
                'CiselnikStatniRozpocetKapitolav01',
                'CiselnikDotaceTitulStatniRozpocetUkazatelv01.CiselnikStatniRozpocetUkazatelv01'
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

    public function ciselniky()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Číselníky' => 'self']);
    }

    public function mmrPodOpatreni()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy MMR' => '/operacni-programy-mmr', 'MMR PodOpatření' => 'self']);
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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy MMR' => '/operacni-programy-mmr', 'MMR Opatření' => 'self']);
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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy MMR' => '/operacni-programy-mmr', 'MMR Priorita' => 'self']);
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
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Operační programy MMR' => '/operacni-programy-mmr', 'Detail OP' => 'self']);
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


        if ($this->request->is('ajax')) {

            $cache_tag_statu_top_100 = 'detail_statu_top_100_' . sha1($stat->statKod3Znaky);
            $biggest = Cache::read($cache_tag_statu_top_100, 'long_term');
            if ($biggest === false) $biggest = [];

            $_serialize = false;
            $this->set(compact(['stat', 'historie', 'biggest', '_serialize']));
        } else {
            $biggest = [];
            $this->set(compact(['stat', 'historie', 'biggest']));
            $this->set(compact(['stat', 'historie', 'biggest']));
        }

        $this->set(compact(['stat', 'historie', 'biggest']));
    }

    public function investicniPobidkyCzechInvest()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Investiční Pobídky - CzechInvest' => 'self']);
        if ($this->request->is('ajax')) {
            $_serialize = false;
            $pobidky = $this->InvesticniPobidky->find('all');
            $this->set(compact(['_serialize', 'pobidky']));
        }
    }

    public function investicniPobidkyCzechInvestDetail()
    {
        $data = $this->InvesticniPobidky->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('id')
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $this->set(compact(['data']));
    }

    public function konsolidaceIndex()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Konsolidovaní příjemci' => 'self']);
        $holdingy = $this->Companies->find('all', [
            'contain' => [
                'Owner'
            ],
            'conditions' => [
                'type_id' => 1
            ]
        ]);
        $this->set(compact('holdingy'));
    }

    public function konsolidaceVlastnik()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Konsolidovaní příjemci' => '/konsolidace-holdingy', 'Detail vlastníka holdingů' => 'self']);
        $owner = $this->Companies->find('all', [
            'conditions' => [
                'Companies.id' => $this->request->getParam('id'),
                'type_id' => 4
            ],
            'contain' => [
                'Holdings',
                'States'
            ]
        ])->first();
        $id_holdingu = [];
        foreach ($owner->holdings as $h) $id_holdingu[] = $h->id;
        if (empty($owner)) throw new NotFoundException();
        $holdingy = $this->Owners->find('all', [
            'conditions' => [
                'holding_id IN' => $id_holdingu
            ],
            'contain' => [
                'Companies'
            ]
        ]);


        /** @var Consolidation[] $subsidiaries */
        $subsidiaries = $this->Consolidations->find('all', [
            'conditions' => [
                'holding_id IN' => $id_holdingu
            ],
            'contain' => [
                'Subsidiaries',
                'Attachments',
                'Subsidiaries.States',
                'Companies'
            ]
        ]);

        $subsidiaries_sums = $this->cacheSouctyPodleIco($subsidiaries);

        $this->set(compact(['owner', 'holdingy', 'subsidiaries', 'subsidiaries_sums']));
    }

    private function cacheSouctyPodleIco($subsidiaries)
    {
        /** @var Consolidation[] $subsidiaries */
        $subsidiaries_sums = [];

        foreach ($subsidiaries as $s) {
            if ($s->subsidiary->ico < 1) {
                $subsidiaries_sums[$s->subsidiary->ico][$s->year] = [0, 0, 0, 0];
                continue;
            }
            if ($s->year < 1900 || $s->year > 2030) continue;
            if (isset($subsidiaries_sums[$s->subsidiary->ico]) && isset($subsidiaries_sums[$s->subsidiary->ico][$s->year])) continue;

            $cache_tag_ico_sum_rozhodnuti = 'sum_rozhodnuti_ico_' . sha1($s->subsidiary->ico) . '_rok_' . $s->year;
            $cache_tag_ico_sum_spotrebovano = 'sum_spotrebovano_ico_' . sha1($s->subsidiary->ico) . '_rok_' . $s->year;
            $cache_tag_ico_sum_pobidky = 'sum_pobidky_ico_' . sha1($s->subsidiary->ico) . '_rok_' . $s->year;
            $cache_tag_ico_sum_strukturalni_fondy = 'sum_strukturalni_fondy_ico_' . sha1($s->subsidiary->ico) . '_rok_' . $s->year;

            //Cache::delete($cache_tag_ico_sum_spotrebovano, 'long_term');
            //Cache::delete($cache_tag_ico_sum_rozhodnuti, 'long_term');
            //Cache::delete($cache_tag_ico_sum_pobidky, 'long_term');
            //Cache::delete($cache_tag_ico_sum_strukturalni_fondy, 'long_term');

            $sum_rozhodnuti = Cache::read($cache_tag_ico_sum_rozhodnuti, 'long_term');
            $sum_spotrebovano = Cache::read($cache_tag_ico_sum_spotrebovano, 'long_term');
            $sum_pobidky = Cache::read($cache_tag_ico_sum_pobidky, 'long_term');
            $sum_strukturalni_fondy = Cache::read($cache_tag_ico_sum_strukturalni_fondy, 'long_term');

            if ($sum_rozhodnuti === false) {
                $sum_rozhodnuti = $this->Rozhodnuti->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaRozhodnuta)'
                        ],
                        'contain' => [
                            'Dotace.PrijemcePomoci'
                        ],
                        'conditions' => [
                            'PrijemcePomoci.ico' => $s->subsidiary->ico,
                            'rokRozhodnuti' => $s->year,
                            'refundaceIndikator' => 0
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_ico_sum_rozhodnuti, $sum_rozhodnuti, 'long_term');
            }

            if ($sum_spotrebovano === false) {
                $sum_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaSpotrebovana)'
                        ],
                        'contain' => [
                            'Rozhodnuti',
                            'Rozhodnuti.Dotace.PrijemcePomoci'
                        ],
                        'conditions' => [
                            'PrijemcePomoci.ico' => $s->subsidiary->ico,
                            'rozpoctoveObdobi' => $s->year,
                            'refundaceIndikator' => 0
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_ico_sum_spotrebovano, $sum_spotrebovano, 'long_term');
            }

            if ($sum_pobidky === false) {
                $sum_pobidky = $this->InvesticniPobidky->find('all', [
                        'fields' => [
                            'sum' => 'SUM(investiceCZK)'
                        ],
                        'conditions' => [
                            'rozhodnutiRok' => $s->year,
                            'ico' => $s->subsidiary->ico
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_ico_sum_pobidky, $sum_pobidky, 'long_term');
            }

            if ($sum_strukturalni_fondy === false) {
                $sum_strukturalni_fondy = $this->StrukturalniFondy->find('all', [
                    'fields' => [
                        'sum' => 'SUM(verejneZdrojeCelkem)'
                    ],
                    'conditions' => [
                        'zadatelIco' => $s->subsidiary->ico,
                        'YEAR(datumPodpisuSmlouvy)' => $s->year
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_ico_sum_strukturalni_fondy, $sum_strukturalni_fondy, 'long_term');
            }

            $subsidiaries_sums[$s->subsidiary->ico][$s->year] = [$sum_rozhodnuti, $sum_spotrebovano, $sum_pobidky, $sum_strukturalni_fondy];
        }
        return $subsidiaries_sums;
    }

    public function konsolidaceHolding()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Konsolidovaní příjemci' => '/konsolidace-holdingy', 'Detail holdingu' => 'self']);
        $holding = $this->Companies->find('all', [
            'conditions' => [
                'Companies.id' => $this->request->getParam('id'),
                'type_id' => 1
            ],
            'contain' => [
                'Subsidiaries',
                'States'
            ]
        ])->first();
        if (empty($holding)) throw new NotFoundException();

        $owners = $this->Owners->find('all', [
            'conditions' => [
                'holding_id' => $holding->id
            ],
            'contain' => [
                'Owner'
            ]
        ]);

        /** @var Consolidation[] $subsidiaries */
        $subsidiaries = $this->Consolidations->find('all', [
            'conditions' => [
                'holding_id' => $holding->id
            ],
            'contain' => [
                'Subsidiaries',
                'Attachments',
                'Subsidiaries.States'
            ]
        ]);

        $subsidiaries_sums = $this->cacheSouctyPodleIco($subsidiaries);

        $this->set(compact(['holding', 'owners', 'subsidiaries', 'subsidiaries_sums']));
    }

    public function daryPolitickymStranam()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Dárci politických stran' => 'self']);
        $data = $this->Companies->find('all', [
            'conditions' => [
                'type_id' => 3
            ]
        ]);
        $sums = [];
        $years = [2012, 2013, 2014, 2015, 2016];

        /** @var Company $strana */
        foreach ($data as $strana) {
            foreach ($years as $y) {
                $cache_tag = 'sum_politicka_strana_' . $strana->id . '_rok_' . $y;
                $sum = Cache::read($cache_tag, 'long_term');
                if ($sum === false) {
                    $sum = $this->Transactions->find('all', [
                            'fields' => [
                                'sum' => 'SUM(amount)'
                            ],
                            'conditions' => [
                                'year' => $y,
                                'recipient_id' => $strana->id
                            ]
                        ])->first()->sum + 0;
                    Cache::write($cache_tag, $sum, 'long_term');
                }
                $sums[$strana->id][$y] = $sum;
            }
        }

        $this->set(compact(['data', 'sums']));
    }

    public function daryPolitickymStranamDetail()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Příjemci' => '/podle-prijemcu', 'Dárci politických stran' => '/dary-politickym-stranam', 'Detail politické strany' => 'self']);
        $strana = $this->Companies->find('all', [
            'conditions' => [
                'type_id' => 3,
                'id' => $this->request->getParam('id')
            ]
        ])->first();
        if (empty($strana)) throw new NotFoundException();

        $sums = [];
        $years = [2012, 2013, 2014, 2015, 2016];
        foreach ($years as $y) {
            $cache_tag = 'sum_politicka_strana_' . $strana->id . '_rok_' . $y;
            $sum = Cache::read($cache_tag, 'long_term');
            if ($sum === false) {
                $sum = $this->Transactions->find('all', [
                        'fields' => [
                            'sum' => 'SUM(amount)'
                        ],
                        'conditions' => [
                            'year' => $y,
                            'recipient_id' => $strana->id
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag, $sum, 'long_term');
            }
            $sums[$strana->id][$y] = $sum;
        }

        $transactions = $this->Transactions->find('all', [
            'conditions' => [
                'recipient_id' => $strana->id
            ],
            'contain' => [
                'Donor',
                'Attachments'
            ]
        ]);

        $audits = $this->Audits->find('all', [
            'conditions' => [
                'company_id' => $strana->id
            ],
            'contain' => [
                'Auditors'
            ]
        ]);

        $this->set(compact(['strana', 'sums', 'transactions', 'audits']));
    }

    public function hlidacSmluv()
    {
        if ($this->request->is('ajax')) {
            $apiAuth = "Token bd4f624f72c54f7fadb3c01125300dd9";
            $http = new Client();
            $params = (object)[
                'projektIdnetifikator' => $this->request->getQuery('identifikatorProjektu'),
                'ico' => $this->request->getQuery('ico'),
                'podpisDatum' => $this->request->getQuery('podpisDatum')
            ];

            $data_string = $http->post('http://localhost:8080/smlouvy/search', json_encode($params), [
                'headers' => [
                    'Content-Type' => 'application/json; charset=UTF-8',
                    ''
                ]
            ])->body();
            $data_obj = json_decode($data_string);

            $data_arr = [];
            $total = 0;

            $html = new HtmlHelper(new View());

            foreach ($data_obj as $i) {
                $data_arr[] = [
                    $i->rank,
                    $html->link($i->predmet, $i->odkaz),
                    $html->link($i->VkladatelDoRejstriku->nazev, '/prijemce-dotaci/ico', ['ico' => $i->VkladatelDoRejstriku->ico]),
                    isset($i->hodnotaVcetneDph) ? DPUTILS::currency($i->hodnotaVcetneDph) : DPUTILS::currency(0),
                    $html->link($i->Platce->nazev, '/prijemce-dotaci/ico', ['ico' => $i->Platce->ico]),
                    isset($i->Prijemce[0]) ? $html->link($i->Prijemce[0]->nazev, '/prijemce-dotaci/ico', ['ico' => isset($i->Prijemce[0]->ico) ? $i->Prijemce[0]->ico : 0]) : "",
                    $html->link('Hlídač Smluv', 'https://www.hlidacsmluv.cz/Detail/' . $i->identifikator->idVerze) . '<br/>' .
                    $html->link('Registr Smluv', $i->odkaz)
                ];
                $total++;
            }

            $out = [
                'draw' => 1,
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data_arr
            ];

            echo json_encode($out);
            die();
        } else {
            throw new NotFoundException();
        }
    }

    public function icoDotaceDistance()
    {
        $icoToCheck = [71230025, 10556745, 12128457, 66689317, 72147202, 73032263, 76268276, 76288676, 41555686, 75725525, 70887551, 74430220, 74430459, 68017634, 70674434, 5007984, 13441841, 2843137, 74133888, 583219, 75476002, 75725592, 71167501, 74915185, 11259426, 3554155, 10531181, 70447471, 12411965, 13020030, 71785094, 76630862, 2484714, 3754391, 72279869, 12783498, 849235, 4981898, 75704480, 3754626, 13702629, 12080471, 4195272, 1655434, 13445316, 75691043, 1852272, 1498827, 69544361, 27637824, 4876695, 3589943, 3636810, 3897915, 11557028, 12640760, 12073652, 854875, 962899, 2672758, 73583022, 16323041, 72636688, 380822, 2485796, 3551865, 3002497, 76153363, 2882418, 3509851, 69282315, 71211519, 4803400, 1307908, 3075397, 3503704, 10596950, 3487458, 10603883, 13478788, 68061731, 68352689, 73521647, 2099233, 4787552, 5015278, 3000303, 3488209, 3554368, 3585824, 10053107, 3305171, 5607329, 13090208, 69735107, 854921, 26706041, 2792397, 2946360, 3535347, 2667878, 2682915, 3310507, 4817753, 3610098, 72011076, 74778056, 2659654, 5586844, 5479355, 1772937, 2314312, 2663961, 2897466, 3201040, 3923517, 4707621, 2314355, 11348283, 4086864, 5047994, 11030097, 72324066, 12083275, 43534163, 75389223, 72508931, 72755407, 28624165, 4970357, 2027887, 72474017, 3499910, 3282813, 3404188, 3479471, 3799557, 3801896, 3394891, 713376, 3568211, 4988710, 4807197, 4886623, 2359308, 2998891, 3116760, 3203271, 3439160, 5496144, 12693456, 4651804, 13566202, 74461401, 2688182, 4722400, 4934113, 4939506, 4997344, 4997379, 5092809, 5307601, 2763745, 3525694, 5575231, 1818619, 2026023, 3393879, 3469018, 2948656, 4862970];
        $distance = [];

        foreach ($icoToCheck as $ico) {
            /** @var Dotace $prvni_dotace */
            $prvni_dotace = $this->Dotace->find('all', [
                'conditions' => [
                    'PrijemcePomoci.ico' => $ico
                ],
                'order' => [
                    'Dotace.podpisDatum' => 'ASC'
                ],
                'contain' => [
                    'PrijemcePomoci',
                    'Rozhodnuti'
                ]
            ])->first();
            /** @var MFCRPAP $mfcr_pap */
            $mfcr_pap = $this->MFCRPAP->find('all', [
                'conditions' => [
                    'ico' => $ico
                ]
            ])->first();

            $distance[] = (object)[
                'dotace' => $prvni_dotace,
                'pap' => $mfcr_pap
            ];
        }

        $this->set(compact(['distance']));
    }

    public function vlastniSestavy()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Zajímavé datové sestavy' => 'self']);
        $this->set('title', 'Zajímavé datové sestavy');
    }

    public function openData()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'OpenData' => 'self']);

    }

    public function dotinfo()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'DotInfo.cz' => 'self']);
        $poskytovatele = $this->Dotinfo->find('all', [
            'fields' => [
                'ico' => 'DISTINCT(poskytovatelIco)'
            ],
            'order' => [
                'ico' => 'ASC'
            ]
        ])->enableHydration(false)->toArray();
        $ids = [];
        foreach ($poskytovatele as $p) {
            $ids[] = $p['ico'];
        }
        $poskytovatele = $this->Dotinfo->find('all', [
            'fields' => [
                'poskytovatelIco' => 'DISTINCT(poskytovatelIco)',
                'poskytovatelNazev'
            ],
            'conditions' => [
                'poskytovatelIco IN' => $ids
            ]
        ])->enableHydration(false)->toArray();

        $sums = [];
        foreach ($poskytovatele as $p) {
            $sums[$p['poskytovatelIco']]['sumSchvaleno'] = $this->Dotinfo->find('all', [
                'fields' => [
                    'sum' => 'SUM(castkaSchvalena)'
                ],
                'conditions' => [
                    'poskytovatelIco' => $p['poskytovatelIco']
                ]
            ])->first()->sum;
        }

        $this->set(compact(['poskytovatele', 'sums']));
    }

    public function dotinfoPoskytovatel()
    {
        $poskytovatel = $this->Dotinfo->find('all', [
            'conditions' => [
                'poskytovatelIco' => $this->request->getParam('ico')
            ]
        ])->first();
        if (empty($poskytovatel)) throw new NotFoundException();

        if ($this->request->is('ajax')) {
            $data = $this->Dotinfo->find('all', [
                'conditions' => [
                    'poskytovatelIco' => $poskytovatel->poskytovatelIco
                ]
            ]);
            $_serialize = false;
            $this->set(compact(['poskytovatel', 'data', '_serialize']));
        } else {

            $aliasy = $this->Dotinfo->find('all', [
                'fields' => [
                    'nazev' => 'poskytovatelNazev',
                    'count' => 'COUNT(*)'
                ],
                'conditions' => [
                    'poskytovatelIco' => $this->request->getParam('ico')
                ]
            ]);

            $sum = $this->Dotinfo->find('all', [
                'fields' => [
                    'sum' => 'SUM(castkaSchvalena)'
                ],
                'conditions' => [
                    'poskytovatelIco' => $poskytovatel->poskytovatelIco
                ]
            ])->first()->sum;

            $count = $this->Dotinfo->find('all', [
                'conditions' => [
                    'poskytovatelIco' => $poskytovatel->poskytovatelIco
                ]
            ])->count();

            $this->set(compact(['poskytovatel', 'aliasy', 'sum', 'count']));
        }
    }

    public function dotinfoDetail()
    {
        $data = $this->Dotinfo->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('id')
            ]
        ])->first();
        if (empty($data)) throw new NotFoundException();

        $this->set(compact('data'));
    }

}