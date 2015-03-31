<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SystemPages Controller
 *
 * @property \App\Model\Table\SystemPagesTable $SystemPages
 */
class SystemPagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles']
        ];
        $this->set('systemPages', $this->paginate($this->SystemPages));
        $this->set('_serialize', ['systemPages']);
    }

    /**
     * View method
     *
     * @param string|null $id System Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $systemPage = $this->SystemPages->get($id, [
            'contain' => ['Articles']
        ]);
        $this->set('systemPage', $systemPage);
        $this->set('_serialize', ['systemPage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $systemPage = $this->SystemPages->newEntity();
        if ($this->request->is('post')) {
            $systemPage = $this->SystemPages->patchEntity($systemPage, $this->request->data);
            if ($this->SystemPages->save($systemPage)) {
                $this->Flash->success('The system page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The system page could not be saved. Please, try again.');
            }
        }
        $articles = $this->SystemPages->Articles->find('list', ['limit' => 200]);
        $this->set(compact('systemPage', 'articles'));
        $this->set('_serialize', ['systemPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id System Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $systemPage = $this->SystemPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $systemPage = $this->SystemPages->patchEntity($systemPage, $this->request->data);
            if ($this->SystemPages->save($systemPage)) {
                $this->Flash->success('The system page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The system page could not be saved. Please, try again.');
            }
        }
        $articles = $this->SystemPages->Articles->find('list', ['limit' => 200]);
        $this->set(compact('systemPage', 'articles'));
        $this->set('_serialize', ['systemPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id System Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $systemPage = $this->SystemPages->get($id);
        if ($this->SystemPages->delete($systemPage)) {
            $this->Flash->success('The system page has been deleted.');
        } else {
            $this->Flash->error('The system page could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
