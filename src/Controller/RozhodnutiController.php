<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rozhodnuti Controller
 *
 * @property \App\Model\Table\RozhodnutiTable $Rozhodnuti
 */
class RozhodnutiController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rozhodnuti = $this->paginate($this->Rozhodnuti);

        $this->set(compact('rozhodnuti'));
        $this->set('_serialize', ['rozhodnuti']);
    }

    /**
     * View method
     *
     * @param string|null $id Rozhodnuti id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rozhodnuti = $this->Rozhodnuti->get($id, [
            'contain' => [
                'CiselnikDotacePoskytovatelv01',
                'CiselnikFinancniZdrojv01',
                'CiselnikFinancniProstredekCleneniv01'
            ]
        ]);

        $this->set('rozhodnuti', $rozhodnuti);
        $this->set('_serialize', ['rozhodnuti']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rozhodnuti = $this->Rozhodnuti->newEntity();
        if ($this->request->is('post')) {
            $rozhodnuti = $this->Rozhodnuti->patchEntity($rozhodnuti, $this->request->getData());
            if ($this->Rozhodnuti->save($rozhodnuti)) {
                $this->Flash->success(__('The rozhodnuti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozhodnuti could not be saved. Please, try again.'));
        }
        $this->set(compact('rozhodnuti'));
        $this->set('_serialize', ['rozhodnuti']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rozhodnuti id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rozhodnuti = $this->Rozhodnuti->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rozhodnuti = $this->Rozhodnuti->patchEntity($rozhodnuti, $this->request->getData());
            if ($this->Rozhodnuti->save($rozhodnuti)) {
                $this->Flash->success(__('The rozhodnuti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozhodnuti could not be saved. Please, try again.'));
        }
        $this->set(compact('rozhodnuti'));
        $this->set('_serialize', ['rozhodnuti']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rozhodnuti id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rozhodnuti = $this->Rozhodnuti->get($id);
        if ($this->Rozhodnuti->delete($rozhodnuti)) {
            $this->Flash->success(__('The rozhodnuti has been deleted.'));
        } else {
            $this->Flash->error(__('The rozhodnuti could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
