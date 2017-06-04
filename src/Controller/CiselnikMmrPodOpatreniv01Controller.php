<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMmrPodOpatreniv01 Controller
 *
 * @property \App\Model\Table\CiselnikMmrPodOpatreniv01Table $CiselnikMmrPodOpatreniv01
 */
class CiselnikMmrPodOpatreniv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMmrPodOpatreniv01 = $this->paginate($this->CiselnikMmrPodOpatreniv01);

        $this->set(compact('ciselnikMmrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrPodOpatreniv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mmr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMmrPodOpatreniv01', $ciselnikMmrPodOpatreniv01);
        $this->set('_serialize', ['ciselnikMmrPodOpatreniv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->patchEntity($ciselnikMmrPodOpatreniv01, $this->request->getData());
            if ($this->CiselnikMmrPodOpatreniv01->save($ciselnikMmrPodOpatreniv01)) {
                $this->Flash->success(__('The ciselnik mmr pod opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr pod opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrPodOpatreniv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mmr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->patchEntity($ciselnikMmrPodOpatreniv01, $this->request->getData());
            if ($this->CiselnikMmrPodOpatreniv01->save($ciselnikMmrPodOpatreniv01)) {
                $this->Flash->success(__('The ciselnik mmr pod opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr pod opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikMmrPodOpatreniv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mmr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMmrPodOpatreniv01 = $this->CiselnikMmrPodOpatreniv01->get($id);
        if ($this->CiselnikMmrPodOpatreniv01->delete($ciselnikMmrPodOpatreniv01)) {
            $this->Flash->success(__('The ciselnik mmr pod opatreniv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mmr pod opatreniv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
