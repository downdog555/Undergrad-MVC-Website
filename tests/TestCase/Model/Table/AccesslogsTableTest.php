<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccesslogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccesslogsTable Test Case
 */
class AccesslogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccesslogsTable
     */
    public $Accesslogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accesslogs',
        'app.cards',
        'app.employees',
        'app.stations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Accesslogs') ? [] : ['className' => AccesslogsTable::class];
        $this->Accesslogs = TableRegistry::get('Accesslogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Accesslogs);

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
