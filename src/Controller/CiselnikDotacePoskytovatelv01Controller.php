<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikDotacePoskytovatelv01 Controller
 *
 * @property \App\Model\Table\CiselnikDotacePoskytovatelv01Table $CiselnikDotacePoskytovatelv01
 */
class CiselnikDotacePoskytovatelv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotacePoskytovatelv01 = $this->paginate($this->CiselnikDotacePoskytovatelv01);

        $this->set(compact('ciselnikDotacePoskytovatelv01'));
        $this->set('_serialize', ['ciselnikDotacePoskytovatelv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Poskytovatelv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikDotacePoskytovatelv01', $ciselnikDotacePoskytovatelv01);
        $this->set('_serialize', ['ciselnikDotacePoskytovatelv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->patchEntity($ciselnikDotacePoskytovatelv01, $this->request->getData());
            if ($this->CiselnikDotacePoskytovatelv01->save($ciselnikDotacePoskytovatelv01)) {
                $this->Flash->success(__('The ciselnik dotace poskytovatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace poskytovatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotacePoskytovatelv01'));
        $this->set('_serialize', ['ciselnikDotacePoskytovatelv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Dotace Poskytovatelv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->patchEntity($ciselnikDotacePoskytovatelv01, $this->request->getData());
            if ($this->CiselnikDotacePoskytovatelv01->save($ciselnikDotacePoskytovatelv01)) {
                $this->Flash->success(__('The ciselnik dotace poskytovatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace poskytovatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotacePoskytovatelv01'));
        $this->set('_serialize', ['ciselnikDotacePoskytovatelv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Dotace Poskytovatelv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikDotacePoskytovatelv01 = $this->CiselnikDotacePoskytovatelv01->get($id);
        if ($this->CiselnikDotacePoskytovatelv01->delete($ciselnikDotacePoskytovatelv01)) {
            $this->Flash->success(__('The ciselnik dotace poskytovatelv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik dotace poskytovatelv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
