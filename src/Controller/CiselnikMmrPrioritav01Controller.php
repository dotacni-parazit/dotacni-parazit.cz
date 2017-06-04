<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMmrPrioritav01 Controller
 *
 * @property \App\Model\Table\CiselnikMmrPrioritav01Table $CiselnikMmrPrioritav01
 */
class CiselnikMmrPrioritav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMmrPrioritav01 = $this->paginate($this->CiselnikMmrPrioritav01);

        $this->set(compact('ciselnikMmrPrioritav01'));
        $this->set('_serialize', ['ciselnikMmrPrioritav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mmr Prioritav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMmrPrioritav01', $ciselnikMmrPrioritav01);
        $this->set('_serialize', ['ciselnikMmrPrioritav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->patchEntity($ciselnikMmrPrioritav01, $this->request->getData());
            if ($this->CiselnikMmrPrioritav01->save($ciselnikMmrPrioritav01)) {
                $this->Flash->success(__('The ciselnik mmr prioritav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr prioritav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrPrioritav01'));
        $this->set('_serialize', ['ciselnikMmrPrioritav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mmr Prioritav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->patchEntity($ciselnikMmrPrioritav01, $this->request->getData());
            if ($this->CiselnikMmrPrioritav01->save($ciselnikMmrPrioritav01)) {
                $this->Flash->success(__('The ciselnik mmr prioritav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr prioritav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrPrioritav01'));
        $this->set('_serialize', ['ciselnikMmrPrioritav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mmr Prioritav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMmrPrioritav01 = $this->CiselnikMmrPrioritav01->get($id);
        if ($this->CiselnikMmrPrioritav01->delete($ciselnikMmrPrioritav01)) {
            $this->Flash->success(__('The ciselnik mmr prioritav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mmr prioritav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
