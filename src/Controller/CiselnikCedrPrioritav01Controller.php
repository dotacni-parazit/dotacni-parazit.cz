<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikCedrPrioritav01 Controller
 *
 * @property \App\Model\Table\CiselnikCedrPrioritav01Table $CiselnikCedrPrioritav01
 */
class CiselnikCedrPrioritav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikCedrPrioritav01 = $this->paginate($this->CiselnikCedrPrioritav01);

        $this->set(compact('ciselnikCedrPrioritav01'));
        $this->set('_serialize', ['ciselnikCedrPrioritav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Cedr Prioritav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikCedrPrioritav01', $ciselnikCedrPrioritav01);
        $this->set('_serialize', ['ciselnikCedrPrioritav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->patchEntity($ciselnikCedrPrioritav01, $this->request->getData());
            if ($this->CiselnikCedrPrioritav01->save($ciselnikCedrPrioritav01)) {
                $this->Flash->success(__('The ciselnik cedr prioritav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr prioritav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrPrioritav01'));
        $this->set('_serialize', ['ciselnikCedrPrioritav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Cedr Prioritav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->patchEntity($ciselnikCedrPrioritav01, $this->request->getData());
            if ($this->CiselnikCedrPrioritav01->save($ciselnikCedrPrioritav01)) {
                $this->Flash->success(__('The ciselnik cedr prioritav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr prioritav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrPrioritav01'));
        $this->set('_serialize', ['ciselnikCedrPrioritav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Cedr Prioritav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikCedrPrioritav01 = $this->CiselnikCedrPrioritav01->get($id);
        if ($this->CiselnikCedrPrioritav01->delete($ciselnikCedrPrioritav01)) {
            $this->Flash->success(__('The ciselnik cedr prioritav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik cedr prioritav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
