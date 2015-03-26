<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

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
}
