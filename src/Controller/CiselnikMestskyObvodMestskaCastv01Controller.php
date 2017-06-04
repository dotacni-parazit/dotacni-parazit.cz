<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMestskyObvodMestskaCastv01 Controller
 *
 * @property \App\Model\Table\CiselnikMestskyObvodMestskaCastv01Table $CiselnikMestskyObvodMestskaCastv01
 */
class CiselnikMestskyObvodMestskaCastv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMestskyObvodMestskaCastv01 = $this->paginate($this->CiselnikMestskyObvodMestskaCastv01);

        $this->set(compact('ciselnikMestskyObvodMestskaCastv01'));
        $this->set('_serialize', ['ciselnikMestskyObvodMestskaCastv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mestsky Obvod Mestska Castv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMestskyObvodMestskaCastv01', $ciselnikMestskyObvodMestskaCastv01);
        $this->set('_serialize', ['ciselnikMestskyObvodMestskaCastv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->patchEntity($ciselnikMestskyObvodMestskaCastv01, $this->request->getData());
            if ($this->CiselnikMestskyObvodMestskaCastv01->save($ciselnikMestskyObvodMestskaCastv01)) {
                $this->Flash->success(__('The ciselnik mestsky obvod mestska castv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mestsky obvod mestska castv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMestskyObvodMestskaCastv01'));
        $this->set('_serialize', ['ciselnikMestskyObvodMestskaCastv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mestsky Obvod Mestska Castv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->patchEntity($ciselnikMestskyObvodMestskaCastv01, $this->request->getData());
            if ($this->CiselnikMestskyObvodMestskaCastv01->save($ciselnikMestskyObvodMestskaCastv01)) {
                $this->Flash->success(__('The ciselnik mestsky obvod mestska castv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mestsky obvod mestska castv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMestskyObvodMestskaCastv01'));
        $this->set('_serialize', ['ciselnikMestskyObvodMestskaCastv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mestsky Obvod Mestska Castv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMestskyObvodMestskaCastv01 = $this->CiselnikMestskyObvodMestskaCastv01->get($id);
        if ($this->CiselnikMestskyObvodMestskaCastv01->delete($ciselnikMestskyObvodMestskaCastv01)) {
            $this->Flash->success(__('The ciselnik mestsky obvod mestska castv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mestsky obvod mestska castv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
