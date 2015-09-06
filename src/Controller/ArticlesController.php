<?php

namespace App\Controller;

use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Hash;
use Cake\Event\Event;

class ArticlesController extends AppController {

	public $helpers = [
		'Tanuck/Markdown.Markdown' => [
			'parser' => 'MarkdownExtra'
		]
	];

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Flash');
		$this->loadComponent('Paginator');
		//TODO: check if it's the URL corresponding to the SystemPages contactUs page
		$page = isset($this->request->params['pass'][0]) ? strtolower($this->request->params['pass'][0]) : false;
		if (!$page || ($page && !in_array($page, ['contactenos']))) {
			$this->loadComponent('Cache.Cache', [
				'actions' => ['index', 'view']
			]);
		}
	}

	public function isAuthorized($user) {
		if (in_array($this->request->action, ['add', 'listing']) && $user['role'] != 'admin') {
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
		$this->Auth->allow(['index', 'view', 'site_map']);
		if (in_array($this->request->params['action'], ['index', 'view', 'site_map'])) {
			//TODO: only do the stuff below when cache expires, check for cached menu first
			$this->loadComponent('Util');
			$menu = $this->Util->navMenu();
			$this->set('menu', $menu);
		}

		if (in_array($this->request->params['action'], ['add', 'edit'])) {
			$this->set('skipNav', true);
		}
	}

	public function listing() {
		//TODO: custom finder will look nicer here
		$this->paginate = [
			'fields' => ['Articles.id', 'Articles.title', 'Articles.slug', 'Categories.name', 'Articles.article_type_id', 'Articles.modified'],
			'contain' => ['Categories'],
			'limit' => 25,
			'order' => [
				'Articles.id' => 'desc'
			]
		];

		$this->set('articles', $this->paginate($this->Articles));
		$this->set('skipNav', true);
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

		$intro = $this->Articles->find('all', [
			'fields' => ['body'],
			'conditions' => ['SystemPages.article_id = Articles.id', 'SystemPages.name' => 'intro'],
			'contain' => ['SystemPages']
		])->first();

		$featured = Hash::extract($articles, '{n}[article_type_id=2]');
		array_splice($featured, 3);
		$this->loadComponent('Util');
		$articles = $this->Util->arrayDiff($articles, $featured);
		$belowFooter = 'googlemap'; //TODO: make this into a more global and elegant construct
		$this->set(compact('articles', 'featured', 'intro', 'belowFooter'));
	}

	public function view($id = null) {
		if (
			!$id
			|| !$article = $this->Articles->find('slug', ['slug' => $id, 'article_status_id' => ARTICLE_STATUS_ACTIVE])->first()
		) {
			throw new NotFoundException(__('Invalid article'));
		}
		//$article = $this->Articles->get($id);
		$article = $this->Articles->find('slug', ['slug' => $id])->first();
		//$related = $this->Articles->findByCategoryId($article->category_id, ['id !=' => $article->id])->first();
		if ($article->category_id && ARTICLE_SHOW_RELATED) {
			$related = $this->Articles->find('all', [
				'conditions' => [
					'category_id' => $article->category_id,
					'id !=' => $article->id,
					'article_status_id' => ARTICLE_STATUS_ACTIVE
				]
			])->first();
		} else {
			$related = array();
		}
		$this->set(compact('article', 'related'));
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
