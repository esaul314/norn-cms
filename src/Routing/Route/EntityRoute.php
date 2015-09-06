<?php
namespace App\Routing\Route;

use Cake\Routing\Route\Route;

class EntityRoute extends Route {

	public function match(array $url, array $context=[]) {
//debug($url); debug($context); die;
		if (isset($url['_entity'])) {

            $entity = $url['_entity'];
			preg_match_all('@:(\w+)@', $this->template, $matches);

			foreach($matches[1] as $field) {
				$url[$field] = $entity[$field];
			}
			$url = [
				'slug' => $url['_entity']['slug'],
				'controller' => $url['_entity']['controller'],
				'action' => $url['_entity']['action'],
				'plugin' => $url['_entity']['plugin']
			];
		}
		return parent::match($url, $context);
    }
}

