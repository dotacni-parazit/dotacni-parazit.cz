<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikFinancniZdrojv01 Controller
 *
 * @property \App\Model\Table\CiselnikFinancniZdrojv01Table $CiselnikFinancniZdrojv01
 */
class CiselnikFinancniZdrojv01Controller extends AppController
{

    public $paginate = [
        'limit' => 120
    ];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikFinancniZdrojv01 = $this->paginate($this->CiselnikFinancniZdrojv01);

        $this->set(compact('ciselnikFinancniZdrojv01'));
        $this->set('_serialize', ['ciselnikFinancniZdrojv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Financni Zdrojv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikFinancniZdrojv01', $ciselnikFinancniZdrojv01);
        $this->set('_serialize', ['ciselnikFinancniZdrojv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->patchEntity($ciselnikFinancniZdrojv01, $this->request->getData());
            if ($this->CiselnikFinancniZdrojv01->save($ciselnikFinancniZdrojv01)) {
                $this->Flash->success(__('The ciselnik financni zdrojv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik financni zdrojv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikFinancniZdrojv01'));
        $this->set('_serialize', ['ciselnikFinancniZdrojv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Financni Zdrojv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->patchEntity($ciselnikFinancniZdrojv01, $this->request->getData());
            if ($this->CiselnikFinancniZdrojv01->save($ciselnikFinancniZdrojv01)) {
                $this->Flash->success(__('The ciselnik financni zdrojv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik financni zdrojv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikFinancniZdrojv01'));
        $this->set('_serialize', ['ciselnikFinancniZdrojv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Financni Zdrojv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikFinancniZdrojv01 = $this->CiselnikFinancniZdrojv01->get($id);
        if ($this->CiselnikFinancniZdrojv01->delete($ciselnikFinancniZdrojv01)) {
            $this->Flash->success(__('The ciselnik financni zdrojv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik financni zdrojv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
