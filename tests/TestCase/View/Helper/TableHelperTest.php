<?php
namespace TableHelper\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use TableHelper\View\Helper\TableHelper;

/**
 * TableHelper\View\Helper\TableHelper Test Case
 */
class TableHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \TableHelper\View\Helper\TableHelper
     */
    public $TableHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->TableHelper = new TableHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TableHelper);

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
     * Test create method
     *
     * @return void
     */
    public function testCreate()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test head method
     *
     * @return void
     */
    public function testHead()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test body method
     *
     * @return void
     */
    public function testBody()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test foot method
     *
     * @return void
     */
    public function testFoot()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test row method
     *
     * @return void
     */
    public function testRow()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test cell method
     *
     * @return void
     */
    public function testCell()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test end method
     *
     * @return void
     */
    public function testEnd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test fallback method
     *
     * @return void
     */
    public function testFallback()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test count method
     *
     * @return void
     */
    public function testCount()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test templates method
     *
     * @return void
     */
    public function testTemplates()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test formatTemplate method
     *
     * @return void
     */
    public function testFormatTemplate()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test templater method
     *
     * @return void
     */
    public function testTemplater()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
