<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

	public function validationDefault(Validator $validator) {

		return $validator
			->notEmpty('username', 'Username required')
			->notEmpty('password', 'Password required')
			->notEmpty('role', 'Role required')
			->add('role', 'inList', [
				'rule' => ['inList', ['admin', 'author']],
				'message' => 'Valid role required'
		]);
	}
}
