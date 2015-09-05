<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class UtilComponent extends Component {

	public function arrayDiff($firstArr, $secondArr) {

		$arr1 = $firstArr;
		$arr2 = $secondArr;

		array_walk($arr1, function(&$arr, $pos) {
			$arr = serialize($arr);
		});

		array_walk($arr2, function(&$arr, $pos) {
			$arr = serialize($arr);
		});

		$diff = array_diff($arr1, $arr2);

		array_walk($diff, function(&$arr, $pos) {
			$arr = unserialize($arr);
		});

		return $diff;
	}

	public function navMenu($admin = false) {
		$menu = [];
		if ($admin) {
			return [

			];
		}
		$this->Articles = TableRegistry::get('Articles');
		//TODO: clumsy query. redo it with RIGHT JOIN
		$menuObj = $this->Articles->find('all', [
			'fields' => ['title', 'slug', 'SystemPages.name'],
			'conditions' => ['SystemPages.article_id = Articles.id'],
			'contain' => ['SystemPages']
		]);
		if (NAV_MENU_CACHE) {
			$menuObj->cache('nav_menu', '1day');
		}
		$menuObj = $menuObj->toArray();
		foreach ($menuObj as $k => $menuItem) {
			if (is_object($menuItem)) {
				$menu[$menuItem->system_page->name] = ['title' => $menuItem->title, 'slug' => $menuItem->slug];
			}
		}
		return $menu;
	}

}
