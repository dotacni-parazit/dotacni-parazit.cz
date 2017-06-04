<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikVuscv01 Controller
 *
 * @property \App\Model\Table\CiselnikVuscv01Table $CiselnikVuscv01
 */
class CiselnikVuscv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikVuscv01 = $this->paginate($this->CiselnikVuscv01);

        $this->set(compact('ciselnikVuscv01'));
        $this->set('_serialize', ['ciselnikVuscv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Vuscv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikVuscv01 = $this->CiselnikVuscv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikVuscv01', $ciselnikVuscv01);
        $this->set('_serialize', ['ciselnikVuscv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikVuscv01 = $this->CiselnikVuscv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikVuscv01 = $this->CiselnikVuscv01->patchEntity($ciselnikVuscv01, $this->request->getData());
            if ($this->CiselnikVuscv01->save($ciselnikVuscv01)) {
                $this->Flash->success(__('The ciselnik vuscv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik vuscv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikVuscv01'));
        $this->set('_serialize', ['ciselnikVuscv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Vuscv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikVuscv01 = $this->CiselnikVuscv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikVuscv01 = $this->CiselnikVuscv01->patchEntity($ciselnikVuscv01, $this->request->getData());
            if ($this->CiselnikVuscv01->save($ciselnikVuscv01)) {
                $this->Flash->success(__('The ciselnik vuscv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik vuscv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikVuscv01'));
        $this->set('_serialize', ['ciselnikVuscv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Vuscv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikVuscv01 = $this->CiselnikVuscv01->get($id);
        if ($this->CiselnikVuscv01->delete($ciselnikVuscv01)) {
            $this->Flash->success(__('The ciselnik vuscv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik vuscv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
