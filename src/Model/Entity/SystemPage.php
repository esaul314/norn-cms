<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SystemPage Entity.
 */
class SystemPage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'article_id' => true,
        'article' => true,
    ];
}
