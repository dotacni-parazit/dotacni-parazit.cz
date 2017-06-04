<?php

namespace App\Controller;

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
        $dotace = $this->paginate($this->Dotace, ['contain' => ['Rozhodnuti']]);

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
            'contain' => ['Rozhodnuti']
        ]);

        $this->set('dotace', $dotace);
        $this->set('_serialize', ['dotace']);
    }
}
