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
use Cake\Network\Exception\NotFoundException;


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

        throw new NotFoundException();
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
                        'iriPoskytovatelDotace' => $d->id,
                        'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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
                        'rokRozhodnuti' => $year,
                        'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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

        if (empty($poskytovatel)) throw new NotFoundException();

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
        $this->loadModel('CiselnikDotacePoskytovatelv01');
        $this->loadModel('Rozhodnuti');

        $year = $this->request->getParam('year');

        $poskytovatel = $this->CiselnikDotacePoskytovatelv01->find('all', [
            'conditions' => [
                'DotacePoskytovatelKod' => $this->request->getParam('id')
            ]
        ])->first();

        if (empty($poskytovatel)) throw new NotFoundException();

        $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
        $year_sum = Cache::read($cache_key_year, 'long_term');
        if (!$year_sum) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id,
                    'rokRozhodnuti' => $year,
                    'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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
        $multiple = $this->request->getQuery('multiple');
        $multiple = filter_var($multiple, FILTER_SANITIZE_STRING);
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

        $this->set(compact(['ico', 'name', 'multiple']));
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

    public function podleZdrojeFinanci()
    {
        $this->loadModel('Rozhodnuti');

        $zdroje = $this->CiselnikFinancniZdrojv01->find('all')->toArray();
        $sums = [];
        foreach ($zdroje as $z) {
            // soucet spotrebovana
            $cache_tag = 'soucet_podle_zdroje_' . sha1($z->id);
            $sum = Cache::read($cache_tag, 'long_term');
            $sums[$z->financniZdrojKod]['SUM'] = $sum;
            if (!$sum) {
                $z_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(RozpoctoveObdobi.castkaSpotrebovana)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $z->id,
                        'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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
            if (!$sum) {
                $z_sum = $this->Rozhodnuti->find('all', [
                    'fields' => [
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriFinancniZdroj' => $z->id,
                        'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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

    function podleZdrojeFinanciDetail()
    {
        $this->loadModel('Rozhodnuti');

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
        if (!$zdroj_years) {
            $zdroj_years = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'roky' => 'DISTINCT(rokRozhodnuti)'
                ],
                'conditions' => [
                    'iriFinancniZdroj' => $zdroj->id,
                    'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
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

    public function podleZdrojeFinanciDetailComplete()
    {
        $this->loadModel('Rozhodnuti');

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
        $this->loadModel('Rozhodnuti');

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
        if (!$year_sum) {
            $year_sum = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'SUM' => 'SUM(castkaRozhodnuta)'
                ],
                'conditions' => [
                    'iriFinancniZdroj' => $zdroj->id,
                    'rokRozhodnuti' => $year,
                    'iriCleneniFinancnichProstredku !=' => 'http://cedropendata.mfcr.cz/c3lod/cedr/resource/ciselnik/FinancniProstredekCleneni/v01/15/20070101'
                ]
            ])->first()->toArray();
            $year_sum = $year_sum['SUM'];
            Cache::write($cache_key_year, $year_sum, 'long_term');
        }

        $this->set(compact(['year', 'zdroj', 'year_sum']));
    }

    public function podleZdrojeFinanciCompleteAjax()
    {
        $this->loadModel('Rozhodnuti');

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

    public function fyzickeOsoby()
    {

    }

    public function fyzickeOsobyAjax()
    {
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('Rozhodnuti');

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
                'ico' => 0
            ]
        ])->contain([
            'CiselnikStatv01',
            'AdresaBydliste'
        ])->hydrate(true)->limit(110000);

        $_serialize = false;

        $this->set(compact(['osoby', '_serialize']));
    }

    public function podleSidlaPrijemce()
    {
        $this->loadModel('CiselnikKrajv01');
        $this->loadModel('CiselnikStatv01');
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('Rozhodnuti');
        $this->loadModel('RozpoctoveObdobi');

        $kraje = $this->CiselnikKrajv01->find('all', [
            'fields' => [
                'krajNazev' => 'DISTINCT(krajNazev)'
            ]
        ]);
        $staty = $this->CiselnikStatv01->find('all', [
            'fields' => [
                'CiselnikStatv01.statNazev',
                'CiselnikStatv01.id'
            ]
        ]);
        $soucet_staty = [];
        $soucet_staty_spotrebovano = [];

        foreach ($staty as $stat) {
            // soucet rozhodnutych
            $cache_tag = "soucet_stat_" . sha1($stat->id);
            $soucet = Cache::read($cache_tag, 'long_term');
            if ($soucet === false) {
                if ($stat->id == "http://cedropendata.mfcr.cz/c3lod/csu/resource/ciselnik/Stat/v01/CZE/19930101") {
                    // manually uncomment with new cache
                    // $sum = 4994037133233;
                } else {
                    $sum = $this->Rozhodnuti->find('all', [
                            'fields' => [
                                'sum' => 'SUM(castkaRozhodnuta)'
                            ],
                            'conditions' => [
                                'PrijemcePomoci.iriStat' => $stat->id
                            ],
                            'contain' => [
                                'Dotace.PrijemcePomoci'
                            ]
                        ])->first()->sum + 0;
                }
                Cache::write($cache_tag, $sum, 'long_term');
                $soucet = $sum;
            }
            $soucet_staty[$stat->id] = $soucet;


            // soucet spotrebovaanych
            $cache_tag_spotrebovano = "soucet_stat_spotrebovano_" . sha1($stat->id);
            $soucet_spotrebovano = Cache::read($cache_tag_spotrebovano, 'long_term');
            if ($soucet_spotrebovano === false) {
                if ($stat->id == "http://cedropendata.mfcr.cz/c3lod/csu/resource/ciselnik/Stat/v01/CZE/19930101") {
                    $sum_spotrebovano = 4328744309651;
                } else {
                    $sum_spotrebovano = $this->RozpoctoveObdobi->find('all', [
                            'fields' => [
                                'sum' => 'SUM(castkaSpotrebovana)'
                            ],
                            'conditions' => [
                                'PrijemcePomoci.iriStat' => $stat->id
                            ],
                            'contain' => [
                                'Rozhodnuti.Dotace.PrijemcePomoci'
                            ]
                        ])->first()->sum + 0;
                }
                Cache::write($cache_tag_spotrebovano, $sum_spotrebovano, 'long_term');
                $soucet_spotrebovano = $sum_spotrebovano;
            }
            $soucet_staty_spotrebovano[$stat->id] = $soucet_spotrebovano;
        }
        $this->set(compact(['kraje', 'staty', 'soucet_staty', 'soucet_staty_spotrebovano']));
    }

}