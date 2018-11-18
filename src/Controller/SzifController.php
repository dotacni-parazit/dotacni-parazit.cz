<?php

namespace App\Controller;

use App\Controller\Component\CachingComponent;
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
use Cake\Http\Exception\NotFoundException;


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
class SzifController extends AppController
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

    public function prvPO()
    {
        $this->set('data', $this->PRV->find('all', [
            'fields' => [
                'ico' => 'DISTINCT(ico)',
                'jmeno',
                'count' => 'COUNT(*)',
                'sum' => 'SUM(czk_celkem)'
            ],
            'group' => [
                'ico'
            ],
            'conditions' => [
                'ico IS NOT NULL'
            ]
        ]));
        $this->set('_serialize', false);
        $this->render('prv_po');
    }

    public function prvFO()
    {
        $this->set('data', $this->PRV->find('all', [
            'fields' => [
                'jmeno' => 'DISTINCT(PRV.jmeno)',
                'sum' => 'SUM(czk_celkem)',
                'count' => 'COUNT(*)',
                'id',
                'okres',
                'ico'
            ],
            'group' => [
                'jmeno'
            ],
            'conditions' => [
                'ico IS NULL'
            ]
        ]));
        $this->set('_serialize', false);
        $this->render('prv_fo');
    }

    public function prvOkres()
    {
        $obce = $this->PRV->find('all', [
            'conditions' => [
                'okres' => $this->request->getQuery('name')
            ],
            'fields' => [
                'obec' => 'DISTINCT(obec)',
                'count' => 'COUNT(*)',
                'okres',
                'sum_celkem' => 'SUM(czk_celkem)',
                'sum_tuzemske' => 'SUM(czk_tuzemske)',
                'sum_evropske' => 'SUM(czk_evropske)'
            ],
            'group' => [
                'obec'
            ]
        ]);
        if ($obce->count() < 1) throw new NotFoundException();

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Detail Okresu' => 'self']);

        $this->set(compact(['obce']));
    }

    public function prvObec()
    {
        $data = $this->PRV->find('all', [
            'conditions' => [
                'okres' => $this->request->getQuery('okres'),
                'obec' => $this->request->getQuery('name')
            ]
        ]);
        if ($data->count() < 1) throw new NotFoundException();

        $name = $this->request->getQuery('name');
        $okres = $this->request->getQuery('okres');

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Detail Okresu ' => '/program-rozvoje-venkova/okres/?name=' . urlencode($okres), 'Detail Obce' => 'self']);
        $this->set(compact(['data', 'name', 'okres']));
        $this->set('_serialize', false);
    }

    public function prvOpatreni()
    {
        $data = $this->PRV->find('all', [
            'conditions' => [
                'opatreni' => $this->request->getQuery('name')
            ]
        ]);
        if ($data->count() < 1) throw new NotFoundException();

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Detail Opatření' => 'self']);
        $this->set(compact(['data']));
        $this->set('_serialize', false);
    }

    public function prvDetail()
    {
        $first = $this->PRV->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('id')
            ]
        ])->first();
        if (empty($first)) throw new NotFoundException();
        if (!empty($first->ico)) $this->redirect('/program-rozvoje-venkova/ico/' . $first->ico);

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Detail Fyzické Osoby' => 'self']);

        $ico = $this->PRV->find('all', [
            'conditions' => [
                'jmeno' => $first->jmeno
            ]
        ]);

        $this->set(compact(['first', 'ico']));
    }

    public function prvIco()
    {
        $ico = $this->PRV->find('all', [
            'conditions' => [
                'ico' => $this->request->getParam('ico')
            ]
        ])->enableHydration(false)->toArray();
        if (count($ico) < 1) throw new NotFoundException();

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Detail PO (IČO)' => 'self']);

        $this->set(compact(['ico']));
    }

    public function prvZdroj()
    {
        $source = $this->PRV->find('all', [
            'conditions' => [
                'zdroj' => $this->request->getQuery('name')
            ]
        ])->first();
        if (empty($source)) throw new NotFoundException();

        $sources = $this->PRV->find('all', [
            'conditions' => [
                'zdroj' => $source->zdroj
            ]
        ]);
        if ($sources->count() < 1) throw new NotFoundException();

        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => '/program-rozvoje-venkova', 'Zdroj financí' => 'self']);

        $this->set('_serialize', false);
        $this->set(compact(['sources', 'source']));
    }

    public function prvIndex()
    {
        $this->set('crumbs', ['Hlavní Stránka' => '/', 'Poskytovatelé' => '/podle-poskytovatelu/index', 'Státní Zemědělský Intervenční Fond' => 'self']);

        $this->set('sources', $this->PRV->find('all', [
            'fields' => [
                'source' => 'DISTINCT(zdroj)',
                'count' => 'COUNT(*)',
                'sum' => 'SUM(czk_celkem)'
            ],
            'group' => [
                'zdroj'
            ]
        ]));
        $this->set('okresy', $this->PRV->find('all', [
            'fields' => [
                'okres' => 'DISTINCT(okres)',
                'count' => 'COUNT(*)',
                'sum' => 'SUM(czk_celkem)'
            ],
            'group' => [
                'okres'
            ]
        ]));
        $this->set('opatreni', $this->PRV->find('all', [
            'fields' => [
                'opatreni' => 'DISTINCT(opatreni)',
                'count' => 'COUNT(*)',
                'sum' => 'SUM(czk_celkem)'
            ],
            'group' => [
                'opatreni'
            ]
        ]));
    }

}