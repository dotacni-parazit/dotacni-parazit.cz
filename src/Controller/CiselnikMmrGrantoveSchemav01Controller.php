<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMmrGrantoveSchemav01 Controller
 *
 * @property \App\Model\Table\CiselnikMmrGrantoveSchemav01Table $CiselnikMmrGrantoveSchemav01
 */
class CiselnikMmrGrantoveSchemav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMmrGrantoveSchemav01 = $this->paginate($this->CiselnikMmrGrantoveSchemav01);

        $this->set(compact('ciselnikMmrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikMmrGrantoveSchemav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mmr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMmrGrantoveSchemav01', $ciselnikMmrGrantoveSchemav01);
        $this->set('_serialize', ['ciselnikMmrGrantoveSchemav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->patchEntity($ciselnikMmrGrantoveSchemav01, $this->request->getData());
            if ($this->CiselnikMmrGrantoveSchemav01->save($ciselnikMmrGrantoveSchemav01)) {
                $this->Flash->success(__('The ciselnik mmr grantove schemav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr grantove schemav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikMmrGrantoveSchemav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mmr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->patchEntity($ciselnikMmrGrantoveSchemav01, $this->request->getData());
            if ($this->CiselnikMmrGrantoveSchemav01->save($ciselnikMmrGrantoveSchemav01)) {
                $this->Flash->success(__('The ciselnik mmr grantove schemav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr grantove schemav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikMmrGrantoveSchemav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mmr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMmrGrantoveSchemav01 = $this->CiselnikMmrGrantoveSchemav01->get($id);
        if ($this->CiselnikMmrGrantoveSchemav01->delete($ciselnikMmrGrantoveSchemav01)) {
            $this->Flash->success(__('The ciselnik mmr grantove schemav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mmr grantove schemav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
