<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01 Controller
 *
 * @property \App\Model\Table\CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01Table $CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01
 */
class CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->paginate($this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01);

        $this->set(compact('ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Titul Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01', $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01);
        $this->set('_serialize', ['ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->patchEntity($ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->save($ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01)) {
                $this->Flash->success(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Dotace Titul Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->patchEntity($ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->save($ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01)) {
                $this->Flash->success(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Dotace Titul Rozpoctova Skladba Paragrafv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01 = $this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->get($id);
        if ($this->CiselnikDotaceTitulRozpoctovaSkladbaParagrafv01->delete($ciselnikDotaceTitulRozpoctovaSkladbaParagrafv01)) {
            $this->Flash->success(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik dotace titul rozpoctova skladba paragrafv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
