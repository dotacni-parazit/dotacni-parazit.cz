<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CiselnikDotacePoskytovatelV01 Controller
 *
 * @property \App\Model\Table\CiselnikDotacePoskytovatelV01Table $CiselnikDotacePoskytovatelV01
 */
class CiselnikDotacePoskytovatelV01Controller extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ciselnikDotacePoskytovatelV01 = $this->CiselnikDotacePoskytovatelV01->find('all');

        $this->set(compact('ciselnikDotacePoskytovatelV01'));
        $this->set('_serialize', ['ciselnikDotacePoskytovatelV01']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciselnik Dotace Poskytovatel V01 id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciselnikDotacePoskytovatelV01 = $this->CiselnikDotacePoskytovatelV01->get($id, [
            'contain' => []
        ]);

        $this->set('ciselnikDotacePoskytovatelV01', $ciselnikDotacePoskytovatelV01);
        $this->set('_serialize', ['ciselnikDotacePoskytovatelV01']);
    }
}
