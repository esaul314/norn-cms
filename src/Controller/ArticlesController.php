<?php

namespace App\Controller;

use Cake\Network\Exception\NotFoundException;

class ArticlesController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Flash');
	}

	public function isAuthorized($user) {

		if ($this->request->action == 'add') {
			return true;
		}

		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (integer) $this->request->params['pass'][0];
			if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

	public function index() {
//TODO: select only what is needed, set recursion to -1
		//$articles = $this->Articles->find('all');
		$this->set('articles', $this->Articles->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid article'));
		}
		$article = $this->Articles->get($id);
		$this->set(compact('article'));
	}

	public function add() {
		$article = $this->Articles->newEntity();
		if ($this->request->is('post')) {
			$article = $this->Articles->patchEntity($article, array_merge($this->request->data, ['user_id' => $this->Auth->user('id')]));
			if ($this->Articles->save($article)) {
				$this->Flash->success(__('Your article has been saved'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add article'));
		}
		$this->set('article', $article);
		$categories = $this->Articles->Categories->find('treelist');
		$this->set(compact('categories'));
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('No article'));
		}

		$article = $this->Articles->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Articles->patchEntity($article, $this->request->data);
			if ($this->Articles->save($article)) {
				$this->Flash->success(__('Article updated'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your article'));
		}
		$this->set('article', $article);
		$categories = $this->Articles->Categories->find('treelist');
		$this->set(compact('categories'));
	}

	public function delete($id) {
		$this->request->allowMethod(['post', 'delete']);

		$article = $this->Articles->get($id);
		if ($this->Articles->delete($article)) {
			$this->Flash->success(__('The article with it {0} has been deleted', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
