<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikOkresv01 Controller
 *
 * @property \App\Model\Table\CiselnikOkresv01Table $CiselnikOkresv01
 */
class CiselnikOkresv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikOkresv01 = $this->paginate($this->CiselnikOkresv01);

        $this->set(compact('ciselnikOkresv01'));
        $this->set('_serialize', ['ciselnikOkresv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Okresv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikOkresv01 = $this->CiselnikOkresv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikOkresv01', $ciselnikOkresv01);
        $this->set('_serialize', ['ciselnikOkresv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikOkresv01 = $this->CiselnikOkresv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikOkresv01 = $this->CiselnikOkresv01->patchEntity($ciselnikOkresv01, $this->request->getData());
            if ($this->CiselnikOkresv01->save($ciselnikOkresv01)) {
                $this->Flash->success(__('The ciselnik okresv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik okresv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikOkresv01'));
        $this->set('_serialize', ['ciselnikOkresv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Okresv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikOkresv01 = $this->CiselnikOkresv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikOkresv01 = $this->CiselnikOkresv01->patchEntity($ciselnikOkresv01, $this->request->getData());
            if ($this->CiselnikOkresv01->save($ciselnikOkresv01)) {
                $this->Flash->success(__('The ciselnik okresv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik okresv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikOkresv01'));
        $this->set('_serialize', ['ciselnikOkresv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Okresv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikOkresv01 = $this->CiselnikOkresv01->get($id);
        if ($this->CiselnikOkresv01->delete($ciselnikOkresv01)) {
            $this->Flash->success(__('The ciselnik okresv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik okresv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
