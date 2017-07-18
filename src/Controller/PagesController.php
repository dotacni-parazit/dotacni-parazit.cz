<?php
/**
 * Created by PhpStorm.
 * User: smarek
 * Date: 6/4/17
 * Time: 9:10 PM
 */

namespace App\Controller;

use Cake\Cache\Cache;
use Cake\Event\Event;
use Cake\I18n\Number;


class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CiselnikCedrOperacniProgramv01');
        $this->loadModel('CiselnikMmrOperacniProgramv01');
        $this->loadModel('CiselnikFinancniZdrojv01');
        $this->loadModel('CiselnikPravniFormav01');
        $this->loadModel('CiselnikStatniRozpocetKapitolav01');
        $this->loadModel('CiselnikStatniRozpocetUkazatelv01');
        $this->loadModel('RozpoctoveObdobi');
        $this->loadModel('CiselnikDotaceTitulv01');
    }

    public function index()
    {
    }

    public function cedrOperacniProgramy()
    {
        $cedr = $this->CiselnikCedrOperacniProgramv01->find('all', [
            'order' => [
                'operacaniProgramKod' => 'DESC'
            ]
        ]);
        $this->set(compact('cedr'));
    }

    public function mmrOperacniProgramy()
    {
        $mmr = $this->CiselnikMmrOperacniProgramv01->find('all', [
            'order' => [
                'operacaniProgramKod' => 'DESC'
            ]
        ]);
        $this->set(compact('mmr'));
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
        $data = $this->CiselnikStatniRozpocetUkazatelv01->find('all', [
            'order' => [
                'statniRozpocetUkazatelKod' => 'ASC'
            ]
        ]);
        $this->set(compact('data'));
    }

    public function rozpoctoveObdobi()
    {
        $year = $this->request->getParam('year');
        $kod = $this->request->getQuery('kod');
        $conds = [];
        if ($year != null) {
            $conds['rozpoctoveObdobi'] = $year;
        }
        if ($kod != null) {
            $conds['iriDotacniTitul LIKE'] = 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/DotaceTitul/v01/' . $kod . '%';
        }
        $data = $this->RozpoctoveObdobi->find('all', [
            'limit' => 1000,
            'order' => [
                'castkaSpotrebovana' => 'DESC',
                'rozpoctoveObdobi' => 'DESC'
            ],
            'conditions' => $conds,
            'contain' => [
                'CiselnikDotaceTitulv01'
            ]
        ]);
        $this->set(compact('data'));
    }

    public function dotacniTituly()
    {
        $data = $this->CiselnikStatniRozpocetKapitolav01->find('all', [
            'contain' => [
                'CiselnikDotaceTitulv01'
            ]
        ]);
        $this->set(compact('data'));
    }

    public function filtr()
    {
        $this->set('kapitoly', $this->CiselnikStatniRozpocetKapitolav01->find('all')->toArray());
    }

    public function cbFiltrKapitoly()
    {
        $tituly = $this->CiselnikDotaceTitulv01->find('all', [
            'conditions' => [
                'statniRozpocetKapitolaKod IN' => $this->request->getData()['kapitoly']
            ],
            'fields' => [
                'idDotaceTitul',
                'dotaceTitulKod',
                'dotaceTitulNazev',
                'zaznamPlatnostOdDatum',
                'zaznamPlatnostDoDatum'
            ]
        ])->toArray();
        echo json_encode($tituly);
        die();
    }

    /*
     * Finalni vystupy
     * **/

    /*
     * Podle poskytovatelu
     * **/

    public function podlePoskytovatelu()
    {
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $this->set('title', 'Poskytovatelé Dotací');

        $data = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'order' => [
                'CiselnikDotacePoskytovatelv01.dotacePoskytovatelKod' => 'ASC'
            ]
        ]);
        $counts = [];
        foreach ($data as $d) {
            $cache_key = 'sum_rozhodnuti_podle_poskytovatele_' . sha1($d->id);
            $cnt = Cache::read($cache_key, 'long_term');
            if (!$cnt || empty($cnt)) {
                // cache overall sum
                $cnt = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'iriPoskytovatelDotace',
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriPoskytovatelDotace' => $d->id
                    ]
                ])->first()->SUM;
                Cache::write($cache_key, $cnt, 'long_term');
            }
            $counts[$d->id] = $cnt;
            $d->sum = $cnt;
        }
        $sort = $this->request->getQuery('sort');
        if ($sort) {
            $data = $data->toArray();
            if ($sort === "sum") {
                usort($data, function ($a, $b) {
                    return $b->sum - $a->sum;
                });
            } else if ($sort === "poskytovatel") {
                usort($data, function ($a, $b) {
                    return strcmp($a->dotacePoskytovatelNazev, $b->dotacePoskytovatelNazev);
                });
            }
        }
        $this->set(compact(['data', 'counts']));
    }

    public function podlePoskytovateluDetail()
    {
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $cache_key = 'sum_rozhodnuti_podle_poskytovatele_years_' . sha1($poskytovatel->id);
        $poskytovatel_years = Cache::read($cache_key, 'long_term');
        $year_to_sum = [];
        $sum = 0;
        if (!$poskytovatel_years) {
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
            $year_sum = Cache::read($cache_key_year, 'long_term');
            if (!$year_sum) {
                $year_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriPoskytovatelDotace' => $poskytovatel->id,
                        'rokRozhodnuti' => $year
                    ]
                ])->first()->toArray();
                $year_sum = $year_sum['SUM'];
                Cache::write($cache_key_year, $year_sum, 'long_term');
            }
            $year_to_sum[$year] = $year_sum;
            $sum += $year_sum;
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
                'CiselnikFinancniProstredekCleneniv01'
            ]
        ]);

        $this->set(compact(['poskytovatel', 'year_to_sum', 'poskytovatel_biggest', 'sum']));
    }

    public function podlePoskytovateluDetailComplete()
    {
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $this->set(compact(['poskytovatel', 'year_to_sum', 'poskytovatel_biggest', 'sum']));
    }

    public function podlePoskytovateluDetailCompleteAjax()
    {
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

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

    public function podlePoskytovateluDetailRok(){
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $year = $this->request->getParam('year');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
        $year_sum = Cache::read($cache_key_year, 'long_term');
        if (!$year_sum) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id,
                    'rokRozhodnuti' => $year
                ]
            ])->first()->toArray();
            $year_sum = $year_sum['SUM'];
            Cache::write($cache_key_year, $year_sum, 'long_term');
        }

        $this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací');

        $this->set(compact(['poskytovatel', 'year', 'sum', 'year_sum']));
    }

    public function podlePoskytovateluDetailRok2()
    {
        $year = $this->request->getParam('year');

        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
        $year_sum = Cache::read($cache_key_year, 'long_term');
        if (!$year_sum) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id,
                    'rokRozhodnuti' => $year
                ]
            ])->first()->toArray();
            $year_sum = $year_sum['SUM'];
            Cache::write($cache_key_year, $year_sum, 'long_term');
        }

        $data = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'rokRozhodnuti' => $year,
                'iriPoskytovatelDotace' => $poskytovatel->id
            ],
            'contain' => [
                'Dotace',
                'Dotace.PrijemcePomoci',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01'
            ],
            'order' => [
                'castkaRozhodnuta' => 'DESC'
            ]
        ]);

        $this->set(compact(['year', 'year_sum', 'poskytovatel', 'data']));
    }

    public function detailDotace()
    {
        $this->loadModel('Dotace');
        $this->loadModel('Rozhodnuti');

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
                'CiselnikMmrGrantoveSchemav01'
            ]
        ])->first();

        $rozhodnuti = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'idDotace' => $dotace->idDotace
            ],
            'contain' => [
                'CiselnikDotacePoskytovatelv01',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01'
            ]
        ]);

        $this->set(compact(['dotace', 'rozhodnuti']));
    }

    /*
     * Podle prijemcu
     * **/

    public function detailPrijemcePomoci()
    {
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('Rozhodnuti');

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
                'RozpoctoveObdobi'

            ]
        ]);

        $this->set(compact(['prijemce', 'dotace', 'prijemci']));
    }

    public function podlePrijemcu()
    {
        $this->loadModel('PrijemcePomoci');

        $ico = $this->request->getQuery('ico');
        $ico = filter_var($ico, FILTER_SANITIZE_NUMBER_INT);
        $name = $this->request->getQuery('name');
        $name = filter_var($name, FILTER_SANITIZE_STRING);

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
        $this->set(compact(['ico', 'name']));
    }

    public function podleZdrojeFinanci()
    {
        $this->loadModel('Rozhodnuti');

        $zdroje = $this->CiselnikFinancniZdrojv01->find('all')->toArray();
        $sums = [];
        foreach ($zdroje as $z) {
            $cache_tag = 'soucet_podle_zdroje_' . sha1($z->id);
            $sum = Cache::read($cache_tag, 'long_term');
            $sums[$z->financniZdrojKod] = $sum;
            if (!$sum) {
                $z_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $z->id
                    ]
                ])->first()->toArray();
                Cache::write($cache_tag, $z_sum, 'long_term');
                $sums[$z->financniZdrojKod] = $z_sum;
            }
        }
        $data = [];
        foreach ($zdroje as $z) {
            $data[$z->financniZdrojKod] = [
                'nazev' => $z->financniZdrojNazev,
                'suma' => $sums[$z->financniZdrojKod]['SUM'],
                'id' => $z->financniZdrojKod
            ];
        }
        $sort = $this->request->getQuery('sort');
        if ($sort) {
            if ($sort === "sum") {
                usort($data, function ($a, $b) {
                    return $b['suma'] - $a['suma'];
                });
            } else if ($sort === "zdroj") {
                usort($data, function ($a, $b) {
                    return strcmp($a['nazev'], $b['nazev']);
                });
            }
        }
        $this->set(compact(['data']));
    }

    function podleZdrojeFinanciDetail()
    {
        $this->loadModel('Rozhodnuti');

        $zdroj = $this->CiselnikFinancniZdrojv01->find('all', [
            'conditions' => [
                'financniZdrojKod' => $this->request->getParam('kod')
            ]
        ])->first();

        $this->set('title', $zdroj->financniZdrojNazev . ' - Zdroj Financí');

        $cache_key = 'sum_rozhodnuti_podle_zdroje_years_' . sha1($zdroj->id);
        $zdroj_years = Cache::read($cache_key, 'long_term');
        $year_to_sum = [];
        $sum = 0;
        if (!$zdroj_years) {
            $zdroj_years = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'roky' => 'DISTINCT(rokRozhodnuti)'
                ],
                'conditions' => [
                    'iriFinancniZdroj' => $zdroj->id
                ]
            ])->toList();
            Cache::write($cache_key, $zdroj_years, 'long_term');
        }

        foreach ($zdroj_years as $year) {
            $year = $year['roky'];
            $cache_key_year = 'sum_rozhodnuti_podle_zdroje_year_' . $year . '_' . sha1($zdroj->id);
            $year_sum = Cache::read($cache_key_year, 'long_term');
            if (!$year_sum) {
                $year_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $zdroj->id,
                        'rokRozhodnuti' => $year
                    ]
                ])->first()->toArray();
                $year_sum = $year_sum['SUM'];
                Cache::write($cache_key_year, $year_sum, 'long_term');
            }
            $year_to_sum[$year] = $year_sum;
            $sum += $year_sum;
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
                'CiselnikFinancniProstredekCleneniv01'
            ]
        ]);

        $this->set(compact(['zdroj', 'zdroj_biggest', 'year_to_sum', 'sum']));
    }

    function detailRozhodnuti()
    {
        $this->loadModel('Rozhodnuti');
        $this->loadModel('RozpoctoveObdobi');

        $id = $this->request->getParam('id');
        $rozhodnuti = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'idRozhodnuti' => $id
            ],
            'contain' => [
                'Dotace',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01',
                'CiselnikDotacePoskytovatelv01'
            ]
        ])->first()->toArray();
        $rozpocet = $this->RozpoctoveObdobi->find('all', [
            'conditions' => [
                'idRozhodnuti' => $id
            ]
        ])->toArray();
        //debug($rozhodnuti->toArray());
        //debug($rozpocet->toArray());
        //die();
        $this->set(compact(['rozhodnuti', 'rozpocet']));
    }

}