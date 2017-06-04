<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdresaSidlo Entity
 *
 * @property string $idAdresa
 * @property string $idPrijemce
 * @property bool $adrTyp
 * @property string $iriStat
 * @property string $iriObec
 * @property float $obecKod
 * @property string $obecNazev
 * @property float $psc
 * @property float $adresniMistoKod
 * @property bool $iriCastObce
 * @property float $castObceKod
 * @property float $cisloDomovni
 * @property string $cisloOrientacni
 * @property float $uliceKod
 * @property string $ulice
 * @property string $adresaText
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class AdresaSidlo extends Entity
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
