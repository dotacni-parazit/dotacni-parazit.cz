<?php

namespace App\Controller;

/**
 * CiselnikDotaceTitulV01 Controller
 *
 * @property \App\Model\Table\CiselnikDotaceTitulV01Table $CiselnikDotaceTitulV01
 */
class CiselnikDotaceTitulV01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->find('all');

        $this->set(compact('ciselnikDotaceTitulV01'));
        $this->set('_serialize', ['ciselnikDotaceTitulV01']);
    }


    public function tituly()
    {
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->find('all')->distinct('dotaceTitulNazev');

        $this->set(compact('ciselnikDotaceTitulV01'));
        $this->set('_serialize', ['ciselnikDotaceTitulV01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Titul V01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikDotaceTitulV01', $ciselnikDotaceTitulV01);
        $this->set('_serialize', ['ciselnikDotaceTitulV01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->patchEntity($ciselnikDotaceTitulV01, $this->request->getData());
            if ($this->CiselnikDotaceTitulV01->save($ciselnikDotaceTitulV01)) {
                $this->Flash->success(__('The ciselnik dotace titul v01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul v01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulV01'));
        $this->set('_serialize', ['ciselnikDotaceTitulV01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Dotace Titul V01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->patchEntity($ciselnikDotaceTitulV01, $this->request->getData());
            if ($this->CiselnikDotaceTitulV01->save($ciselnikDotaceTitulV01)) {
                $this->Flash->success(__('The ciselnik dotace titul v01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul v01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulV01'));
        $this->set('_serialize', ['ciselnikDotaceTitulV01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Dotace Titul V01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikDotaceTitulV01 = $this->CiselnikDotaceTitulV01->get($id);
        if ($this->CiselnikDotaceTitulV01->delete($ciselnikDotaceTitulV01)) {
            $this->Flash->success(__('The ciselnik dotace titul v01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik dotace titul v01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
