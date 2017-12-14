<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $donor_id
 * @property int $recipient_id
 * @property int $attachment_id
 * @property string $year
 * @property int $amount
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Company $donor
 * @property \App\Model\Entity\Company $recipient
 * @property \App\Model\Entity\Attachment $attachment
 */
class Transaction extends Entity
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
