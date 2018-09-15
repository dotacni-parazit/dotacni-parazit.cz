<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresUdaje Entity
 *
 * @property float $ico
 * @property \Cake\I18n\FrozenDate $aktualizace_db
 * @property \Cake\I18n\FrozenDate $datum_vypisu
 * @property \Cake\I18n\FrozenDate $platnost_od
 * @property \Cake\I18n\FrozenDate $datum_zapisu
 * @property string $stav_subjektu
 */
class AresUdaje extends Entity
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
        'aktualizace_db' => true,
        'datum_vypisu' => true,
        'platnost_od' => true,
        'datum_zapisu' => true,
        'stav_subjektu' => true
    ];
}
