<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikRozpoctovaSkladbaParagrafv01 Controller
 *
 * @property \App\Model\Table\CiselnikRozpoctovaSkladbaParagrafv01Table $CiselnikRozpoctovaSkladbaParagrafv01
 */
class CiselnikRozpoctovaSkladbaParagrafv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikRozpoctovaSkladbaParagrafv01 = $this->paginate($this->CiselnikRozpoctovaSkladbaParagrafv01);

        $this->set(compact('ciselnikRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikRozpoctovaSkladbaParagrafv01', $ciselnikRozpoctovaSkladbaParagrafv01);
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->patchEntity($ciselnikRozpoctovaSkladbaParagrafv01, $this->request->getData());
            if ($this->CiselnikRozpoctovaSkladbaParagrafv01->save($ciselnikRozpoctovaSkladbaParagrafv01)) {
                $this->Flash->success(__('The ciselnik rozpoctova skladba paragrafv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik rozpoctova skladba paragrafv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->patchEntity($ciselnikRozpoctovaSkladbaParagrafv01, $this->request->getData());
            if ($this->CiselnikRozpoctovaSkladbaParagrafv01->save($ciselnikRozpoctovaSkladbaParagrafv01)) {
                $this->Flash->success(__('The ciselnik rozpoctova skladba paragrafv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik rozpoctova skladba paragrafv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikRozpoctovaSkladbaParagrafv01 = $this->CiselnikRozpoctovaSkladbaParagrafv01->get($id);
        if ($this->CiselnikRozpoctovaSkladbaParagrafv01->delete($ciselnikRozpoctovaSkladbaParagrafv01)) {
            $this->Flash->success(__('The ciselnik rozpoctova skladba paragrafv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik rozpoctova skladba paragrafv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
