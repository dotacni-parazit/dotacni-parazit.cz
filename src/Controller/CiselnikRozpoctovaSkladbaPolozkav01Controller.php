<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikRozpoctovaSkladbaPolozkav01 Controller
 *
 * @property \App\Model\Table\CiselnikRozpoctovaSkladbaPolozkav01Table $CiselnikRozpoctovaSkladbaPolozkav01
 */
class CiselnikRozpoctovaSkladbaPolozkav01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikRozpoctovaSkladbaPolozkav01 = $this->paginate($this->CiselnikRozpoctovaSkladbaPolozkav01);

        $this->set(compact('ciselnikRozpoctovaSkladbaPolozkav01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaPolozkav01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Polozkav01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikRozpoctovaSkladbaPolozkav01', $ciselnikRozpoctovaSkladbaPolozkav01);
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaPolozkav01']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->newEntity();
        if ($this->request->is('post')) {
            $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->patchEntity($ciselnikRozpoctovaSkladbaPolozkav01, $this->request->getData());
            if ($this->CiselnikRozpoctovaSkladbaPolozkav01->save($ciselnikRozpoctovaSkladbaPolozkav01)) {
                $this->Flash->success(__('The ciselnik rozpoctova skladba polozkav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik rozpoctova skladba polozkav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikRozpoctovaSkladbaPolozkav01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaPolozkav01']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Polozkav01 id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->patchEntity($ciselnikRozpoctovaSkladbaPolozkav01, $this->request->getData());
            if ($this->CiselnikRozpoctovaSkladbaPolozkav01->save($ciselnikRozpoctovaSkladbaPolozkav01)) {
                $this->Flash->success(__('The ciselnik rozpoctova skladba polozkav01 has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciselnik rozpoctova skladba polozkav01 could not be saved. Please, try again.'));
        }
        $this->set(compact('ciselnikRozpoctovaSkladbaPolozkav01'));
        $this->set('_serialize', ['ciselnikRozpoctovaSkladbaPolozkav01']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciselnik Rozpoctova Skladba Polozkav01 id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciselnikRozpoctovaSkladbaPolozkav01 = $this->CiselnikRozpoctovaSkladbaPolozkav01->get($id);
        if ($this->CiselnikRozpoctovaSkladbaPolozkav01->delete($ciselnikRozpoctovaSkladbaPolozkav01)) {
            $this->Flash->success(__('The ciselnik rozpoctova skladba polozkav01 has been deleted.'));
        } else {
            $this->Flash->error(__('The ciselnik rozpoctova skladba polozkav01 could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
