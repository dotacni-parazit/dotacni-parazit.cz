<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikStatniRozpocetKapitolav01 Entity
 *
 * @property string $id
 * @property float $statniRozpocetKapitolaKod
 * @property string $statniRozpocetKapitolaNazev
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 */
class CiselnikStatniRozpocetKapitolav01 extends Entity
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
