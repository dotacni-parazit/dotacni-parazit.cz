<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Audit Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $auditor_id
 * @property int $year
 * @property string $name
 * @property int $permission
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Auditor $auditor
 */
class Audit extends Entity
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
