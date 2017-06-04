<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikFinancniProstredekCleneniv01 Controller
 *
 * @property \App\Model\Table\CiselnikFinancniProstredekCleneniv01Table $CiselnikFinancniProstredekCleneniv01
 */
class CiselnikFinancniProstredekCleneniv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikFinancniProstredekCleneniv01 = $this->paginate($this->CiselnikFinancniProstredekCleneniv01);

        $this->set(compact('ciselnikFinancniProstredekCleneniv01'));
        $this->set('_serialize', ['ciselnikFinancniProstredekCleneniv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Financni Prostredek Cleneniv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikFinancniProstredekCleneniv01', $ciselnikFinancniProstredekCleneniv01);
        $this->set('_serialize', ['ciselnikFinancniProstredekCleneniv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->patchEntity($ciselnikFinancniProstredekCleneniv01, $this->request->getData());
            if ($this->CiselnikFinancniProstredekCleneniv01->save($ciselnikFinancniProstredekCleneniv01)) {
                $this->Flash->success(__('The ciselnik financni prostredek cleneniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik financni prostredek cleneniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikFinancniProstredekCleneniv01'));
        $this->set('_serialize', ['ciselnikFinancniProstredekCleneniv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Financni Prostredek Cleneniv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->patchEntity($ciselnikFinancniProstredekCleneniv01, $this->request->getData());
            if ($this->CiselnikFinancniProstredekCleneniv01->save($ciselnikFinancniProstredekCleneniv01)) {
                $this->Flash->success(__('The ciselnik financni prostredek cleneniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik financni prostredek cleneniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikFinancniProstredekCleneniv01'));
        $this->set('_serialize', ['ciselnikFinancniProstredekCleneniv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Financni Prostredek Cleneniv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikFinancniProstredekCleneniv01 = $this->CiselnikFinancniProstredekCleneniv01->get($id);
        if ($this->CiselnikFinancniProstredekCleneniv01->delete($ciselnikFinancniProstredekCleneniv01)) {
            $this->Flash->success(__('The ciselnik financni prostredek cleneniv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik financni prostredek cleneniv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
