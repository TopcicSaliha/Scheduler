<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieRatingsTable Test Case
 */
class MovieRatingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieRatingsTable
     */
    public $MovieRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MovieRatings',
        'app.Users',
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
        $config = TableRegistry::getTableLocator()->exists('MovieRatings') ? [] : ['className' => MovieRatingsTable::class];
        $this->MovieRatings = TableRegistry::getTableLocator()->get('MovieRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieRatings);

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
