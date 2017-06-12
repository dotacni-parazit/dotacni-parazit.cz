<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RozhodnutiSmlouva Controller
 *
 * @property \App\Model\Table\RozhodnutiSmlouvaTable $RozhodnutiSmlouva
 */
class RozhodnutiSmlouvaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rozhodnutiSmlouva = $this->paginate($this->RozhodnutiSmlouva);

        $this->set(compact('rozhodnutiSmlouva'));
        $this->set('_serialize', ['rozhodnutiSmlouva']);
    }

    /**
     * View method
     *
     * @param string|null $id Rozhodnuti Smlouva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->get($id, [
            'contain' => []
        ]);

        $this->set('rozhodnutiSmlouva', $rozhodnutiSmlouva);
        $this->set('_serialize', ['rozhodnutiSmlouva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->newEntity();
        if ($this->request->is('post')) {
            $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->patchEntity($rozhodnutiSmlouva, $this->request->getData());
            if ($this->RozhodnutiSmlouva->save($rozhodnutiSmlouva)) {
                $this->Flash->success(__('The rozhodnuti smlouva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozhodnuti smlouva could not be saved. Please, try again.'));
        }
        $this->set(compact('rozhodnutiSmlouva'));
        $this->set('_serialize', ['rozhodnutiSmlouva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rozhodnuti Smlouva id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->patchEntity($rozhodnutiSmlouva, $this->request->getData());
            if ($this->RozhodnutiSmlouva->save($rozhodnutiSmlouva)) {
                $this->Flash->success(__('The rozhodnuti smlouva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozhodnuti smlouva could not be saved. Please, try again.'));
        }
        $this->set(compact('rozhodnutiSmlouva'));
        $this->set('_serialize', ['rozhodnutiSmlouva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rozhodnuti Smlouva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rozhodnutiSmlouva = $this->RozhodnutiSmlouva->get($id);
        if ($this->RozhodnutiSmlouva->delete($rozhodnutiSmlouva)) {
            $this->Flash->success(__('The rozhodnuti smlouva has been deleted.'));
        } else {
            $this->Flash->error(__('The rozhodnuti smlouva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
