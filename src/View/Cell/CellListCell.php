<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CellList cell
 */
class CellListCell extends Cell
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
		$cells = ['Sitemap'];
		$this->set('cells', $cells);
    }
}
