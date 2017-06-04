<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikStatv01 Controller
 *
 * @property \App\Model\Table\CiselnikStatv01Table $CiselnikStatv01
 */
class CiselnikStatv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikStatv01 = $this->paginate($this->CiselnikStatv01);

        $this->set(compact('ciselnikStatv01'));
        $this->set('_serialize', ['ciselnikStatv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Statv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikStatv01 = $this->CiselnikStatv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikStatv01', $ciselnikStatv01);
        $this->set('_serialize', ['ciselnikStatv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikStatv01 = $this->CiselnikStatv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikStatv01 = $this->CiselnikStatv01->patchEntity($ciselnikStatv01, $this->request->getData());
            if ($this->CiselnikStatv01->save($ciselnikStatv01)) {
                $this->Flash->success(__('The ciselnik statv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatv01'));
        $this->set('_serialize', ['ciselnikStatv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Statv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikStatv01 = $this->CiselnikStatv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikStatv01 = $this->CiselnikStatv01->patchEntity($ciselnikStatv01, $this->request->getData());
            if ($this->CiselnikStatv01->save($ciselnikStatv01)) {
                $this->Flash->success(__('The ciselnik statv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatv01'));
        $this->set('_serialize', ['ciselnikStatv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Statv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikStatv01 = $this->CiselnikStatv01->get($id);
        if ($this->CiselnikStatv01->delete($ciselnikStatv01)) {
            $this->Flash->success(__('The ciselnik statv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik statv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
