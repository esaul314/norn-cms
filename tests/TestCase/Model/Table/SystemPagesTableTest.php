<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemPagesTable Test Case
 */
class SystemPagesTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SystemPages') ? [] : ['className' => 'App\Model\Table\SystemPagesTable'];
        $this->SystemPages = TableRegistry::get('SystemPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SystemPages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
