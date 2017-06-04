<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rozhodnuti Entity
 *
 * @property string $idRozhodnuti
 * @property string $idDotace
 * @property float $castkaPozadovana
 * @property float $castkaRozhodnuta
 * @property string $iriPoskytovatelDotace
 * @property string $iriCleneniFinancnichProstredku
 * @property string $iriFinancniZdroj
 * @property float $rokRozhodnuti
 * @property bool $investiceIndikator
 * @property bool $navratnostIndikator
 * @property \Cake\I18n\Time $dPlatnost
 * @property \Cake\I18n\Time $dtAktualizace
 */
class Rozhodnuti extends Entity
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
        'idRozhodnuti' => false
    ];
}
