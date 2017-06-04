<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikCedrGrantoveSchemav01 Controller
 *
 * @property \App\Model\Table\CiselnikCedrGrantoveSchemav01Table $CiselnikCedrGrantoveSchemav01
 */
class CiselnikCedrGrantoveSchemav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikCedrGrantoveSchemav01 = $this->paginate($this->CiselnikCedrGrantoveSchemav01);

        $this->set(compact('ciselnikCedrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikCedrGrantoveSchemav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Cedr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikCedrGrantoveSchemav01', $ciselnikCedrGrantoveSchemav01);
        $this->set('_serialize', ['ciselnikCedrGrantoveSchemav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->patchEntity($ciselnikCedrGrantoveSchemav01, $this->request->getData());
            if ($this->CiselnikCedrGrantoveSchemav01->save($ciselnikCedrGrantoveSchemav01)) {
                $this->Flash->success(__('The ciselnik cedr grantove schemav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr grantove schemav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikCedrGrantoveSchemav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Cedr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->patchEntity($ciselnikCedrGrantoveSchemav01, $this->request->getData());
            if ($this->CiselnikCedrGrantoveSchemav01->save($ciselnikCedrGrantoveSchemav01)) {
                $this->Flash->success(__('The ciselnik cedr grantove schemav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr grantove schemav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrGrantoveSchemav01'));
        $this->set('_serialize', ['ciselnikCedrGrantoveSchemav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Cedr Grantove Schemav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikCedrGrantoveSchemav01 = $this->CiselnikCedrGrantoveSchemav01->get($id);
        if ($this->CiselnikCedrGrantoveSchemav01->delete($ciselnikCedrGrantoveSchemav01)) {
            $this->Flash->success(__('The ciselnik cedr grantove schemav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik cedr grantove schemav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
