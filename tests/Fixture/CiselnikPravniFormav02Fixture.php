<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CiselnikPravniFormav02Fixture
 */
class CiselnikPravniFormav02Fixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ciselnikPravniFormav02';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 85, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pravniFormaKod' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'pravniFormaNazev' => ['type' => 'string', 'length' => 117, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pravniFormaNazevZkraceny' => ['type' => 'string', 'length' => 3, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pravniFormaTypKod' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'zaznamPlatnostOdDatum' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'zaznamPlatnostDoDatum' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'pravniFormaKod' => ['type' => 'index', 'columns' => ['pravniFormaKod'], 'length' => []],
            'pravniFormaNazev' => ['type' => 'index', 'columns' => ['pravniFormaNazev'], 'length' => []],
            'pravniFormaTypKod' => ['type' => 'index', 'columns' => ['pravniFormaTypKod'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'id' => '15af361c-d8d9-49b6-abb3-830394a584d6',
                'pravniFormaKod' => 1.5,
                'pravniFormaNazev' => 'Lorem ipsum dolor sit amet',
                'pravniFormaNazevZkraceny' => 'L',
                'pravniFormaTypKod' => 1.5,
                'zaznamPlatnostOdDatum' => '2019-08-07 11:42:51',
                'zaznamPlatnostDoDatum' => '2019-08-07 11:42:51'
            ],
        ];
        parent::init();
    }
}
