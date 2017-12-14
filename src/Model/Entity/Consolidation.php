<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consolidation Entity
 *
 * @property int $id
 * @property int $holding_id
 * @property int $subsidiary_id
 * @property int $attachment_id
 * @property int $year
 * @property float $shares_percent
 * @property string $notes
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Company $subsidiary
 * @property \App\Model\Entity\Attachment $attachment
 */
class Consolidation extends Entity
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
