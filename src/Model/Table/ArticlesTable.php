<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table {

	public function initialize(array $config) {
		$this->addBehavior('Timestamp');
		$this->addBehavior('Sluggable');
		$this->addAssociations([
			'belongsTo' => [
				'Categories',
				'ArticleStatuses',
				'ArticleTypes'
			],
			'hasOne' => [
				'SystemPages' => [
					'className' => 'SystemPages',
					//'conditions' => 'Articles.id = SystemPages.article_id',
					'dependent' => true
				]
			]
		]);
		//$this->belongsTo('Categories', [
			//'foreign_key' => 'category_id'
		//]);
	}

	public function validationDefault(Validator $validator) {
		$validator
			->notEmpty('title')
			->notEmpty('body');

		return $validator;
	}

	public function isOwnedBy($articleId, $userId) {

		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}

}

