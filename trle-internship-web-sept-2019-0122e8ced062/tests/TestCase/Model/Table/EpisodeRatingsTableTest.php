<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodeRatingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodeRatingsTable Test Case
 */
class EpisodeRatingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EpisodeRatingsTable
     */
    public $EpisodeRatings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EpisodeRatings',
        'app.Users',
        'app.Episodes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EpisodeRatings') ? [] : ['className' => EpisodeRatingsTable::class];
        $this->EpisodeRatings = TableRegistry::getTableLocator()->get('EpisodeRatings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EpisodeRatings);

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
