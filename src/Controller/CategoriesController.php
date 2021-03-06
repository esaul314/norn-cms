<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

	public function isAuthorized($user) {
		if ($user['role'] != 'admin') {
			return false;
		}
		return parent::isAuthorized($user);
	}



	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->loadComponent('Util');
		$menu = $this->Util->navMenu(true);
		$this->set('menu', $menu);
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$categories = $this->Categories->find('threaded')
			->contain('ParentCategories')
			->order(['Categories.lft' => 'ASC']);

		$this->set(compact('categories'));
    }

	public function move_up($id = null) {

		$this->request->allowMethod(['post', 'put']);
		$category = $this->Categories->get($id);
		if ($this->Categories->moveUp($category)) {
			$this->Flash->success('Category moved up');
		} else {
			$this->Flash->error('Category could not be moved');
		}
		return $this->redirect($this->referer(['action' => 'index']));
	}

	public function move_down($id = null) {

		$this->request->allowMethod(['post', 'put']);
		$category = $this->Categories->get($id);
		if ($this->Categories->moveDown($category)) {
			$this->Flash->success('Category moved Down');
		} else {
			$this->Flash->error('Category could not be moved');
		}
		return $this->redirect($this->referer(['action' => 'index']));

	}

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'ChildCategories']
        ]);
        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success('The category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The category could not be saved. Please, try again.');
            }
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success('The category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The category could not be saved. Please, try again.');
            }
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success('The category has been deleted.');
        } else {
            $this->Flash->error('The category could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
