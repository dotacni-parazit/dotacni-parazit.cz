<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property int $ico
 * @property string $name
 * @property int $state_id
 * @property int $type_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Audit[] $audits
 * @property \App\Model\Entity\Report[] $reports
 * @property Company[] $subsidiaries
 */
class Company extends Entity
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
