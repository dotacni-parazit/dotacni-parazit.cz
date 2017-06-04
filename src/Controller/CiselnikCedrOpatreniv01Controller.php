<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikCedrOpatreniv01 Controller
 *
 * @property \App\Model\Table\CiselnikCedrOpatreniv01Table $CiselnikCedrOpatreniv01
 */
class CiselnikCedrOpatreniv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikCedrOpatreniv01 = $this->paginate($this->CiselnikCedrOpatreniv01);

        $this->set(compact('ciselnikCedrOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrOpatreniv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Cedr Opatreniv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikCedrOpatreniv01', $ciselnikCedrOpatreniv01);
        $this->set('_serialize', ['ciselnikCedrOpatreniv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->patchEntity($ciselnikCedrOpatreniv01, $this->request->getData());
            if ($this->CiselnikCedrOpatreniv01->save($ciselnikCedrOpatreniv01)) {
                $this->Flash->success(__('The ciselnik cedr opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrOpatreniv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Cedr Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->patchEntity($ciselnikCedrOpatreniv01, $this->request->getData());
            if ($this->CiselnikCedrOpatreniv01->save($ciselnikCedrOpatreniv01)) {
                $this->Flash->success(__('The ciselnik cedr opatreniv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr opatreniv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrOpatreniv01'));
        $this->set('_serialize', ['ciselnikCedrOpatreniv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Cedr Opatreniv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikCedrOpatreniv01 = $this->CiselnikCedrOpatreniv01->get($id);
        if ($this->CiselnikCedrOpatreniv01->delete($ciselnikCedrOpatreniv01)) {
            $this->Flash->success(__('The ciselnik cedr opatreniv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik cedr opatreniv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
