<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiselnikPravniFormav02Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiselnikPravniFormav02Table Test Case
 */
class CiselnikPravniFormav02TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CiselnikPravniFormav02Table
     */
    public $CiselnikPravniFormav02;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CiselnikPravniFormav02'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CiselnikPravniFormav02') ? [] : ['className' => CiselnikPravniFormav02Table::class];
        $this->CiselnikPravniFormav02 = TableRegistry::getTableLocator()->get('CiselnikPravniFormav02', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CiselnikPravniFormav02);

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
