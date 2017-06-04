<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SplatkaKalendar Entity
 *
 * @property int $id
 * @property string $about
 * @property float $castkaSplatkaPlanovana
 * @property float $castkaSplatkaSkutecna
 * @property string $uroceniIndikator
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $modified
 */
class SplatkaKalendar extends Entity
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
