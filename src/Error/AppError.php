<?php
namespace App\Error;

use Cake\Routing\Exception\MissingControllerException;
use Cake\Error\ErrorHandler;


class AppError extends ErrorHandler
{
	public function _displayException($exception) {

		parent::_displayException($exception);
	}
}
