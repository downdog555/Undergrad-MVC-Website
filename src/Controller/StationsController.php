<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stations Controller
 *
 * @property \App\Model\Table\StationsTable $Stations
 *
 * @method \App\Model\Entity\Station[] paginate($object = null, array $settings = [])
 */
class StationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $stations = $this->paginate($this->Stations);

        $this->set(compact('stations'));
        $this->set('_serialize', ['stations']);
    }

    /**
     * View method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $station = $this->Stations->get($id, [
            'contain' => []
        ]);

        $this->set('station', $station);
        $this->set('_serialize', ['station']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $station = $this->Stations->newEntity();
        if ($this->request->is('post')) {
            $station = $this->Stations->patchEntity($station, $this->request->getData());
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $this->set(compact('station'));
        $this->set('_serialize', ['station']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $station = $this->Stations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $station = $this->Stations->patchEntity($station, $this->request->getData());
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $this->set(compact('station'));
        $this->set('_serialize', ['station']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $station = $this->Stations->get($id);
        if ($this->Stations->delete($station)) {
            $this->Flash->success(__('The station has been deleted.'));
        } else {
            $this->Flash->error(__('The station could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
