<?php

namespace App\Controller;

use App\Controller\Component\CachingComponent;
use App\Model\Entity\Transaction;
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
use App\Model\Table\PRVTable;
use App\Model\Table\RozhodnutiTable;
use App\Model\Table\RozpoctoveObdobiTable;
use App\Model\Table\StrukturalniFondy2020Table;
use App\Model\Table\StrukturalniFondyTable;
use App\Model\Table\TransactionsTable;
use Cake\Cache\Cache;
use Cake\Core\Configure;


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
 * @property StrukturalniFondy2020Table StrukturalniFondy2020
 * @property PRVTable PRV
 */
class PrezidentController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Dotinfo');
        $this->loadModel('PRV');
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
        $this->loadModel('StrukturalniFondy2020');
        $this->loadModel('CiselnikDotaceTitulStatniRozpocetUkazatelv01');
        $this->loadModel('CiselnikUcelZnakv01');
        $this->loadModel('CiselnikUcelZnakDotacniTitulv01');
        $this->loadComponent('Caching');
    }

    public function index()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Sestavy' => '/vlastni-sestavy', 'Dary Prezidentským Kandidátům' => 'self']);

        $kandidati = $this->Companies->find('all', [
            'conditions' => [
                'type_id' => 7
            ]
        ]);
        $dary = [];
        foreach ($kandidati as $k) {
            $dary[$k->id] = $this->Transactions->find('all', [
                'conditions' => [
                    'recipient_id' => $k->id
                ]
            ])->enableHydration(false)->toArray();
        }
        $this->set(compact(['kandidati', 'dary']));
    }

    public function detail()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Sestavy' => '/vlastni-sestavy', 'Dary Prezidentským Kandidátům' => '/kandidati-na-prezidenta', 'Prezidentský kandidát' => 'self']);
        $kandidat = $this->Companies->get($this->request->getParam('id'), [
            'contain' => [
                'IncomingTransactions',
                'IncomingTransactions.Donor',
                'IncomingTransactions.Donor.TransparencyLabel'
            ]
        ]);
        $donors = $this->Transactions->find('all', [
            'conditions' => [
                'recipient_id' => $this->request->getParam('id')
            ],
            'contain' => [
                'Donor',
                'Donor.TransparencyLabel'
            ],
            'group' => [
                'donor_id'
            ]
        ]);
        $sum_donors = $this->cacheSouctyPodleIco($donors);
        $this->set(compact(['kandidat', 'sum_donors', 'donors']));
    }


    public function cacheSouctyPodleIco($donors)
    {
        /** @var Transaction[] $donors */
        $donors_sum = [];

        foreach ($donors as $d) {
            if ($d->donor->ico < 1) {
                $donors_sum[$d->donor->ico][$d->year] = [0, 0, 0, 0, 0, 0, 0, 0];
                continue;
            }
            if ($d->year < 1900 || $d->year > 2030) continue;
            if (isset($donors_sum[$d->donor->ico]) && isset($donors_sum[$d->donor->ico][$d->year])) continue;

            $cache_tag_ico_sum_rozhodnuti = 'sum_rozhodnuti_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_spotrebovano = 'sum_spotrebovano_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_pobidky = 'sum_pobidky_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_pobidky_stropy = 'sum_pobidky_stropy_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_strukturalni_fondy = 'sum_strukturalni_fondy_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_strukturalni_fondy_2020 = 'sum_strukturalni_fondy_2020_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_sum_dotinfo = 'sum_dotinfo_ico_' . sha1($d->donor->ico) . '_all_years';
            $cache_tag_ico_politicke_dary = 'sum_politicke_dary_ico_' . sha1($d->donor->ico) . '_all_years';

//            Cache::delete($cache_tag_ico_sum_rozhodnuti, 'long_term');
//            Cache::delete($cache_tag_ico_sum_spotrebovano, 'long_term');
//            Cache::delete($cache_tag_ico_sum_pobidky, 'long_term');
//            Cache::delete($cache_tag_ico_sum_strukturalni_fondy, 'long_term');
//            Cache::delete($cache_tag_ico_sum_strukturalni_fondy_2020, 'long_term');
//            Cache::delete($cache_tag_ico_sum_dotinfo, 'long_term');
//            Cache::delete($cache_tag_ico_politicke_dary, 'long_term');

            $sum_rozhodnuti = Cache::read($cache_tag_ico_sum_rozhodnuti, 'long_term');
            $sum_spotrebovano = Cache::read($cache_tag_ico_sum_spotrebovano, 'long_term');
            $sum_pobidky = Cache::read($cache_tag_ico_sum_pobidky, 'long_term');
            $sum_pobidky_stropy = Cache::read($cache_tag_ico_sum_pobidky_stropy, 'long_term');
            $sum_strukturalni_fondy = Cache::read($cache_tag_ico_sum_strukturalni_fondy, 'long_term');
            $sum_strukturalni_fondy_2020 = Cache::read($cache_tag_ico_sum_strukturalni_fondy_2020, 'long_term');
            $sum_dotinfo = Cache::read($cache_tag_ico_sum_dotinfo, 'long_term');
            $sum_politicke_dary = Cache::read($cache_tag_ico_politicke_dary, 'long_term');

            if ($sum_rozhodnuti === false) {
                $sum_rozhodnuti = $this->Rozhodnuti->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaRozhodnuta)'
                        ],
                        'contain' => [
                            'Dotace.PrijemcePomoci'
                        ],
                        'conditions' => [
                            'PrijemcePomoci.ico' => $d->donor->ico,
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
                            'PrijemcePomoci.ico' => $d->donor->ico,
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
                            'ico' => $d->donor->ico
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_ico_sum_pobidky, $sum_pobidky, 'long_term');
            }

            if ($sum_pobidky_stropy === false) {
                $sum_pobidky_stropy = $this->InvesticniPobidky->find('all', [
                        'fields' => [
                            'sum' => 'SUM(stropVerejnePodpory)'
                        ],
                        'conditions' => [
                            'ico' => $d->donor->ico
                        ]
                    ])->first()->sum + 0;
                Cache::write($cache_tag_ico_sum_pobidky_stropy, $sum_pobidky_stropy, 'long_term');
            }

            if ($sum_strukturalni_fondy === false) {
                $sum_strukturalni_fondy = $this->StrukturalniFondy->find('all', [
                    'fields' => [
                        'sum' => 'SUM(verejneZdrojeCelkem)'
                    ],
                    'conditions' => [
                        'zadatelIcoNum' => $d->donor->ico
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_ico_sum_strukturalni_fondy, $sum_strukturalni_fondy, 'long_term');
            }

            if ($sum_strukturalni_fondy_2020 === false) {
                $sum_strukturalni_fondy_2020 = $this->StrukturalniFondy2020->find('all', [
                    'fields' => [
                        'sum' => 'SUM(celkoveZdroje)'
                    ],
                    'conditions' => [
                        'zadatelIco' => $d->donor->ico
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_ico_sum_strukturalni_fondy_2020, $sum_strukturalni_fondy_2020, 'long_term');
            }

            if ($sum_dotinfo === false) {
                $sum_dotinfo = $this->Dotinfo->find('all', [
                    'fields' => [
                        'sum' => 'SUM(castkaSchvalena)'
                    ],
                    'conditions' => [
                        'ucastnikIco' => $d->donor->ico
                    ]
                ])->first()->sum;
                Cache::write($cache_tag_ico_sum_dotinfo, $sum_dotinfo, 'long_term');
            }

            if ($sum_politicke_dary === false) {
                $donor_id = $this->Companies->find('all', [
                    'conditions' => [
                        'ico' => $d->donor->ico,
                        'type_id' => 5
                    ]
                ])->first();
                if (!empty($donor_id)) {
                    $sum_politicke_dary = $this->Transactions->find('all', [
                        'fields' => [
                            'sum' => 'SUM(amount)'
                        ],
                        'conditions' => [
                            'donor_id' => $donor_id->id
                        ]
                    ])->first()->sum;
                } else {
                    $sum_politicke_dary = 0;
                }
                Cache::write($cache_tag_ico_politicke_dary, $sum_politicke_dary, 'long_term');
            }

            $donors_sum[$d->donor->ico][$d->year] = [$sum_rozhodnuti, $sum_spotrebovano, $sum_pobidky, $sum_strukturalni_fondy, $sum_dotinfo, $sum_strukturalni_fondy_2020, $sum_politicke_dary, $sum_pobidky_stropy];
        }
        return $donors_sum;
    }

}