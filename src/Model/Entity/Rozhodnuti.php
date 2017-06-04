<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rozhodnuti Entity
 *
 * @property int $id
 * @property string $about
 * @property float $castkaPozadovana
 * @property float $castkaRozhodnuta
 * @property string $dotaciPoskytl
 * @property string $financniProstredekCleneni
 * @property string $financovanoZeZdroje
 * @property string $maSmlouvuORozhodnuti
 * @property string $refRozhodnutiRok
 * @property int $rokRozhodnuti
 * @property string $rozpoctoveObdobi
 * @property \Cake\I18n\Time $zaznamAktualizaceDatumCas
 * @property string $zaznamIdentifikator
 * @property \Cake\I18n\Time $zaznamPlatnostDatum
 * @property string $menaKod
 * @property string $investiceIndikator
 * @property string $navratnostIndikator
 * @property string $title
 * @property string $splatkaKalendar
 * @property \Cake\I18n\Time $modified
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
        'id' => false
    ];
}
