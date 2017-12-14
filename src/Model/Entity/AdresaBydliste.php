<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdresaBydliste Entity
 *
 * @property string $idAdresa
 * @property string $idPrijemce
 * @property float $adrTyp
 * @property string $iriStat
 * @property string $obec
 * @property float $obecKod
 * @property string $obecNazev
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class AdresaBydliste extends Entity
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
        'idAdresa' => false
    ];
}
