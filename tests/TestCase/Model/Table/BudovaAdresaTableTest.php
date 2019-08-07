<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BudovaAdresaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BudovaAdresaTable Test Case
 */
class BudovaAdresaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BudovaAdresaTable
     */
    public $BudovaAdresa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.budova_adresa'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BudovaAdresa') ? [] : ['className' => BudovaAdresaTable::class];
        $this->BudovaAdresa = TableRegistry::get('BudovaAdresa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BudovaAdresa);

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
