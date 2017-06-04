<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RozpoctoveObdobi Controller
 *
 * @property \App\Model\Table\RozpoctoveObdobiTable $RozpoctoveObdobi
 */
class RozpoctoveObdobiController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rozpoctoveObdobi = $this->paginate($this->RozpoctoveObdobi);

        $this->set(compact('rozpoctoveObdobi'));
        $this->set('_serialize', ['rozpoctoveObdobi']);
    }

    /**
     * View method
     *
     * @param string|null $id Rozpoctove Obdobi id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rozpoctoveObdobi = $this->RozpoctoveObdobi->get($id, [
            'contain' => []
        ]);

        $this->set('rozpoctoveObdobi', $rozpoctoveObdobi);
        $this->set('_serialize', ['rozpoctoveObdobi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rozpoctoveObdobi = $this->RozpoctoveObdobi->newEntity();
        if ($this->request->is('post')) {
            $rozpoctoveObdobi = $this->RozpoctoveObdobi->patchEntity($rozpoctoveObdobi, $this->request->getData());
            if ($this->RozpoctoveObdobi->save($rozpoctoveObdobi)) {
                $this->Flash->success(__('The rozpoctove obdobi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozpoctove obdobi could not be saved. Please, try again.'));
        }
        $this->set(compact('rozpoctoveObdobi'));
        $this->set('_serialize', ['rozpoctoveObdobi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rozpoctove Obdobi id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rozpoctoveObdobi = $this->RozpoctoveObdobi->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rozpoctoveObdobi = $this->RozpoctoveObdobi->patchEntity($rozpoctoveObdobi, $this->request->getData());
            if ($this->RozpoctoveObdobi->save($rozpoctoveObdobi)) {
                $this->Flash->success(__('The rozpoctove obdobi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rozpoctove obdobi could not be saved. Please, try again.'));
        }
        $this->set(compact('rozpoctoveObdobi'));
        $this->set('_serialize', ['rozpoctoveObdobi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rozpoctove Obdobi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rozpoctoveObdobi = $this->RozpoctoveObdobi->get($id);
        if ($this->RozpoctoveObdobi->delete($rozpoctoveObdobi)) {
            $this->Flash->success(__('The rozpoctove obdobi has been deleted.'));
        } else {
            $this->Flash->error(__('The rozpoctove obdobi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
