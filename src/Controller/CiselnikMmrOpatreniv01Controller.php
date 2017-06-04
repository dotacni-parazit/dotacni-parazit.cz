<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMmrOpatreniv01 Controller
 *
 * @property \App\Model\Table\CiselnikMmrOpatreniv01Table $CiselnikMmrOpatreniv01
 */
class CiselnikMmrOpatreniv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMmrOpatreniv01 = $this->paginate($this->CiselnikMmrOpatreniv01);

        $this->set(compact('ciselnikMmrOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrOpatreniv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mmr Opatreniv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMmrOpatreniv01', $ciselnikMmrOpatreniv01);
        $this->set('_serialize', ['ciselnikMmrOpatreniv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->patchEntity($ciselnikMmrOpatreniv01, $this->request->getData());
            if ($this->CiselnikMmrOpatreniv01->save($ciselnikMmrOpatreniv01)) {
                $this->Flash->success(__('The ciselnik mmr opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrOpatreniv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mmr Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->patchEntity($ciselnikMmrOpatreniv01, $this->request->getData());
            if ($this->CiselnikMmrOpatreniv01->save($ciselnikMmrOpatreniv01)) {
                $this->Flash->success(__('The ciselnik mmr opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrOpatreniv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mmr Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMmrOpatreniv01 = $this->CiselnikMmrOpatreniv01->get($id);
        if ($this->CiselnikMmrOpatreniv01->delete($ciselnikMmrOpatreniv01)) {
            $this->Flash->success(__('The ciselnik mmr opatreniv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mmr opatreniv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
