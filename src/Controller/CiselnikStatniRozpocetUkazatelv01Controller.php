<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikStatniRozpocetUkazatelv01 Controller
 *
 * @property \App\Model\Table\CiselnikStatniRozpocetUkazatelv01Table $CiselnikStatniRozpocetUkazatelv01
 */
class CiselnikStatniRozpocetUkazatelv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikStatniRozpocetUkazatelv01 = $this->paginate($this->CiselnikStatniRozpocetUkazatelv01);

        $this->set(compact('ciselnikStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetUkazatelv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikStatniRozpocetUkazatelv01', $ciselnikStatniRozpocetUkazatelv01);
        $this->set('_serialize', ['ciselnikStatniRozpocetUkazatelv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->patchEntity($ciselnikStatniRozpocetUkazatelv01, $this->request->getData());
            if ($this->CiselnikStatniRozpocetUkazatelv01->save($ciselnikStatniRozpocetUkazatelv01)) {
                $this->Flash->success(__('The ciselnik statni rozpocet ukazatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statni rozpocet ukazatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetUkazatelv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->patchEntity($ciselnikStatniRozpocetUkazatelv01, $this->request->getData());
            if ($this->CiselnikStatniRozpocetUkazatelv01->save($ciselnikStatniRozpocetUkazatelv01)) {
                $this->Flash->success(__('The ciselnik statni rozpocet ukazatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik statni rozpocet ukazatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikStatniRozpocetUkazatelv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikStatniRozpocetUkazatelv01 = $this->CiselnikStatniRozpocetUkazatelv01->get($id);
        if ($this->CiselnikStatniRozpocetUkazatelv01->delete($ciselnikStatniRozpocetUkazatelv01)) {
            $this->Flash->success(__('The ciselnik statni rozpocet ukazatelv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik statni rozpocet ukazatelv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
