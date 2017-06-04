<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikPravniFormav01 Controller
 *
 * @property \App\Model\Table\CiselnikPravniFormav01Table $CiselnikPravniFormav01
 */
class CiselnikPravniFormav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikPravniFormav01 = $this->paginate($this->CiselnikPravniFormav01);

        $this->set(compact('ciselnikPravniFormav01'));
        $this->set('_serialize', ['ciselnikPravniFormav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Pravni Formav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikPravniFormav01', $ciselnikPravniFormav01);
        $this->set('_serialize', ['ciselnikPravniFormav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->patchEntity($ciselnikPravniFormav01, $this->request->getData());
            if ($this->CiselnikPravniFormav01->save($ciselnikPravniFormav01)) {
                $this->Flash->success(__('The ciselnik pravni formav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik pravni formav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikPravniFormav01'));
        $this->set('_serialize', ['ciselnikPravniFormav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Pravni Formav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->patchEntity($ciselnikPravniFormav01, $this->request->getData());
            if ($this->CiselnikPravniFormav01->save($ciselnikPravniFormav01)) {
                $this->Flash->success(__('The ciselnik pravni formav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik pravni formav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikPravniFormav01'));
        $this->set('_serialize', ['ciselnikPravniFormav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Pravni Formav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikPravniFormav01 = $this->CiselnikPravniFormav01->get($id);
        if ($this->CiselnikPravniFormav01->delete($ciselnikPravniFormav01)) {
            $this->Flash->success(__('The ciselnik pravni formav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik pravni formav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
