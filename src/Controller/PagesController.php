<?php
/**
 * Created by PhpStorm.
 * User: smarek
 * Date: 6/4/17
 * Time: 9:10 PM
 */

namespace App\Controller;

use Cake\Cache\Cache;


class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Cache');
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
        $overview = $this->Cache->find('all');
        $this->set(compact('overview'));
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
            $cnt = Cache::read($cache_key);
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
                Cache::write($cache_key, $cnt);
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
        $poskytovatel_years = Cache::read($cache_key);
        $year_to_sum = [];
        if (!$poskytovatel_years) {
            $poskytovatel_years = $this->Rozhodnuti->find('all', [
                'fields' => [
                    'roky' => 'DISTINCT(rokRozhodnuti)'
                ],
                'conditions' => [
                    'iriPoskytovatelDotace' => $poskytovatel->id
                ]
            ])->toList();
            Cache::write($cache_key, $poskytovatel_years);
        }
        foreach ($poskytovatel_years as $year) {
            $year = $year['roky'];
            $cache_key_year = 'sum_rozhodnuti_podle_poskytovatele_year_' . $year . '_' . sha1($poskytovatel->id);
            $year_sum = Cache::read($cache_key_year);
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
                Cache::write($cache_key_year, $year_sum);
            }
            $year_to_sum[$year] = $year_sum;
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

        $this->set(compact(['poskytovatel', 'year_to_sum', 'poskytovatel_biggest']));
    }

    public function podlePoskytovateluDetailRok()
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
        $year_sum = Cache::read($cache_key_year);
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
            Cache::write($cache_key_year, $year_sum);
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
        ])->first();

        $dotace = $this->Rozhodnuti->find('all', [
            'conditions' => [
                'Dotace.idPrijemce' => $prijemce->idPrijemce
            ],
            'contain' => [
                'CiselnikFinancniProstredekCleneniv01',
                'CiselnikFinancniZdrojv01',
                'Dotace.CiselnikMmrOperacniProgramv01',
                'Dotace.CiselnikMmrPodprogramv01',
                'Dotace.CiselnikMmrPrioritav01',
                'Dotace.CiselnikMmrOpatreniv01',
                'Dotace.CiselnikMmrPodOpatreniv01',
                'Dotace.CiselnikMmrGrantoveSchemav01'
            ]
        ]);

        $this->set(compact(['prijemce', 'dotace']));
    }

}