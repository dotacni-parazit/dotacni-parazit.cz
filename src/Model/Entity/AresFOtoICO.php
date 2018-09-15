<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AresFOtoICO Entity
 *
 * @property int $id
 * @property int $fo_id
 * @property int $ico
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\FyzickeOsoby $fyzicke_osoby
 */
class AresFOtoICO extends Entity
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
        'ico' => true,
        'modified' => true,
        'fyzicke_osoby' => true
    ];
}
