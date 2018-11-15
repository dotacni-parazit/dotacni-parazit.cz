<?php

namespace App\Controller;

use App\Model\Entity\AresFO;
use App\Model\Table\AresAngosFOTable;
use App\Model\Table\AresFOTable;
use App\Model\Table\AresFOtoICOTable;
use App\Model\Table\AresFOtoMoneyTable;
use App\Model\Table\AresNazvyTable;
use App\Model\Table\AresUdajeTable;
use App\Model\Table\BudovaTable;
use App\Model\Table\RozhodnutiTable;
use App\Model\Table\RozpoctoveObdobiTable;
use Cake\Cache\Cache;
use Cake\Core\Configure;

/**
 * @property AresUdajeTable $AresUdaje
 * @property AresFOTable $AresFO
 * @property AresFOtoICOTable $AresFOtoICO
 * @property AresFOtoMoneyTable $AresFOtoMoney
 * @property AresNazvyTable $AresNazvy
 * @property RozpoctoveObdobiTable $RozpoctoveObdobi
 * @property RozhodnutiTable $Rozhodnuti
 * @property BudovaTable $Budova
 * @property AresAngosFOTable $AresAngosFO
 */
class AresController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        Configure::write('debug', true);

        $this->loadModel('AresUdaje');
        $this->loadModel('AresFO');
        $this->loadModel('AresFOtoICO');
        $this->loadModel('AresFOtoMoney');
        $this->loadModel('AresNazvy');
        $this->loadModel('AresPF');
        $this->loadModel('Rozhodnuti');
        $this->loadModel('RozpoctoveObdobi');
        $this->loadModel('Budova');
        $this->loadModel('AresAngosFO');
    }

    public function budovy()
    {
        Configure::write('debug', false);
        $this->set('budovy', $this->Budova->find('all'));
        $this->set('_serialize', false);
    }

    public function detailBudovy()
    {
        $this->set('budova', $this->Budova->get($this->request->getParam('budovaid')));
    }

    public function test()
    {
        Configure::write('debug', false);
        if ($this->request->is('ajax')) {
            if (!$this->request->is('json')) {
                $this->RequestHandler->renderAs($this, 'json');
            }

            $osoby = $this->AresFO->find('all', [
                'contain' => [
                    'AresFOtoICO'
                ],
                'limit' => 5000
            ]);

            $this->set('_serialize', false);
            $this->set('osoby', $osoby);
        }
    }

    public function foDetail()
    {
        Configure::write('debug', false);
        $osoba = $this->AresFO->get($this->request->getParam('foid'), [
            'contain' => [
                'AresFOtoICO',
                'AresFOtoICO.Nazev'
            ]
        ]);

        $angos = $this->AresAngosFO->find('all', [
            'conditions' => [
                'jmeno' => $osoba->jmeno,
                'prijmeni' => $osoba->prijmeni,
                'datum_narozeni' => $osoba->datum_narozeni
            ]
        ]);
        $icos = [];
        foreach ($angos as $a) {
            $i = isset($icos[$a->ico]) ? $icos[$a->ico] : [];
            $i[] = $a->funkce;
            $icos[$a->ico] = $i;
        }
        //dump($angos->toArray());

        //dump($osoba);
        $this->set('icos', $icos);
        $this->set('osoba', $osoba);
    }

    public function cacheSouctyPodleIco()
    {
        $osoby = $this->AresFO->find('all', [
            'contain' => [
                'AresFOtoICO'
            ],
            'limit' => 3000,
            'offset' => 5000
        ]);

        /** @var AresFO[] $osoby */
        foreach ($osoby as $f) {
            dump($f->id);

            $cache_tag_fo_sum_rozhodnuti = 'sum_rozhodnuti_fo_id_' . sha1($f->id);
            $cache_tag_fo_sum_spotrebovano = 'sum_spotrebovano_fo_id_' . sha1($f->id);

            $fo_sum_rozhodnuti = Cache::read($cache_tag_fo_sum_rozhodnuti, 'long_term');
            $fo_sum_spotrebovano = Cache::read($cache_tag_fo_sum_spotrebovano, 'long_term');

            if ($fo_sum_spotrebovano !== false && $fo_sum_rozhodnuti !== false) {
                dump('continue');
                continue;
            }
            $fo_sum_rozhodnuti = 0;
            $fo_sum_spotrebovano = 0;

            foreach ($f->ares_f_oto_i_c_o as $d) {

                $cache_tag_ico_sum_rozhodnuti = 'sum_rozhodnuti_ico_' . sha1($d->ico) . '_all_years';
                $cache_tag_ico_sum_spotrebovano = 'sum_spotrebovano_ico_' . sha1($d->ico) . '_all_years';

//            Cache::delete($cache_tag_ico_sum_rozhodnuti, 'long_term');
//            Cache::delete($cache_tag_ico_sum_spotrebovano, 'long_term');

                $sum_rozhodnuti = Cache::read($cache_tag_ico_sum_rozhodnuti, 'long_term');
                $sum_spotrebovano = Cache::read($cache_tag_ico_sum_spotrebovano, 'long_term');

                if ($sum_rozhodnuti === false) {
                    $sum_rozhodnuti = $this->Rozhodnuti->find('all', [
                            'fields' => [
                                'sum' => 'SUM(castkaRozhodnuta)'
                            ],
                            'contain' => [
                                'Dotace.PrijemcePomoci'
                            ],
                            'conditions' => [
                                'PrijemcePomoci.ico' => $d->ico,
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
                                'PrijemcePomoci.ico' => $d->ico,
                                'refundaceIndikator' => 0
                            ]
                        ])->first()->sum + 0;
                    Cache::write($cache_tag_ico_sum_spotrebovano, $sum_spotrebovano, 'long_term');
                }

                $fo_sum_rozhodnuti += $sum_rozhodnuti;
                $fo_sum_spotrebovano += $sum_spotrebovano;
            }

            Cache::write($cache_tag_fo_sum_spotrebovano, $fo_sum_spotrebovano, 'long_term');
            Cache::write($cache_tag_fo_sum_rozhodnuti, $fo_sum_rozhodnuti, 'long_term');
            dump('save');
        }
    }

}