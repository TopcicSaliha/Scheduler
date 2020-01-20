<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\ImageBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\ImageBehavior Test Case
 */
class ImageBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\ImageBehavior
     */
    public $Image;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Image = new ImageBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Image);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
