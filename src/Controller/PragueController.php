<?php

namespace App\Controller;

use App\Model\Entity\GrantyPrahaZadatel;
use App\Model\Table\GrantyPrahaCastkyTable;
use App\Model\Table\GrantyPrahaProjektyTable;
use App\Model\Table\GrantyPrahaUsneseniTable;
use App\Model\Table\GrantyPrahaZadatelTable;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

/**
 * @property GrantyPrahaZadatelTable $GrantyPrahaZadatel
 * @property GrantyPrahaCastkyTable $GrantyPrahaCastky
 * @property GrantyPrahaUsneseniTable $GrantyPrahaUsneseni
 * @property GrantyPrahaProjektyTable $GrantyPrahaProjekty
 * */
class PragueController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        Configure::write('debug', true);
        $this->loadModel('GrantyPrahaZadatel');
        $this->loadModel('GrantyPrahaCastky');
        $this->loadModel('GrantyPrahaUsneseni');
        $this->loadModel('GrantyPrahaProjekty');
    }

    public function index()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Hlavní Město Praha' => 'self']);
    }

    public function detailPrijemce()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Hlavní Město Praha' => '/granty-praha', 'Detail příjemce' => 'self']);
        $this->set('prijemce', $this->GrantyPrahaZadatel->find('all', [
            'conditions' => [
                'GrantyPrahaZadatel.id_zadatel' => $this->request->getParam('id_zadatel')
            ],
            'contain' => [
                'GrantyPrahaProjekty'
            ]
        ])->toArray());
    }

    public function detailProjektu()
    {
        $projekt = $this->GrantyPrahaProjekty->find('all', [
            'conditions' => [
                'GrantyPrahaProjekty.id_projekt' => $this->request->getParam('id_projekt')
            ],
            'contain' => [
                'GrantyPrahaZadatel',
                'GrantyPrahaUsneseni'
            ]
        ])->first();

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Hlavní Město Praha' => '/granty-praha', $projekt->Zadatel->nazev => '/granty-praha/prijemce/'.$projekt->Zadatel->id_zadatel, 'Detail projektu' => 'self']);
        $this->set('projekt', $projekt);
    }

    public function ajaxProjektyPrijemce()
    {
        if (!$this->request->is('ajax')) {
            return new NotFoundException();
        }

        $id_zadatel = $this->request->getParam('id_zadatel');

        $prijemce = $this->GrantyPrahaZadatel->find('all', [
            'conditions' => [
                'GrantyPrahaZadatel.id_zadatel' => $id_zadatel
            ],
            'contain' => [
                'GrantyPrahaProjekty'
            ]
        ]);

        $_serialize = false;
        $this->set(compact('_serialize', 'prijemce', 'id_zadatel'));
    }

    public function ajaxPrijemci()
    {
        if ($this->request->is('ajax')) {
            $_serialize = false;

            $cache_tag_final_result = 'ajax_granty_praha_prijemci';
            $final = Cache::read($cache_tag_final_result, 'long_term');

            $prijemci = $this->GrantyPrahaZadatel->find('all', [
                'group' => [
                    'id_zadatel'
                ]
            ]);
            $soucty = [];

            if ($final === false) {
                /** @var GrantyPrahaZadatel $prijemce */
                foreach ($prijemci as $prijemce) {
                    if (!$prijemce->id || !$prijemce->id_zadatel) continue;

                    $cache_tag_soucet_prideleno = 'granty_praha_soucet_prideleno_' . sha1($prijemce->id_zadatel);
                    $cache_tag_soucet_vycerpano = 'granty_praha_soucet_vycerpano_' . sha1($prijemce->id_zadatel);
                    $cache_tag_pocet_projektu = 'granty_praha_pocet_projektu_' . sha1($prijemce->id_zadatel);

                    $soucet_prideleno = Cache::read($cache_tag_soucet_prideleno, 'long_term');
                    $soucet_vycerpano = Cache::read($cache_tag_soucet_vycerpano, 'long_term');
                    $pocet_projektu = Cache::read($cache_tag_pocet_projektu, 'long_term');

                    if ($soucet_prideleno === false) {
                        $soucet_prideleno = $this->GrantyPrahaCastky->find('all', [
                            'fields' => [
                                'sum' => 'SUM(castka_pridelena)'
                            ],
                            'conditions' => [
                                'id_zadatel' => $prijemce->id_zadatel
                            ]
                        ])->first()->sum;
                        Cache::write($cache_tag_soucet_prideleno, $soucet_prideleno, 'long_term');
                    }

                    if ($soucet_vycerpano === false) {
                        $soucet_vycerpano = $this->GrantyPrahaCastky->find('all', [
                            'fields' => [
                                'sum' => 'SUM(castka_vycerpana)'
                            ],
                            'conditions' => [
                                'id_zadatel' => $prijemce->id_zadatel
                            ]
                        ])->first()->sum;
                        Cache::write($cache_tag_soucet_vycerpano, $soucet_vycerpano, 'long_term');
                    }

                    if ($pocet_projektu === false) {
                        $pocet_projektu = $this->GrantyPrahaProjekty->find('all', [
                            'conditions' => [
                                'id_zadatel' => $prijemce->id_zadatel
                            ],
                            'fields' => [
                                'sum' => 'COUNT(id_projekt)'
                            ]
                        ])->first()->sum;
                        Cache::write($cache_tag_pocet_projektu, $pocet_projektu, 'long_term');
                    }

                    $soucty[$prijemce->id_zadatel] = [
                        'prideleno' => $soucet_prideleno,
                        'vycerpano' => $soucet_vycerpano,
                        'pocet_projektu' => $pocet_projektu
                    ];
                }
            }

            $this->set(compact('prijemci', 'soucty', '_serialize'));
        } else {
            throw new NotFoundException();
        }

    }

}