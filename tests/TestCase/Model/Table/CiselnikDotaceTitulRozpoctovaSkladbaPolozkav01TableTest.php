<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Table Test Case
 */
class CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Table
     */
    public $CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01') ? [] : ['className' => CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Table::class];
        $this->CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01 = TableRegistry::getTableLocator()->get('CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01);

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
