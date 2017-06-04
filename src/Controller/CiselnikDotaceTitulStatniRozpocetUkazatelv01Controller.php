<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikDotaceTitulStatniRozpocetUkazatelv01 Controller
 *
 * @property \App\Model\Table\CiselnikDotaceTitulStatniRozpocetUkazatelv01Table $CiselnikDotaceTitulStatniRozpocetUkazatelv01
 */
class CiselnikDotaceTitulStatniRozpocetUkazatelv01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->paginate($this->CiselnikDotaceTitulStatniRozpocetUkazatelv01);

        $this->set(compact('ciselnikDotaceTitulStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulStatniRozpocetUkazatelv01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Titul Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikDotaceTitulStatniRozpocetUkazatelv01', $ciselnikDotaceTitulStatniRozpocetUkazatelv01);
        $this->set('_serialize', ['ciselnikDotaceTitulStatniRozpocetUkazatelv01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->patchEntity($ciselnikDotaceTitulStatniRozpocetUkazatelv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->save($ciselnikDotaceTitulStatniRozpocetUkazatelv01)) {
                $this->Flash->success(__('The ciselnik dotace titul statni rozpocet ukazatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul statni rozpocet ukazatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulStatniRozpocetUkazatelv01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Dotace Titul Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->patchEntity($ciselnikDotaceTitulStatniRozpocetUkazatelv01, $this->request->getData());
            if ($this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->save($ciselnikDotaceTitulStatniRozpocetUkazatelv01)) {
                $this->Flash->success(__('The ciselnik dotace titul statni rozpocet ukazatelv01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik dotace titul statni rozpocet ukazatelv01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikDotaceTitulStatniRozpocetUkazatelv01'));
        $this->set('_serialize', ['ciselnikDotaceTitulStatniRozpocetUkazatelv01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Dotace Titul Statni Rozpocet Ukazatelv01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikDotaceTitulStatniRozpocetUkazatelv01 = $this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->get($id);
        if ($this->CiselnikDotaceTitulStatniRozpocetUkazatelv01->delete($ciselnikDotaceTitulStatniRozpocetUkazatelv01)) {
            $this->Flash->success(__('The ciselnik dotace titul statni rozpocet ukazatelv01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik dotace titul statni rozpocet ukazatelv01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
