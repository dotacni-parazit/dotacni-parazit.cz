<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikCedrPodOpatreniv01 Controller
 *
 * @property \App\Model\Table\CiselnikCedrPodOpatreniv01Table $CiselnikCedrPodOpatreniv01
 */
class CiselnikCedrPodOpatreniv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikCedrPodOpatreniv01 = $this->paginate($this->CiselnikCedrPodOpatreniv01);

        $this->set(compact('ciselnikCedrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrPodOpatreniv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Cedr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikCedrPodOpatreniv01', $ciselnikCedrPodOpatreniv01);
        $this->set('_serialize', ['ciselnikCedrPodOpatreniv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->patchEntity($ciselnikCedrPodOpatreniv01, $this->request->getData());
            if ($this->CiselnikCedrPodOpatreniv01->save($ciselnikCedrPodOpatreniv01)) {
                $this->Flash->success(__('The ciselnik cedr pod opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr pod opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrPodOpatreniv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Cedr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->patchEntity($ciselnikCedrPodOpatreniv01, $this->request->getData());
            if ($this->CiselnikCedrPodOpatreniv01->save($ciselnikCedrPodOpatreniv01)) {
                $this->Flash->success(__('The ciselnik cedr pod opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr pod opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrPodOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrPodOpatreniv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Cedr Pod Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikCedrPodOpatreniv01 = $this->CiselnikCedrPodOpatreniv01->get($id);
        if ($this->CiselnikCedrPodOpatreniv01->delete($ciselnikCedrPodOpatreniv01)) {
            $this->Flash->success(__('The ciselnik cedr pod opatreniv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik cedr pod opatreniv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
