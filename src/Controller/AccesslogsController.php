<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accesslogs Controller
 *
 * @property \App\Model\Table\AccesslogsTable $Accesslogs
 *
 * @method \App\Model\Entity\Accesslog[] paginate($object = null, array $settings = [])
 */
class AccesslogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cards', 'Stations']
        ];
        $accesslogs = $this->paginate($this->Accesslogs);

        $this->set(compact('accesslogs'));
        $this->set('_serialize', ['accesslogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Accesslog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accesslog = $this->Accesslogs->get($id, [
            'contain' => ['Cards', 'Stations']
        ]);

        $this->set('accesslog', $accesslog);
        $this->set('_serialize', ['accesslog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accesslog = $this->Accesslogs->newEntity();
        if ($this->request->is('post')) {
            $accesslog = $this->Accesslogs->patchEntity($accesslog, $this->request->getData());
            if ($this->Accesslogs->save($accesslog)) {
                $this->Flash->success(__('The accesslog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accesslog could not be saved. Please, try again.'));
        }
        $cards = $this->Accesslogs->Cards->find('list', ['limit' => 200]);
        $stations = $this->Accesslogs->Stations->find('list', ['limit' => 200]);
        $this->set(compact('accesslog', 'cards', 'stations'));
        $this->set('_serialize', ['accesslog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Accesslog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accesslog = $this->Accesslogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accesslog = $this->Accesslogs->patchEntity($accesslog, $this->request->getData());
            if ($this->Accesslogs->save($accesslog)) {
                $this->Flash->success(__('The accesslog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accesslog could not be saved. Please, try again.'));
        }
        $cards = $this->Accesslogs->Cards->find('list', ['limit' => 200]);
        $stations = $this->Accesslogs->Stations->find('list', ['limit' => 200]);
        $this->set(compact('accesslog', 'cards', 'stations'));
        $this->set('_serialize', ['accesslog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Accesslog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accesslog = $this->Accesslogs->get($id);
        if ($this->Accesslogs->delete($accesslog)) {
            $this->Flash->success(__('The accesslog has been deleted.'));
        } else {
            $this->Flash->error(__('The accesslog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
