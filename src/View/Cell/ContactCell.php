<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Contact cell
 */
class ContactCell extends Cell
{

	/**
	 * List of valid options that can be passed into this
	 * cell's constructor.
	 *
	 * @var array
	 */
	protected $_validCellOptions = [];

	/**
	 * Default display method.
	 *
	 * @return void
	 */
	public function display()
	{
		$this->loadModel('Comms');
		$comms = $this->Comms->newEntity();
		if ($this->request->is('post')) {
			if (!empty($this->request->data['user']['email'])) {
				$this->loadModel('Users'); //TODO: seems excessive to load two models. Perhaps SELECT Users.id with a LEFT JOIN on comms?
				$user = $this->Users->find()
					->select(['Users.id'])
					->where(['Users.email' => $this->request->data['user']['email']])
					->order('created')
					->limit(1)
					->first();
				if ($user) {
					$this->request->data['user']['id'] = $user->id;
				}
			}
			$comms = $this->Comms->patchEntity($comms, array_merge($this->request->data, ['dest' => 'esaul314@gmail.com']), [
				'associated' => ['Users' => ['fieldList' => ['id', 'name', 'email', 'phone']]]
			]);
			if ($this->Comms->save($comms)) {
				$this->set('success', true);
			} else {
				$this->set('success', false);
			}
		}
		$this->set('comms', $comms);
		$this->set('_serialize', ['comms']);
	}
}
