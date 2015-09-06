<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommsStatuses Controller
 *
 * @property \App\Model\Table\CommsStatusesTable $CommsStatuses
 */
class CommsStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('commsStatuses', $this->paginate($this->CommsStatuses));
        $this->set('_serialize', ['commsStatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Comms Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commsStatus = $this->CommsStatuses->get($id, [
            'contain' => []
        ]);
        $this->set('commsStatus', $commsStatus);
        $this->set('_serialize', ['commsStatus']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commsStatus = $this->CommsStatuses->newEntity();
        if ($this->request->is('post')) {
            $commsStatus = $this->CommsStatuses->patchEntity($commsStatus, $this->request->data);
            if ($this->CommsStatuses->save($commsStatus)) {
                $this->Flash->success(__('The comms status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comms status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('commsStatus'));
        $this->set('_serialize', ['commsStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comms Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commsStatus = $this->CommsStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commsStatus = $this->CommsStatuses->patchEntity($commsStatus, $this->request->data);
            if ($this->CommsStatuses->save($commsStatus)) {
                $this->Flash->success(__('The comms status has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comms status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('commsStatus'));
        $this->set('_serialize', ['commsStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comms Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commsStatus = $this->CommsStatuses->get($id);
        if ($this->CommsStatuses->delete($commsStatus)) {
            $this->Flash->success(__('The comms status has been deleted.'));
        } else {
            $this->Flash->error(__('The comms status could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
