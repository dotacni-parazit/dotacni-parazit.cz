<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresSidla Entity
 *
 * @property int $id
 * @property float $ico
 * @property \Cake\I18n\FrozenDate $dod
 * @property \Cake\I18n\FrozenDate $ddo
 * @property string $ulice
 * @property string $obec
 * @property string $stat
 * @property float $psc
 */
class AresSidla extends Entity
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
        'ico' => true,
        'dod' => true,
        'ddo' => true,
        'ulice' => true,
        'obec' => true,
        'stat' => true,
        'psc' => true
    ];
}
