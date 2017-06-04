<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikStatV01 Entity
 *
 * @property int $id
 * @property string $about
 * @property int $statKod3Cisla
 * @property string $statKod3Znaky
 * @property string $statKodOmezeny
 * @property string $statNazev
 * @property string $statNazevZkraceny
 * @property string $statCiselnikAxisStatKod
 * @property string $statNazevEn
 * @property string $statNazevZkracenyEn
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property string $title
 * @property \Cake\I18n\Time $modified
 */
class CiselnikStatV01 extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
