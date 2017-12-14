<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int $year
 * @property int $hruby_zisk
 * @property int $dan_z_prijmu
 * @property int $zisk_po_zdaneni
 * @property int $prijate_dotace_celkem
 * @property int $prijate_pobidky_celkem
 * @property string $note
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 * @property int $company_id
 * @property int $attachment_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Attachment $attachment
 */
class Report extends Entity
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
