<?php
namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;

class SluggableBehavior extends Behavior {

	protected $_defaultConfig = [
		'field' => 'title',
		'slug' => 'slug',
		'replacement' => '-',
    ];

	//public function initialize(array $config) {

	//}

	public function slug(Entity $entity) {
		$config = $this->config();
		if (!$value = $entity->get($config['slug'])) {
			$value = $entity->get($config['field']);
		}
		$entity->set($config['slug'], Inflector::slug($value, $config['replacement']));
	}

	public function beforeSave(Event $event, Entity $entity ) {
		$this->slug($entity);
	}

	public function findSlug(Query $query, array $options) {
		return $query->where(['slug' => $options['slug']]);
	}

}
