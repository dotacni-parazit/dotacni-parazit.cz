<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikDotaceTitulv01 Controller
 *
 * @property \App\Model\Table\CiselnikDotaceTitulv01Table $CiselnikDotaceTitulv01
 */
class CiselnikDotaceTitulv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotaceTitulv01 = $this->paginate($this->CiselnikDotaceTitulv01);

        $this->set(compact('ciselnikDotaceTitulv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Titulv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->find('all', ['conditions' => ['dotaceTitulKod' => $this->request->getParam('kod    ')]])->first();

        $this->set('ciselnikDotaceTitulv01', $ciselnikDotaceTitulv01);
        $this->set('_serialize', ['ciselnikDotaceTitulv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->patchEntity($ciselnikDotaceTitulv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulv01->save($ciselnikDotaceTitulv01)) {
                $this->Flash->success(__('The ciselnik dotace titulv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titulv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Dotace Titulv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->patchEntity($ciselnikDotaceTitulv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulv01->save($ciselnikDotaceTitulv01)) {
                $this->Flash->success(__('The ciselnik dotace titulv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titulv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Dotace Titulv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikDotaceTitulv01 = $this->CiselnikDotaceTitulv01->get($id);
        if ($this->CiselnikDotaceTitulv01->delete($ciselnikDotaceTitulv01)) {
            $this->Flash->success(__('The ciselnik dotace titulv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik dotace titulv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
