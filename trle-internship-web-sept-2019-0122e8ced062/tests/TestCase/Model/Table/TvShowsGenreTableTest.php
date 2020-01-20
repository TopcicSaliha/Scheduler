<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TvShowsGenreTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TvShowsGenreTable Test Case
 */
class TvShowsGenreTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TvShowsGenreTable
     */
    public $TvShowsGenre;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TvShowsGenre',
        'app.Genres',
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
        $config = TableRegistry::getTableLocator()->exists('TvShowsGenre') ? [] : ['className' => TvShowsGenreTable::class];
        $this->TvShowsGenre = TableRegistry::getTableLocator()->get('TvShowsGenre', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TvShowsGenre);

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
