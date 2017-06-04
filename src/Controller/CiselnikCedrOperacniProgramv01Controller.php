<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikCedrOperacniProgramv01 Controller
 *
 * @property \App\Model\Table\CiselnikCedrOperacniProgramv01Table $CiselnikCedrOperacniProgramv01
 */
class CiselnikCedrOperacniProgramv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikCedrOperacniProgramv01 = $this->paginate($this->CiselnikCedrOperacniProgramv01);

        $this->set(compact('ciselnikCedrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikCedrOperacniProgramv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Cedr Operacni Programv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikCedrOperacniProgramv01', $ciselnikCedrOperacniProgramv01);
        $this->set('_serialize', ['ciselnikCedrOperacniProgramv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->patchEntity($ciselnikCedrOperacniProgramv01, $this->request->getData());
            if ($this->CiselnikCedrOperacniProgramv01->save($ciselnikCedrOperacniProgramv01)) {
                $this->Flash->success(__('The ciselnik cedr operacni programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr operacni programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikCedrOperacniProgramv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Cedr Operacni Programv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->patchEntity($ciselnikCedrOperacniProgramv01, $this->request->getData());
            if ($this->CiselnikCedrOperacniProgramv01->save($ciselnikCedrOperacniProgramv01)) {
                $this->Flash->success(__('The ciselnik cedr operacni programv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik cedr operacni programv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikCedrOperacniProgramv01'));
        $this->set('_serialize', ['ciselnikCedrOperacniProgramv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Cedr Operacni Programv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikCedrOperacniProgramv01 = $this->CiselnikCedrOperacniProgramv01->get($id);
        if ($this->CiselnikCedrOperacniProgramv01->delete($ciselnikCedrOperacniProgramv01)) {
            $this->Flash->success(__('The ciselnik cedr operacni programv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik cedr operacni programv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
