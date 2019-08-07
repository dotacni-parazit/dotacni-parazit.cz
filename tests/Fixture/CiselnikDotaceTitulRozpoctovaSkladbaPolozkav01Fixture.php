<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Fixture
 */
class CiselnikDotaceTitulRozpoctovaSkladbaPolozkav01Fixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ciselnikDotaceTitul_RozpoctovaSkladbaPolozkav01';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idDotaceTitul' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'idRozpoctovaSkladbaPolozka' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'idDotaceTitul' => ['type' => 'index', 'columns' => ['idDotaceTitul'], 'length' => []],
            'idRozpoctovaSkladbaPolozka' => ['type' => 'index', 'columns' => ['idRozpoctovaSkladbaPolozka'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'idDotaceTitul' => 'Lorem ipsum dolor sit amet',
                'idRozpoctovaSkladbaPolozka' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
