<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikDotaceTitulPolozkaV01 Entity
 *
 * @property int $id
 * @property string $about
 * @property string $rozpoctovaSkladbaPolozka
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property \Cake\I18n\Time $modified
 */
class CiselnikDotaceTitulPolozkaV01 extends Entity
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
