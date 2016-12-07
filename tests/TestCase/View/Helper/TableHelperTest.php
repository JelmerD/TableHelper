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
        $this->_compareBasePath = APP . 'tests' . DS . 'comparisons' . DS;
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
     * Test create method
     *
     * @return void
     */
    public function testCreate()
    {
        $expected = '<table class="table">';
        $this->assertEquals($expected, $this->TableHelper->create(null, ['class' => 'table']));

        $this->expectException('Cake\Network\Exception\InternalErrorException');
        $this->TableHelper->create();
    }

    /**
     * test caption creation
     */
    public function testCaption()
    {
        $expected = [
            ['table' => true],
            ['caption' => true],
            'Some caption',
            '/caption'
        ];
        $this->assertHtml($expected, $this->TableHelper->create('Some caption'));
    }

    public function testRowOnClosedTable()
    {
        $this->expectException('Cake\Network\Exception\InternalErrorException');
        $this->TableHelper->row();
    }

    /**
     * Test head method
     *
     * @return void
     */
    public function testHead()
    {
        $expected = '<table><thead><tr><th>ID</th><th>Name</th><th>Phone</th></tr></thead></table>';

        $result = $this->TableHelper->create();
        $result .= $this->TableHelper->head(['ID', 'Name']);
        $result .= $this->TableHelper->cell('Phone');
        $result .= $this->TableHelper->end();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test body method
     *
     * @return void
     */
    public function testBody()
    {
        $expected = '<table><tbody><tr><td>ID</td><td>Name</td><td>Phone</td></tr></tbody></table>';

        $result = $this->TableHelper->create();
        $result .= $this->TableHelper->body(['ID', 'Name']);
        $result .= $this->TableHelper->cell('Phone');
        $result .= $this->TableHelper->end();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test foot method
     *
     * @return void
     */
    public function testFoot()
    {
        $expected = '<table><tfoot><tr><td>ID</td><td>Name</td><td>Phone</td></tr></tfoot></table>';

        $result = $this->TableHelper->create();
        $result .= $this->TableHelper->foot(['ID', 'Name']);
        $result .= $this->TableHelper->cell('Phone');
        $result .= $this->TableHelper->end();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test row method
     *
     * @return void
     */
    public function testRow()
    {
        $expected = '<table><tbody><tr><td>ID</td><td>Name</td><td>Phone</td></tr></tbody></table>';

        $result = $this->TableHelper->create();
        $result .= $this->TableHelper->row(['ID', 'Name']);
        $result .= $this->TableHelper->cell('Phone');
        $result .= $this->TableHelper->end();
        $this->assertEquals($expected, $result);
    }

    /**
     * Test cell on closed row
     *
     * @return void
     */
    public function testCellOnClosedRow()
    {
        $this->expectException('Cake\Network\Exception\InternalErrorException');
        $this->TableHelper->cell('Fail');
    }

    /**
     * test cell
     */
    public function testCell()
    {
        $expected = '<td>value</td>';

        $this->TableHelper->create();
        $this->TableHelper->body();
        $this->assertEquals($expected, $this->TableHelper->cell('value'));
    }

    /**
     * Tets cell with options
     */
    public function testCellWithOptions()
    {
        $expected = '<th class="cell">value</th>';

        $this->TableHelper->create();
        $this->TableHelper->body();
        $this->assertEquals($expected, $this->TableHelper->cell('value', [
            'tag' => 'th',
            'class' => 'cell'
        ]));
    }

    /**
     * Test end method
     *
     * @return void
     */
    public function testEnd()
    {
        $expected = '</table>';

        $this->TableHelper->create();
        $this->assertEquals($expected, $this->TableHelper->end());
    }

    /**
     * Test fallback on no head table
     *
     * @return void
     */
    public function testFallbackOnNoHeadTable()
    {
        $this->TableHelper->create();
        $this->TableHelper->foot(['totals', '0']);

        $this->expectException('Cake\Network\Exception\InternalErrorException');
        $this->TableHelper->fallback('No body');
    }

    /**
     * Test the fallback on a filled body
     */
    public function testFallbackOnFilledBody()
    {
        $this->TableHelper->create();
        $this->TableHelper->body(['1', 'Foo']);
        $result = $this->TableHelper->fallback('Empty body');
        $this->assertNull($result);
    }

    /**
     * Test fallback message
     */
    public function testFallback()
    {
        $expected = '</tr></thead><tbody><tr><td colspan="2">Empty body</td>';

        $this->TableHelper->create();
        $this->TableHelper->head(['ID', 'Name']);
        $result = $this->TableHelper->fallback('Empty body');
        $this->assertEquals($expected, $result);
    }

    /**
     * Test count on non existing key
     */
    public function testCountNonExisting() {
        $this->TableHelper->create();
        $this->expectException('Cake\Network\Exception\InternalErrorException');
        $this->TableHelper->count('nothing');
    }

    /**
     * Test count method
     *
     * @return void
     */
    public function testCount()
    {
        $expected = [
            'headColumns' => 3,
            'currentColumns' => 2,
            'headRows' => 1,
            'bodyRows' => 4,
            'footRows' => 2
        ];

        $this->TableHelper->create();
        $this->TableHelper->head(['ID', 'Name']);
        $this->TableHelper->cell('Phone');
        $this->TableHelper->body();
        $this->TableHelper->body();
        $this->TableHelper->body();
        $this->TableHelper->foot();
        $this->TableHelper->foot();
        $this->TableHelper->body(['1', 'Foo']);
        $this->assertEquals($expected, $this->TableHelper->count());
    }
}
