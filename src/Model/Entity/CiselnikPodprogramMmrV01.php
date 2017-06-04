<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CiselnikPodprogramMmrV01 Entity
 *
 * @property int $id
 * @property string $about
 * @property \Cake\I18n\Time $zaznamPlatnostDoDatum
 * @property \Cake\I18n\Time $zaznamPlatnostOdDatum
 * @property string $podprogramKod
 * @property string $podprogramNazev
 * @property string $zaznamIdentifikator
 * @property string $title
 * @property string $prefLabel
 * @property \Cake\I18n\Time $modified
 */
class CiselnikPodprogramMmrV01 extends Entity
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
