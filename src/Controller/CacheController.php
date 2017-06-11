<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cache Controller
 *
 * @property \App\Model\Table\CacheTable $Cache
 */
class CacheController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cache = $this->paginate($this->Cache);

        $this->set(compact('cache'));
        $this->set('_serialize', ['cache']);
    }

    /**
     * View method
     *
     * @param string|null $id Cache id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cache = $this->Cache->get($id, [
            'contain' => []
        ]);

        $this->set('cache', $cache);
        $this->set('_serialize', ['cache']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cache = $this->Cache->newEntity();
        if ($this->request->is('post')) {
            $cache = $this->Cache->patchEntity($cache, $this->request->getData());
            if ($this->Cache->save($cache)) {
                $this->Flash->success(__('The cache has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cache could not be saved. Please, try again.'));
        }
        $this->set(compact('cache'));
        $this->set('_serialize', ['cache']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cache id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cache = $this->Cache->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cache = $this->Cache->patchEntity($cache, $this->request->getData());
            if ($this->Cache->save($cache)) {
                $this->Flash->success(__('The cache has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cache could not be saved. Please, try again.'));
        }
        $this->set(compact('cache'));
        $this->set('_serialize', ['cache']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cache id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cache = $this->Cache->get($id);
        if ($this->Cache->delete($cache)) {
            $this->Flash->success(__('The cache has been deleted.'));
        } else {
            $this->Flash->error(__('The cache could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
