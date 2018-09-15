<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresFOtoMoney Entity
 *
 * @property int $id
 * @property int $fo_id
 * @property float $sum_cedr_rozhodnuti
 * @property float $sum_cedr_spotreba
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\FyzickeOsoby $fyzicke_osoby
 */
class AresFOtoMoney extends Entity
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
        'fo_id' => true,
        'sum_cedr_rozhodnuti' => true,
        'sum_cedr_spotreba' => true,
        'modified' => true,
        'created' => true,
        'fyzicke_osoby' => true
    ];
}
