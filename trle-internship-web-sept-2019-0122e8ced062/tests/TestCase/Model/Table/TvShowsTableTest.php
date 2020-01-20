<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TvShowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TvShowsTable Test Case
 */
class TvShowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TvShowsTable
     */
    public $TvShows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('TvShows') ? [] : ['className' => TvShowsTable::class];
        $this->TvShows = TableRegistry::getTableLocator()->get('TvShows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TvShows);

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
}
