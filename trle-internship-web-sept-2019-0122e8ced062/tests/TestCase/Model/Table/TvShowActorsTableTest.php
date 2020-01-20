<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TvShowActorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TvShowActorsTable Test Case
 */
class TvShowActorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TvShowActorsTable
     */
    public $TvShowActors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TvShowActors',
        'app.Actors',
        'app.TvShows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TvShowActors') ? [] : ['className' => TvShowActorsTable::class];
        $this->TvShowActors = TableRegistry::getTableLocator()->get('TvShowActors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TvShowActors);

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
