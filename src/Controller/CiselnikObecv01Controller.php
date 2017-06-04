<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikObecv01 Controller
 *
 * @property \App\Model\Table\CiselnikObecv01Table $CiselnikObecv01
 */
class CiselnikObecv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikObecv01 = $this->paginate($this->CiselnikObecv01);

        $this->set(compact('ciselnikObecv01'));
        $this->set('_serialize', ['ciselnikObecv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Obecv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikObecv01 = $this->CiselnikObecv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikObecv01', $ciselnikObecv01);
        $this->set('_serialize', ['ciselnikObecv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikObecv01 = $this->CiselnikObecv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikObecv01 = $this->CiselnikObecv01->patchEntity($ciselnikObecv01, $this->request->getData());
            if ($this->CiselnikObecv01->save($ciselnikObecv01)) {
                $this->Flash->success(__('The ciselnik obecv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik obecv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikObecv01'));
        $this->set('_serialize', ['ciselnikObecv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Obecv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikObecv01 = $this->CiselnikObecv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikObecv01 = $this->CiselnikObecv01->patchEntity($ciselnikObecv01, $this->request->getData());
            if ($this->CiselnikObecv01->save($ciselnikObecv01)) {
                $this->Flash->success(__('The ciselnik obecv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik obecv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikObecv01'));
        $this->set('_serialize', ['ciselnikObecv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Obecv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikObecv01 = $this->CiselnikObecv01->get($id);
        if ($this->CiselnikObecv01->delete($ciselnikObecv01)) {
            $this->Flash->success(__('The ciselnik obecv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik obecv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
