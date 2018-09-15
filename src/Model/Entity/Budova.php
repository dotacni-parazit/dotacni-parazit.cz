<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Budova Entity
 *
 * @property int $id
 * @property int $pocetDotaci
 * @property string $iriStat
 * @property string $ulice
 * @property int $cisloDomovni
 * @property int $psc
 * @property int $pocetPrijemcu
 * @property int $castkaPozadovanaSum
 * @property int $castkaRozhodnuta
 */
class Budova extends Entity
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
        'pocetDotaci' => true,
        'iriStat' => true,
        'ulice' => true,
        'cisloDomovni' => true,
        'psc' => true,
        'pocetPrijemcu' => true,
        'castkaPozadovanaSum' => true,
        'castkaRozhodnuta' => true
    ];
}
