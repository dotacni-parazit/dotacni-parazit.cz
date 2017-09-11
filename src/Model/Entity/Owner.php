<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Owner Entity
 *
 * @property int $id
 * @property int $owner_id
 * @property int $holding_id
 * @property float $shares_percent
 * @property int $year
 * @property string $notes
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Owner[] $owners
 * @property \App\Model\Entity\Company $company
 */
class Owner extends Entity
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
