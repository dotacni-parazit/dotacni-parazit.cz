<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dotace Controller
 *
 * @property \App\Model\Table\DotaceTable $Dotace
 */
class DotaceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $dotace = $this->paginate($this->Dotace);

        $this->set(compact('dotace'));
        $this->set('_serialize', ['dotace']);
    }

    /**
     * View method
     *
     * @param string|null $id Dotace id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dotace = $this->Dotace->get($id, [
            'contain' => []
        ]);

        $this->set('dotace', $dotace);
        $this->set('_serialize', ['dotace']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dotace = $this->Dotace->newEntity();
        if ($this->request->is('post')) {
            $dotace = $this->Dotace->patchEntity($dotace, $this->request->getData());
            if ($this->Dotace->save($dotace)) {
                $this->Flash->success(__('The dotace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dotace could not be saved. Please, try again.'));
        }
        $this->set(compact('dotace'));
        $this->set('_serialize', ['dotace']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dotace id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dotace = $this->Dotace->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dotace = $this->Dotace->patchEntity($dotace, $this->request->getData());
            if ($this->Dotace->save($dotace)) {
                $this->Flash->success(__('The dotace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dotace could not be saved. Please, try again.'));
        }
        $this->set(compact('dotace'));
        $this->set('_serialize', ['dotace']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dotace id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dotace = $this->Dotace->get($id);
        if ($this->Dotace->delete($dotace)) {
            $this->Flash->success(__('The dotace has been deleted.'));
        } else {
            $this->Flash->error(__('The dotace could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
