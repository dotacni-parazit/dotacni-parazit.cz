<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikMmrGrantoveSchemav01 Entity
 *
 * @property string $idGrantoveSchema
 * @property string $grantoveSchemaKod
 * @property string $grantoveSchemaNazev
 * @property bool $grantoveSchemaCislo
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikMmrGrantoveSchemav01 extends Entity
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
        'idGrantoveSchema' => false
    ];
}
