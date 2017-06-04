<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikMmrOperacniProgramv01 Controller
 *
 * @property \App\Model\Table\CiselnikMmrOperacniProgramv01Table $CiselnikMmrOperacniProgramv01
 */
class CiselnikMmrOperacniProgramv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikMmrOperacniProgramv01 = $this->paginate($this->CiselnikMmrOperacniProgramv01);

        $this->set(compact('ciselnikMmrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikMmrOperacniProgramv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Mmr Operacni Programv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikMmrOperacniProgramv01', $ciselnikMmrOperacniProgramv01);
        $this->set('_serialize', ['ciselnikMmrOperacniProgramv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->patchEntity($ciselnikMmrOperacniProgramv01, $this->request->getData());
            if ($this->CiselnikMmrOperacniProgramv01->save($ciselnikMmrOperacniProgramv01)) {
                $this->Flash->success(__('The ciselnik mmr operacni programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr operacni programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikMmrOperacniProgramv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Mmr Operacni Programv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->patchEntity($ciselnikMmrOperacniProgramv01, $this->request->getData());
            if ($this->CiselnikMmrOperacniProgramv01->save($ciselnikMmrOperacniProgramv01)) {
                $this->Flash->success(__('The ciselnik mmr operacni programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik mmr operacni programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikMmrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikMmrOperacniProgramv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Mmr Operacni Programv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikMmrOperacniProgramv01 = $this->CiselnikMmrOperacniProgramv01->get($id);
        if ($this->CiselnikMmrOperacniProgramv01->delete($ciselnikMmrOperacniProgramv01)) {
            $this->Flash->success(__('The ciselnik mmr operacni programv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik mmr operacni programv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
