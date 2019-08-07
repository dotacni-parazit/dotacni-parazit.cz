<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BudovaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BudovaTable Test Case
 */
class BudovaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BudovaTable
     */
    public $Budova;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.budova'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Budova') ? [] : ['className' => BudovaTable::class];
        $this->Budova = TableRegistry::get('Budova', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Budova);

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
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
