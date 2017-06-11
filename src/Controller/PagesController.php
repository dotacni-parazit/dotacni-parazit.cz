<?php
/**
 * Created by PhpStorm.
 * User: smarek
 * Date: 6/4/17
 * Time: 9:10 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\CiselnikCedrOperacniProgramv01;
use App\Model\Entity\CiselnikMmrOperacniProgramv01;


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
        if($kod != null){
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

}