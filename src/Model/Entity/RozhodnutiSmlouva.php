<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RozhodnutiSmlouva Entity
 *
 * @property string $idSmlouva
 * @property string $idRozhodnuti
 * @property string $cisloJednaciRozhodnuti
 * @property bool $dokumentDruhKod
 * @property \Cake\I18n\Time $rozhodnutiDatum
 * @property \Cake\I18n\Time $dtAktualizace
 */
class RozhodnutiSmlouva extends Entity
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
        'idSmlouva' => false
    ];
}
