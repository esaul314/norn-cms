<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SystemPagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SystemPagesController Test Case
 */
class SystemPagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'SystemPages' => 'app.system_pages',
        'Articles' => 'app.articles',
        'Categories' => 'app.categories',
        'ArticleStatuses' => 'app.article_statuses',
        'ArticleTypes' => 'app.article_types'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
