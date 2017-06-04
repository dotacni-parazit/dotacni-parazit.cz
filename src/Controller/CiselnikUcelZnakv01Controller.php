<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikUcelZnakv01 Controller
 *
 * @property \App\Model\Table\CiselnikUcelZnakv01Table $CiselnikUcelZnakv01
 */
class CiselnikUcelZnakv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikUcelZnakv01 = $this->paginate($this->CiselnikUcelZnakv01);

        $this->set(compact('ciselnikUcelZnakv01'));
        $this->set('_serialize', ['ciselnikUcelZnakv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Ucel Znakv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikUcelZnakv01', $ciselnikUcelZnakv01);
        $this->set('_serialize', ['ciselnikUcelZnakv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->patchEntity($ciselnikUcelZnakv01, $this->request->getData());
            if ($this->CiselnikUcelZnakv01->save($ciselnikUcelZnakv01)) {
                $this->Flash->success(__('The ciselnik ucel znakv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik ucel znakv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikUcelZnakv01'));
        $this->set('_serialize', ['ciselnikUcelZnakv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Ucel Znakv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->patchEntity($ciselnikUcelZnakv01, $this->request->getData());
            if ($this->CiselnikUcelZnakv01->save($ciselnikUcelZnakv01)) {
                $this->Flash->success(__('The ciselnik ucel znakv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik ucel znakv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikUcelZnakv01'));
        $this->set('_serialize', ['ciselnikUcelZnakv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Ucel Znakv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikUcelZnakv01 = $this->CiselnikUcelZnakv01->get($id);
        if ($this->CiselnikUcelZnakv01->delete($ciselnikUcelZnakv01)) {
            $this->Flash->success(__('The ciselnik ucel znakv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik ucel znakv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
