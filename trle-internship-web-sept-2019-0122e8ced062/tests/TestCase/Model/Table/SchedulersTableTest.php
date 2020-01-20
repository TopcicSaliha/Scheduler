<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchedulersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchedulersTable Test Case
 */
class SchedulersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SchedulersTable
     */
    public $Schedulers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Schedulers',
        'app.Model',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Schedulers') ? [] : ['className' => SchedulersTable::class];
        $this->Schedulers = TableRegistry::getTableLocator()->get('Schedulers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Schedulers);

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
