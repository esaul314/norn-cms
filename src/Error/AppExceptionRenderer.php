<?php
namespace Cake\Error;

use Cake\Error\Exception;

class AppExceptionRenderer extends ExceptionRenderer {

	public function render() {
		$this->controller->helpers = [
			'Html' => [
				'className' => 'Bootstrap.BootstrapHtml',
				'useFontAwesome' => true
			],
			'Form' => [
				'className' => 'Bootstrap.BootstrapForm'
			],
			'Paginator' => [
				'className' => 'Bootstrap.BootstrapPaginator'
			],
			'Modal' => [
				'className' => 'Bootstrap.BootstrapModal'
			],
			'AssetCompress.AssetCompress'
		];
		return parent::render();
	}
}
