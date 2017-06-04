<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikStatV01 Controller
 *
 * @property \App\Model\Table\CiselnikStatV01Table $CiselnikStatV01
 */
class CiselnikStatV01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikStatV01 = $this->CiselnikStatV01->find('all');

        $this->set(compact('ciselnikStatV01'));
        $this->set('_serialize', ['ciselnikStatV01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Stat V01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikStatV01 = $this->CiselnikStatV01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikStatV01', $ciselnikStatV01);
        $this->set('_serialize', ['ciselnikStatV01']);
    }
}
