<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comms Controller
 *
 * @property \App\Model\Table\CommsTable $Comms
 */
class CommsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CommsStatuses', 'Users']
        ];
        $this->set('comms', $this->paginate($this->Comms));
        $this->set('_serialize', ['comms']);
    }

    /**
     * View method
     *
     * @param string|null $id Comms id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comms = $this->Comms->get($id, [
            'contain' => ['CommsStatuses', 'Users']
        ]);
        $this->set('comms', $comms);
        $this->set('_serialize', ['comms']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comms = $this->Comms->newEntity();
        if ($this->request->is('post')) {
			$comms = $this->Comms->patchEntity($comms, $this->request->data);
            if ($this->Comms->save($comms)) {
                $this->Flash->success(__('The comms has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comms could not be saved. Please, try again.'));
            }
        }
        $commsStatuses = $this->Comms->CommsStatuses->find('list', ['limit' => 200]);
        $users = $this->Comms->Users->find('list', ['limit' => 200]);
        $this->set(compact('comms', 'commsStatuses', 'users'));
        $this->set('_serialize', ['comms']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comms id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comms = $this->Comms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comms = $this->Comms->patchEntity($comms, $this->request->data);
            if ($this->Comms->save($comms)) {
                $this->Flash->success(__('The comms has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comms could not be saved. Please, try again.'));
            }
        }
        $commsStatuses = $this->Comms->CommsStatuses->find('list', ['limit' => 200]);
        $users = $this->Comms->Users->find('list', ['limit' => 200]);
        $this->set(compact('comms', 'commsStatuses', 'users'));
        $this->set('_serialize', ['comms']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comms id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comms = $this->Comms->get($id);
        if ($this->Comms->delete($comms)) {
            $this->Flash->success(__('The comms has been deleted.'));
        } else {
            $this->Flash->error(__('The comms could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
