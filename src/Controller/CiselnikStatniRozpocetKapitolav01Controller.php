<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikStatniRozpocetKapitolav01 Controller
 *
 * @property \App\Model\Table\CiselnikStatniRozpocetKapitolav01Table $CiselnikStatniRozpocetKapitolav01
 */
class CiselnikStatniRozpocetKapitolav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikStatniRozpocetKapitolav01 = $this->paginate($this->CiselnikStatniRozpocetKapitolav01);

        $this->set(compact('ciselnikStatniRozpocetKapitolav01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetKapitolav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Kapitolav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikStatniRozpocetKapitolav01', $ciselnikStatniRozpocetKapitolav01);
        $this->set('_serialize', ['ciselnikStatniRozpocetKapitolav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->patchEntity($ciselnikStatniRozpocetKapitolav01, $this->request->getData());
            if ($this->CiselnikStatniRozpocetKapitolav01->save($ciselnikStatniRozpocetKapitolav01)) {
                $this->Flash->success(__('The ciselnik statni rozpocet kapitolav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statni rozpocet kapitolav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatniRozpocetKapitolav01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetKapitolav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Kapitolav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->patchEntity($ciselnikStatniRozpocetKapitolav01, $this->request->getData());
            if ($this->CiselnikStatniRozpocetKapitolav01->save($ciselnikStatniRozpocetKapitolav01)) {
                $this->Flash->success(__('The ciselnik statni rozpocet kapitolav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statni rozpocet kapitolav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatniRozpocetKapitolav01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetKapitolav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Kapitolav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikStatniRozpocetKapitolav01 = $this->CiselnikStatniRozpocetKapitolav01->get($id);
        if ($this->CiselnikStatniRozpocetKapitolav01->delete($ciselnikStatniRozpocetKapitolav01)) {
            $this->Flash->success(__('The ciselnik statni rozpocet kapitolav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik statni rozpocet kapitolav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
