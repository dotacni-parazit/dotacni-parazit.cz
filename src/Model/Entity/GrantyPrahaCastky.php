<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrantyPrahaCastky Entity
 *
 * @property int $id
 * @property float $castka_naklady
 * @property float $castka_pozadovana
 * @property float $castka_pridelena
 * @property float $castka_vycerpana
 * @property string $id_projekt
 * @property string $id_zadatel
 */
class GrantyPrahaCastky extends Entity
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
        'castka_naklady' => true,
        'castka_pozadovana' => true,
        'castka_pridelena' => true,
        'castka_vycerpana' => true,
        'id_projekt' => true,
        'id_zadatel' => true
    ];
}
