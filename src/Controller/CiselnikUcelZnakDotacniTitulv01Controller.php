<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikUcelZnakDotacniTitulv01 Controller
 *
 * @property \App\Model\Table\CiselnikUcelZnakDotacniTitulv01Table $CiselnikUcelZnakDotacniTitulv01
 */
class CiselnikUcelZnakDotacniTitulv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikUcelZnakDotacniTitulv01 = $this->paginate($this->CiselnikUcelZnakDotacniTitulv01);

        $this->set(compact('ciselnikUcelZnakDotacniTitulv01'));
        $this->set('_serialize', ['ciselnikUcelZnakDotacniTitulv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Ucel Znak Dotacni Titulv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikUcelZnakDotacniTitulv01', $ciselnikUcelZnakDotacniTitulv01);
        $this->set('_serialize', ['ciselnikUcelZnakDotacniTitulv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->patchEntity($ciselnikUcelZnakDotacniTitulv01, $this->request->getData());
            if ($this->CiselnikUcelZnakDotacniTitulv01->save($ciselnikUcelZnakDotacniTitulv01)) {
                $this->Flash->success(__('The ciselnik ucel znak dotacni titulv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik ucel znak dotacni titulv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikUcelZnakDotacniTitulv01'));
        $this->set('_serialize', ['ciselnikUcelZnakDotacniTitulv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Ucel Znak Dotacni Titulv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->patchEntity($ciselnikUcelZnakDotacniTitulv01, $this->request->getData());
            if ($this->CiselnikUcelZnakDotacniTitulv01->save($ciselnikUcelZnakDotacniTitulv01)) {
                $this->Flash->success(__('The ciselnik ucel znak dotacni titulv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik ucel znak dotacni titulv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikUcelZnakDotacniTitulv01'));
        $this->set('_serialize', ['ciselnikUcelZnakDotacniTitulv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Ucel Znak Dotacni Titulv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikUcelZnakDotacniTitulv01 = $this->CiselnikUcelZnakDotacniTitulv01->get($id);
        if ($this->CiselnikUcelZnakDotacniTitulv01->delete($ciselnikUcelZnakDotacniTitulv01)) {
            $this->Flash->success(__('The ciselnik ucel znak dotacni titulv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik ucel znak dotacni titulv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
