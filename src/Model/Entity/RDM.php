<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RDM Entity
 *
 * @property int $id
 * @property string|null $kod_prijemce
 * @property int|null $kod_prijemce_num
 * @property string|null $ico_prijemce
 * @property int|null $ico_prijemce_num
 * @property string $ico_poskytovatele
 * @property int $castka_kc
 * @property string $ucel
 * @property string $in_year
 * @property \Cake\I18n\FrozenTime $created
 */
class RDM extends Entity
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
        'kod_prijemce' => true,
        'kod_prijemce_num' => true,
        'ico_prijemce' => true,
        'ico_prijemce_num' => true,
        'ico_poskytovatele' => true,
        'castka_kc' => true,
        'ucel' => true,
        'in_year' => true,
        'created' => true
    ];
}
