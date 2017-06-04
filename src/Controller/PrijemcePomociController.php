<?php

namespace App\Controller;

/**
 * PrijemcePomoci Controller
 *
 * @property \App\Model\Table\PrijemcePomociTable $PrijemcePomoci
 */
class PrijemcePomociController extends AppController
{

    public $paginate = [
        'contain' => ['Dotace', 'AdresaSidlo', 'AdresaTrvaleBydliste', 'CiselnikStatV01', 'CiselnikPravniFormaV01']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $prijemcePomoci = $this->paginate($this->PrijemcePomoci);

        $this->set(compact('prijemcePomoci'));
        $this->set('_serialize', ['prijemcePomoci']);
    }

    /**
     * View method
     *
     * @param string|null $id Prijemce Pomoci id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prijemcePomoci = $this->PrijemcePomoci->get($id, [
            'contain' => ['Dotace', 'AdresaSidlo', 'AdresaTrvaleBydliste', 'CiselnikStatV01', 'CiselnikPravniFormaV01']
        ]);
        
        $this->set('prijemcePomoci', $prijemcePomoci);
        $this->set('_serialize', ['prijemcePomoci']);
    }
}
