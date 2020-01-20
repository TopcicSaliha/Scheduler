<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieActorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieActorsTable Test Case
 */
class MovieActorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieActorsTable
     */
    public $MovieActors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MovieActors',
        'app.Actors',
        'app.Movies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MovieActors') ? [] : ['className' => MovieActorsTable::class];
        $this->MovieActors = TableRegistry::getTableLocator()->get('MovieActors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieActors);

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
