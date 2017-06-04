<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiselnikTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiselnikTable Test Case
 */
class CiselnikTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CiselnikTable
     */
    public $Ciselnik;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ciselnik',
        'app.cedrs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ciselnik') ? [] : ['className' => 'App\Model\Table\CiselnikTable'];
        $this->Ciselnik = TableRegistry::get('Ciselnik', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ciselnik);

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
