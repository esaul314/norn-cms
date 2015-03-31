<?php

namespace App\Controller;

use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Hash;
use Cake\Event\Event;

class ArticlesController extends AppController {

	public $helpers = ['Tanuck/Markdown.Markdown'];

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Flash');
	}

	public function isAuthorized($user) {
		if ($this->request->action == 'add' && $user['role'] != 'admin') {
			return false;
		}

		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (integer) $this->request->params['pass'][0];
			if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		if (in_array($this->request->params['action'], ['index'])) {
			$aboutUs = $this->Articles->find('all', [
				'fields' => ['title', 'slug'],
				'conditions' => ['SystemPages.name' => 'aboutUs'],
				'contain' => ['SystemPages']
				])
				->first()
				->toArray();
			//debug($aboutUs);
			$this->set('aboutUs', $aboutUs);
		}
	}

	public function index() {
		$articlesRes = $this->Articles->find('all')
			->where(['Articles.article_status_id' => ARTICLE_STATUS_ACTIVE, 'Articles.article_type_id !=' => ARTICLE_TYPE_SYSTEM])
			->toArray();
		$articles = array();
		foreach ($articlesRes as $key => $article) {
			if (is_object($article)) {
				$articlesRes[$key] = $article->toArray();
			}
			$articles[$articlesRes[$key]['id']] = $articlesRes[$key];
		}
		$featured = Hash::extract($articles, '{n}[article_type_id=2]');
		array_splice($featured, 3);
		$this->loadComponent('Util');
		$articles = $this->Util->arrayDiff($articles, $featured);
		$this->set(compact('articles', 'featured'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid article'));
		}
		//$article = $this->Articles->get($id);
		$article = $this->Articles->find('slug', ['slug' => $id])->first();
		$this->set(compact('article'));
	}

	public function add() {
		$article = $this->Articles->newEntity();
		if ($this->request->is('post')) {
			$article = $this->Articles->patchEntity($article, array_merge($this->request->data, ['user_id' => $this->Auth->user('id')]));
			$this->Articles->slug($article);
			if ($this->Articles->save($article)) {
				$this->Flash->success(__('Your article has been saved'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add article'));
		}
		$this->set('article', $article);
		$categories = $this->Articles->Categories->find('treelist');
		$articleStatuses = $this->Articles->ArticleStatuses->find('list')->toArray();
		$articleTypes = $this->Articles->ArticleTypes->find('list')->toArray();
		$this->set(compact('categories', 'articleStatuses', 'articleTypes'));
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('No article'));
		}

		$article = $this->Articles->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Articles->patchEntity($article, $this->request->data);
			$this->Articles->slug($article);
			if ($this->Articles->save($article)) {
				$this->Flash->success(__('Article updated'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your article'));
		}
		$this->set('article', $article);
		$categories = $this->Articles->Categories->find('treelist');
		$articleStatuses = $this->Articles->ArticleStatuses->find('list')->toArray();
		$articleTypes = $this->Articles->ArticleTypes->find('list')->toArray();
		$this->set(compact('categories', 'articleStatuses', 'articleTypes'));
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
