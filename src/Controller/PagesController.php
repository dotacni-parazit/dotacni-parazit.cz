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
        $this->loadModel('Rozhodnuti');
        $this->loadModel('Dotace');
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('AdresaSidlo');
        $this->loadModel('AdresaBydliste');
        $this->loadModel('RozpoctoveObdobi');
        $this->loadModel('PrijemcePomoci');
        $this->loadModel('CiselnikCedrOperacniProgramv01');
        $this->loadModel('CiselnikMmrOperacniProgramv01');
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
        $this->set(compact(['data', 'year']));
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

    public function fyzickeOsoby()
    {

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
        ])->hydrate(true)->limit(110000);

        $_serialize = false;

        $this->set(compact(['osoby', '_serialize']));
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
            $cache_tag_okres_soucet = 'soucet_okres_' . sha1($okres->id);
            $cache_tag_okres_soucet_spotrebovano = 'soucet_okres_spotrebovano_' . sha1($okres->id);

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
                        'CiselnikOkresv01.okresKod' => $okres->okresKod
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
                        'CiselnikOkresv01.okresKod' => $okres->okresKod
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
            $cache_tag_obec_soucet = 'obec_soucet_' . sha1($obec->id);
            $cache_tag_obec_soucet_spotrebovano = 'obec_soucet_spotrebovano_' . sha1($obec->id);

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
                        'CiselnikObecv01.obecKod' => $obec->obecKod
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
                        'CiselnikObecv01.obecKod' => $obec->obecKod
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

    public function detailDotacniTitul()
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
        ])->hydrate(false)->toArray();
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
        ])->limit(1000);

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
                        'iriDotacniTitul' => $r->idDotaceTitul
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
                        'iriDotacniTitul' => $r->idDotaceTitul
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

    public function detailKraje()
    {
        $kraj = $this->CiselnikKrajv01->find('all', [
            'conditions' => [
                'krajKod' => $this->request->getParam('id')
            ]
        ]);

        $this->set(compact(['kraj']));
    }

    public function ciselniky()
    {

    }

    private function lineargradient($ra, $ga, $ba, $rz, $gz, $bz, $iterationnr)
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

}