<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresFO Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datum_narozeni
 * @property string $jmeno
 * @property string $prijmeni
 * @property int $ico_count
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property AresFOtoICO[] $ares_f_oto_i_c_o
 */
class AresFO extends Entity
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
        'datum_narozeni' => true,
        'jmeno' => true,
        'prijmeni' => true,
        'created' => true,
        'modified' => true,
        'ico_count' => true
    ];
}
