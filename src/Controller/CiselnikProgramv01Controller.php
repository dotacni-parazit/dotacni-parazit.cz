<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikProgramv01 Controller
 *
 * @property \App\Model\Table\CiselnikProgramv01Table $CiselnikProgramv01
 */
class CiselnikProgramv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikProgramv01 = $this->paginate($this->CiselnikProgramv01);

        $this->set(compact('ciselnikProgramv01'));
        $this->set('_serialize', ['ciselnikProgramv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Programv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikProgramv01 = $this->CiselnikProgramv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikProgramv01', $ciselnikProgramv01);
        $this->set('_serialize', ['ciselnikProgramv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikProgramv01 = $this->CiselnikProgramv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikProgramv01 = $this->CiselnikProgramv01->patchEntity($ciselnikProgramv01, $this->request->getData());
            if ($this->CiselnikProgramv01->save($ciselnikProgramv01)) {
                $this->Flash->success(__('The ciselnik programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikProgramv01'));
        $this->set('_serialize', ['ciselnikProgramv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Programv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikProgramv01 = $this->CiselnikProgramv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikProgramv01 = $this->CiselnikProgramv01->patchEntity($ciselnikProgramv01, $this->request->getData());
            if ($this->CiselnikProgramv01->save($ciselnikProgramv01)) {
                $this->Flash->success(__('The ciselnik programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikProgramv01'));
        $this->set('_serialize', ['ciselnikProgramv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Programv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikProgramv01 = $this->CiselnikProgramv01->get($id);
        if ($this->CiselnikProgramv01->delete($ciselnikProgramv01)) {
            $this->Flash->success(__('The ciselnik programv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik programv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
