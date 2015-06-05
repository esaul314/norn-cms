<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\ForbiddenException;
use Cake\Event\Event;

class UsersController extends AppController {

	public function beforeFilter(Event $event) {

		parent::beforeFilter($event);
		//$this->Auth->allow('add', 'logout');
		$this->Auth->allow('logout');
	}

	public function login() {

		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password'));
		}
	}

	public function logout() {

		return $this->redirect($this->Auth->logout());
	}

	public function index() {

		$this->set('users', $this->Users->find('all'));
	}

	public function view($id) {

		if (!$id) {
			throw new NotFoundException(__('Invalid User'));
		}
		$user = $this->Users->get($id);
		$this->set(compact('user'));
	}

	public function add() {
		$user = $this->Users->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if (!($role = $this->Auth->user('role')) || $role != 'admin') {
				$this->request->data['role'] = 'author';
			}
			if ($this->Users->save($user)) {
				$this->Flash->success(__('User saved'));
				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error(__('User not added'));
		}
		$this->set('user', $user);
	}

}
